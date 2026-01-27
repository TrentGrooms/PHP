CREATE DATABASE IF NOT EXISTS tjgdatabase;
USE tjgdatabase;

CREATE TABLE items (
	item_id INT AUTO_INCREMENT PRIMARY KEY,
	pc_name VARCHAR(50) NOT NULL,
    gpu VARCHAR(50) NOT NULL,
    ram_gb INT NOT NULL,
    storage_gb INT NOT NULL,
    price DECIMAL(8,2) NOT NULL
	);
	
CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT NOT NULL,
    quantity INT NOT NULL,
    order_date DATE NOT NULL,
    total_cost DECIMAL(8,2) NOT NULL,

    FOREIGN KEY (item_id) REFERENCES items(item_id)
);

	

