-- user_234201でログインする場合は、その前にrootでログインして権限を割り当てる必要がある
ALTER USER 'user_234201'@'%' IDENTIFIED WITH mysql_native_password BY '234201';

-- users
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    password LONGTEXT NOT NULL,
    phone_number VARCHAR(20),
    email VARCHAR(255),
    role INT
);
-- 初期データ（初回導入時はこれを実行してシステムにログインできるようにする）
INSERT INTO users (user_name, password, phone_number, email, role)
VALUES ('Admin', SHA2('password', 256), '1234567890', 'admin@example.com', 0);