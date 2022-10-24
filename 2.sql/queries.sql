## Question one    

SELECT * FROM users WHERE username = “jimbob”


## Question two    

SELECT * FROM posts JOIN users ON users.id = posts.created_by_id WHERE username = "the_gary" 


## Question three    

SELECT * FROM posts JOIN users ON users.id = posts.created_by_id WHERE username = "the_gary" AND post_status = "published" AND YEAR(date_created) = YEAR(CURDATE())


## Question four 

CREATE INDEX idx_username ON users (username)


## Question five

Indexes on small tables may not be ideal because it can take the query optimizer longer to search for the data compared to a simple table scan, so indexes may not be used but will still be maintained as the data changes.