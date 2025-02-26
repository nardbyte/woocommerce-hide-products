# WooCommerce Hide Products
📦 A lightweight WooCommerce plugin that allows you to hide specific products from the shop and category pages while keeping them accessible via direct links.

## 🚀 Features
- ✅ Hide individual products from the **shop, category, and tag pages**.
- ✅ Products remain accessible via **direct URL**.
- ✅ Adds a checkbox in the product settings to toggle visibility.
- ✅ Simple and lightweight, does not affect site performance.

## 🛠️ Installation
1. Download the plugin as a ZIP or clone the repository.
2. Upload the folder to `/wp-content/plugins/`.
3. Activate the plugin in **WordPress > Plugins**.

## ⚙️ Usage
1. Edit any product in WooCommerce.
2. In the **Product Data** section, go to **General**.
3. Check the box **"Hide from shop"**.
4. Save changes. The product will be hidden from the shop but still accessible via direct link.

## 📌 Requirements
- WordPress 5.0+
- WooCommerce 4.0+
- PHP 7.4+

## 🔧 How It Works
- Uses `woocommerce_product_query` to filter out hidden products from shop, category, and tag pages.
- Retrieves hidden products via a custom meta key `_hide_from_shop`.
- Ensures hidden products can still be accessed directly.

## 📜 License
This project is licensed under the [MIT License](LICENSE).

## 🤝 Contributing
Feel free to fork, improve, and submit pull requests! 🚀
