CREATE TABLE IF NOT EXISTS taskstatus (
    status_id INT PRIMARY KEY AUTO_INCREMENT,
    status_name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS report (
    report_id INT PRIMARY KEY AUTO_INCREMENT,
    assignment_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    comments TEXT NOT NULL,
    status_id INT,
    FOREIGN KEY (assignment_id) REFERENCES assignments(assignment_id),
    FOREIGN KEY (status_id) REFERENCES taskstatus(status_id)
);

ALTER TABLE report
ADD COLUMN created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
ADD COLUMN username VARCHAR(255);


SELECT * FROM taskstatus


SELECT * FROM report

SELECT * FROM assignments
