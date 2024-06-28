<p align="center">
    <a href="#" target="_blank">
        <img src="public/front-assets/images/superiorLogo.png" width="60" alt="Superior Logo">
    </a>

# Superior Hotel, Kenya.

# Procurement Management System

</p>

<hr>

This Laravel Livewire-based procurement management system is designed to streamline procurement processes across multiple hotels. It includes comprehensive features such as roles and permissions management, supplier handling, local purchase orders (LPOs), invoices, audit trails, and multi-hotel management.

## Features

1. ### Roles and Permissions

    - Utilizes Spatie's Laravel Permissions package.
    - Defines roles: Store-Keeper, Headquarters, Director.
    - Store-Keepers can create, edit, and manage LPOs for their assigned hotel.
    - Headquarters can review and document LPOs.
    - Directors can approve LPOs and handle payments.

2. ### Suppliers

    - Suppliers can supply to multiple hotels.
    - Supplier fields include name, email, tel, and address.

3. ### Local Purchase Orders (LPOs)

    - Store-Keepers can create daily LPOs with item details: description, quantity, unit of measure, rate, VAT, and amount.
    - LPO statuses: Draft, Posted, Approved.
    - Tracks creators and editors of each LPO.
    - Posted LPOs are sent to Headquarters for documentation.
    - Each LPO is linked to an invoice containing the same items provided by the supplier.

4. ### Invoices

    - Suppliers can submit invoices matching LPO items.
    - Each invoice is linked to its corresponding LPO.
    - Invoice management is segregated by hotel.

5. ### Approval and Payment

    - Directors review and approve LPOs linked with their invoices for payment.
    - Payments are processed once LPOs are approved.

6. ### Multi-Hotel Management

    - Supports multiple hotels across different locations.
    - Store-Keepers access and manage LPOs and invoices only for their assigned hotel.
    - Suppliers can supply items to multiple hotels.
    - Hotels can be associated with other hotels, making their LPOs and invoices accessible.

7. ### User Access Control

    - Implements strict access control to ensure users can only view and manage resources within their assigned roles and hotels.

8. ### Audit Trail
    - Detailed logging of LPO and invoice actions: creation, editing, posting, and approval.
    - Utilizes a status table linked to LPOs and invoices to track changes.
    - Includes address management for hotels and suppliers.

## Installation

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & npm
-   Database (MySQL, PostgreSQL, etc.)

### Installation Steps

1. **Clone the repository**
    ```bash
    git clone https://github.com/mwendwa-john/Procurement-MS.git
    ```

    ```bash
    cd Procurement-MS
    ```

2. **Install dependencies**
    ```bash
    composer install
    ```

    ```bash
    npm install && npm run dev
    ```

3. **Copy the .env file**
    ```bash
    cp .env.example .env
    ```

4. **Generate application key**
    ```bash
    php artisan key:generate
    ```

5. **Configure your .env file**
    -    Set your database connection details.
    -    Configure other necessary environment variables.

6. **Run migrations and seed initial data**
    ```bash
    php artisan migrate
    ```

    ```bash
    php artisan db:seed
    ```

7. **Serve the application**
    ```bash
    php artisan serve
    ```


## Usage

### Roles and Permissions Management
- Create, edit, and delete roles.
- Assign permissions to roles using the administrative interface.

### Supplier Management
- Add, edit, and delete suppliers.
- Manage supplier details including name, contact information, and address.

### Local Purchase Orders (LPOs)
- Create new LPOs specifying items, quantities, rates, and other details.
- Track LPO status changes: Draft, Posted, Approved.
- View LPO history and associated invoices.

### Invoice Management
- Review and manage invoices submitted by suppliers.
- Link invoices to their respective LPOs for reconciliation and payment processing.

### Approval and Payment
- Directors review and approve LPOs to initiate payment processing.
- Handle payments securely through the integrated system.

### Audit Trail
- Access detailed logs of all LPO and invoice actions.
- Monitor changes made by users including creation, edits, and approvals.

### License
This project is licensed under the MIT License. See the LICENSE file for more details.

