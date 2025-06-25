
# 📦 Inventory Management System (PHP + MySQL + Bootstrap)

A lightweight, role-based Inventory Management System built using **PHP**, **MySQL**, and **Bootstrap 5**. Designed for **Admins** to manage products, stocks & users and **Users** to view products, stocks, recent orders and low stock items.

---

## 🔐 Roles & Features

### 🛠 Admin Features
- Admin login & dashboard
- Product management (Add, Edit, Delete, View)
- Inventory reports (PDF via TCPDF, CSV via `fputcsv()`)
- Low stock alerts (customizable threshold)
- Manage user accounts (View & Delete)
- Order tracking: view all sales & purchases
- Create orders and update stock

### 👤 User Features
- User signup & login
- Dashboard with product summary & order count
- View available products with prices
- Place orders for available products
- View personal order history


---

## 🧪 Database Tables

Main tables:
- `signup` (`id`, `username`, `password`, `role`)
- `products` (`id`, `name`, `price`, `quantity`, `category`)
- `orders` (`id`, `product_id`, `quantity`, `order_type`, `date`, `username`)

---

## 🔧 Setup Instructions

1. **Clone the repo or copy files**  
   ```bash
   git clone https://github.com/vishwakarmakishann/Inventory_System_Using_PHP.git
   ```

2. **Configure DB connection**  
   - Open `db.php` and update your DB credentials:
     ```php
     $conn = new mysqli("localhost", "root", "", "inventory_system");
     ```

3. **Run locally**  
   - Start Apache + MySQL (using XAMPP, WAMP, etc.)
   - Visit: `http://localhost/Inventory Management System Using PHP`

---

## 📌 Notes

- Admin and User dashboards are role-protected.
- Passwords are stored using PHP’s `password_hash()` and verified with `password_verify()`.
- Stock updates automatically on order creation.
- Exportable inventory reports (PDF, CSV).
- Clean, responsive Bootstrap UI.

---

## 📄 License

This project is open-source and free to use for educational or commercial purposes.

---

## 🙌 Acknowledgements

- [Bootstrap 5](https://getbootstrap.com/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)
- [TCPDF](https://tcpdf.org/) (for PDF export)
- Native PHP `fputcsv()` (for Excel/CSV export)

---
