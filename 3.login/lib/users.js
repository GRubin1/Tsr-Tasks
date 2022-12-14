const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");

const jwtSecretKey = process.env.JWT_SECRET_KEY;
const saltRounds = 10;
const salt = bcrypt.genSaltSync(saltRounds);

let users = [
  {
    id: 0,
    username: "guy",
    email: "guy@email.com",
    password: "$2b$10$Sl8BsmAmJAKUCKlG2FlwZOgbiCGMkEkpgjEfc/FDdFMcq6RFaZjw2",
  },
];
// ----------------------------------------------------*
export function findUser(username) {
  return users.find((user) => user.username === username);
}

export function isUserExists(username) {
  return findUser(username) || false;
}
// ----------------------------------------------------*
export function login(username, password) {
  if (!username || !password) {
    return {
      error: "WRONG_CREDENTIAL",
      message: `Both Username and Password are required.`,
    };
  }

  if (!isUserExists(username)) {
    return {
      error: "USER_NOT_FOUND",
      message: `${username} is not defined, make sure the user is registered before.`,
    };
  }

  const user = findUser(username);
  const hashedPassword = hashPassword(password);

  if (!checkPassword(hashedPassword, user.password)) {
    return {
      error: "WRONG_CREDENTIAL",
      message: "Your Password is wrong. Shame on you!(^_^)",
    };
  }

  const token = jwt.sign({ username: user.username, email: user.email, id: user.id }, jwtSecretKey, {
    expiresIn: 3000, // 50min
  });

  return {
    payload: {
      token,
    },
  };
}
// ----------------------------------------------------------------
export function whoAmI(username) {
  if (!username || !isUserExists(username)) {
    return {
      error: "USER_NOT_FOUND",
      message: `${username} is not defined, make sure the user is registered before.`,
    };
  }

  const user = findUser(username);
  return {
    isSuccessful: true,
    payload: {
      username: user.username,
      id: user.id,
      email: user.email,
    },
  };
}

function hashPassword(password) {
  return bcrypt.hashSync(password, salt);
}

function checkPassword(currentHashedPassword, hashedPassword) {
  return bcrypt.compare(currentHashedPassword, hashedPassword);
}

export function verifyToken(token) {
  return jwt.verify(token, jwtSecretKey);
}

function errorMessage(error, message) {
  return {
    isSuccessful: false,
    error,
    message,
  };
}
