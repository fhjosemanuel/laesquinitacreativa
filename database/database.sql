-- Database Name: esquinita -- Deshabilitar llaves foraneas al momento de crear las tablas

CREATE OR REPLACE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  code_validation VARCHAR(13) DEFAULT NULL,
  validated BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE OR REPLACE TABLE categories(
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  url VARCHAR(255) NOT NULL
);

CREATE OR REPLACE TABLE products (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description LONGTEXT NOT NULL,
  price FLOAT(8,2) NOT NULL,
  category_id INT UNSIGNED NOT NULL,
  CONSTRAINT products_categories_category_id_fk
  FOREIGN KEY (category_id) REFERENCES categories(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE OR REPLACE TABLE galleries (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  url VARCHAR(255) NOT NULL,
  product_id INT UNSIGNED NOT NULL,
  CONSTRAINT galleries_product_id_fk
  FOREIGN KEY (product_id) REFERENCES products(id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE OR REPLACE TABLE designs (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  url VARCHAR(255) NOT NULL,
  description LONGTEXT NOT NULL,
  price FLOAT(8,2) NOT NULL,
  product_id INT UNSIGNED NOT NULL,
  CONSTRAINT designs_product_id_fk
  FOREIGN KEY (product_id) REFERENCES products(id) ON UPDATE CASCADE ON DELETE CASCADE
);