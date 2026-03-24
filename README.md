# OrganicMart (E-commerce) 
A simple e-commerce website for organic products built using PHP and XAMPP. It supports offline payments and includes a single admin panel for managing products and orders.

---

## 🚀 Features

###  User Features

* User Authentication (Registration & Login)
* Product Catalog (Fruits, Vegetables, Grains, etc.)
* Search & Filter products
* Shopping Cart with real-time total calculation
* cart Management and Secure checkout process for order placement.
* Single Admin Dashboard A private site for the store owner
* Responsive design (mobile & desktop)

###  Admin Features

* Admin Login
* Add / Update / Delete products
* Manage stock and pricing
* View and manage orders

---

##  Live Demo

👉 Visit the live website:
**https://organicmart.infinityfreeapp.com/**

---

##  Technologies Used

* Frontend: HTML, CSS, Tailwind CSS, JavaScript
* Backend: PHP
* Database: MySQL
* Server: XAMPP (Local), InfinityFree (Live)

---

## ⚙️ Setup Instructions (Local Development)

Follow these steps to run the project locally:

### 1. Clone the repository

```bash
git clone https://github.com/YOUR_USERNAME/Organic_mart.git
cd Organic_mart
```

### 2. Move project to XAMPP

Copy the project folder to:

```
C:\xampp\htdocs\
```

### 3. Start XAMPP

* Start Apache
* Start MySQL

### 4. Import Database

* Open phpMyAdmin
* Create a new database (Name:- `ecomart_cart`)
* Import the provided `.sql` file

### 5. Configure Database Connection

Open database connection file (`connection.php`) and update credentials:

#### 👉 For Local (XAMPP)

```php
$conn = mysqli_connect('localhost','root','','organic_mart');
```

#### 👉 For Live Server (InfinityFree)

```php
$conn = mysqli_connect('sqlXXX.infinityfree.com','USERNAME','PASSWORD','DB_NAME');
```

👉 **Important:**

* Uncomment local config when running on XAMPP
* Uncomment live config when deploying online

---

## 🔐 Admin Access

* Single admin system
* Admin panel used to manage products and orders

---

## 💳 Payment Method

* Only Offline Payment (Cash on Delivery / Manual confirmation) available.

---

## 📂 Database

* The database file (`.sql`) is included in the repository
* Import it before running the project locally

---

## 🎯 Project Purpose

* Learn PHP & MySQL integration
* Build a real-world e-commerce system
* Implement authentication and CRUD operations

---

## 📈 Future Improvements

* Online payment integration
* Multiple admin roles
* Improve admin order system.

---

## 🤝 Support

If you like this project, please consider giving it a **star ⭐ on GitHub**.

---

## Author

This project created by **Rathod Aniruddhsinh**

GitHub: [https://github.com/Aniruddhsinh](https://github.com/Aniruddhsinh-r)

Project Repository:
[https://github.com/Aniruddhsinh/HireHub](https://github.com/Aniruddhsinh-r//Organic_mart)
