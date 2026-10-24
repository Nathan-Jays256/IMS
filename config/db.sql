create table
    users (
        usr_id varchar(50) primary key,
        username varchar(255) not null,
        email varchar(100) not null UNIQUE,
        userRole varchar(50) DEFAULT 'Admin',
        password varchar(255) not null,
        reset_token varchar(255),
        date_created date
    );

create table
    brands (
        brand_id varchar(50) primary key,
        name varchar(255) not null,
        date_updated date
    );

create table
    product_categories (
        cat_id varchar(50) primary key,
        name varchar(255) not null UNIQUE,
        date_updated date
    );

create table
    products (
        product_id varchar(50) primary key,
        brand_id varchar(50) not null,
        cat_id varchar(50) not null,
        name varchar(255) not null,
        description text not null,
        dimensions varchar(255) not null,
        quantity varchar(255) not null,
        price varchar(255) not null,
        date_created date not null,
        date_restocked date,
        FOREIGN KEY (brand_id) REFERENCES brands (brand_id),
        FOREIGN KEY (cat_id) REFERENCES product_categories (cat_id)
    );

create table
    sales (
        sales_id varchar(50) primary key,
        product_id varchar(50) not null,
        client_name varchar(255) not null,
        client_location varchar(255) not null,
        date_sold date not null,
        date_updated date,
        FOREIGN KEY (product_id) REFERENCES products (product_id)
    );

create table
    pruchases (
        purchase_id varchar(50) primary key,
        product_id varchar(50) not null,
        supplier varchar(255) null,
        quantity varchar(255) not null,
        purchase_date date not null,
        date_updated date,
        FOREIGN KEY (product_id) REFERENCES products (product_id)
    );