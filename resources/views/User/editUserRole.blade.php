@extends('layouts.main')
@section('content')

<div class="pg-heading">
    <a href="{{ route('inventories.index') }}">
        <i class="fa fa-arrow-left pg-back"></i>
    </a>
    <div class="pg-title">Add User Role</div>
</div>

<div class="section">
    <div class="section-title">
        Role Information
        <hr>
    </div>
    <div class="section-content">
        <form method="POST" action="{{ route('role.update',$role->id) }}">
            @method('Patch')
            @csrf
            <div class="row">
                <div class="col-md-2">
                    <h6>
                        Role Name
                    </h6>
                </div>
                <div class="col-md-10">
                    <input type="text" name="Role_name" value="{{ $role->Role_name }}" class="form-control " placeholder="Enter Role Name" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <h6>
                        Description
                    </h6>
                </div>
                <div class="col-md-10">
                    <textarea name="description" class="pos-sub-txtArea" rows=5>{{ $role->description }}</textarea>
                </div>
            </div>


    </div>
</div>

<div class="section">
    <div class="section-title">
        Access Permissions
        <input type="checkbox" class="selectAll" id="selectAllPermissions">
        <hr>
    </div>
    <div class="section-content">

        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Users
                            <input type="checkbox" class="selectAll" id="selectAllUsers">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input name="addUser" class="form-check-input allUsersPermission" type="checkbox" value="1" id="Add User" @if ($role->addUser) checked @endif >
                                <label class="form-check-label" for="Add User">
                                    Add User
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input name="viewUser" class="form-check-input allUsersPermission" type="checkbox" value="1" id="View User" @if ($role->viewUser) checked @endif >
                                <label class="form-check-label" for="View User">
                                    View User
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input name="updateUser" class="form-check-input allUsersPermission" type="checkbox" value="1" id="Update User" @if ($role->updateUser) checked @endif >
                                <label class="form-check-label" for="Update User">
                                    Update User
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input name="deleteUser" class="form-check-input allUsersPermission" type="checkbox" value="1" id="Delete user" @if ($role->deleteUser) checked @endif >
                                <label class="form-check-label" for="Delete user">
                                    Delete user
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allUsersPermission" name="inactivateUser" type="checkbox" value="1" id="Inactivate user" @if ($role->inactivateUser) checked @endif >
                                <label class="form-check-label" for="Inactivate user">
                                    Inactivate user
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allUsersPermission" name="addUserRole" type="checkbox" value="1" id="Add User Role" @if ($role->addUserRole) checked @endif >
                                <label class="form-check-label" for="Add User Role">
                                    Add User Role
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allUsersPermission" name="viewUserRole" type="checkbox" value="1" id="View User Role" @if ($role->viewUserRole) checked @endif >
                                <label class="form-check-label" for="View User Role">
                                    View User Role
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allUsersPermission" name="updateUserRole" type="checkbox" value="1" id="Update User Role" @if ($role->updateUserRole) checked @endif >
                                <label class="form-check-label" for="Update User Role">
                                    Update User Role
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allUsersPermission" name="deleteUserRole" type="checkbox" value="1" id="Delete User Role" @if ($role->deleteUserRole) checked @endif >
                                <label class="form-check-label" for="Delete User Role">
                                    Delete User Role
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Products
                            <input type="checkbox" class="selectAll" id="selectAllProducts">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="addProduct" type="checkbox" value="1" id="add_product" @if ($role->addProduct) checked @endif >
                                <label class="form-check-label" for="add_product">
                                    Add Product
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="viewProduct" type="checkbox" value="1" id="view_product" @if ($role->viewProduct) checked @endif >
                                <label class="form-check-label" for="view_product">
                                    View Product
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="updateProduct" type="checkbox" value="1" id="update_product" @if ($role->updateProduct) checked @endif >
                                <label class="form-check-label" for="update_product">
                                    Update Product
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="deleteProduct" type="checkbox" value="1" id="delete_product" @if ($role->deleteProduct) checked @endif >
                                <label class="form-check-label" for="delete_product">
                                    Delete Product
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="showCostPrice" type="checkbox" value="1" id="pcost" @if ($role->showCostPrice) checked @endif >
                                <label class="form-check-label" for="pcost">
                                    Show Cost Price
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="editQuantity" type="checkbox" value="1" id="editqty" @if ($role->editQuantity) checked @endif >
                                <label class="form-check-label" for="editqty">
                                    Edit Quantity
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="editPrice" type="checkbox" value="1" id="editprice" @if ($role->editPrice) checked @endif >
                                <label class="form-check-label" for="editprice">
                                    Edit Price
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="printbarcodes" type="checkbox" value="1" id="Print Barcodes" @if ($role->printbarcodes) checked @endif >
                                <label class="form-check-label" for="Print Barcodes">
                                    Print Barcodes
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allProductsPermission" name="exportProducts" type="checkbox" value="1" id="export_product" @if ($role->exportProducts) checked @endif >
                                <label class="form-check-label" for="export_product">
                                    Export Products
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Staff
                            <input type="checkbox" class="selectAll" id="selectAllStaffs">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="addStaff" type="checkbox" value="1" id="Add Staff" @if ($role->addStaff) checked @endif >
                                <label class="form-check-label" for="Add Staff">
                                    Add Staff
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="viewStaff" type="checkbox" value="1" id="View Staff" @if ($role->viewStaff) checked @endif>
                                <label class="form-check-label" for="View Staff">
                                    View Staff
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="updateStaff" type="checkbox" value="1" id="Update Staff Details" @if ($role->updateStaff) checked @endif>
                                <label class="form-check-label" for="Update Staff Details">
                                    Update Staff Details
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="deleteStaff" type="checkbox" value="1" id="Delete Staff" @if ($role->deleteStaff) checked @endif>
                                <label class="form-check-label" for="Delete Staff">
                                    Delete Staff
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="mark_staff_attendance" type="checkbox" value="1" id="Mark Staff Attendance" @if ($role->mark_staff_attendance) checked @endif>
                                <label class="form-check-label" for="Mark Staff Attendance">
                                    Mark Staff Attendance
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="edit_staff_attendance" type="checkbox" value="1" id="Edit staff Attendance" @if ($role->edit_staff_attendance) checked @endif>
                                <label class="form-check-label" for="Edit staff Attendance">
                                    Edit staff Attendance
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allStaffsPermission" name="exportStaff" type="checkbox" value="1" id="Export Staff" @if ($role->exportStaff) checked @endif>
                                <label class="form-check-label" for="Export Staff">
                                    Export Staff
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Customer
                            <input type="checkbox" class="selectAll" id="selectAllCustomers">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allCustomersPermission" name="addCustomer" type="checkbox" value="1" id="Add Customer" @if ($role->addCustomer) checked @endif>
                                <label class="form-check-label" for="Add Customer">
                                    Add Customer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allCustomersPermission" name="viewCustomer" type="checkbox" value="1" id="View Customer" @if ($role->viewCustomer) checked @endif>
                                <label class="form-check-label" for="View Customer">
                                    View Customer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allCustomersPermission" name="updateCustomer" type="checkbox" value="1" id="Update Customer" @if ($role->updateCustomer) checked @endif>
                                <label class="form-check-label" for="Update Customer">
                                    Update Customer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allCustomersPermission" name="deleteCustomer" type="checkbox" value="1" id="Delete Customer" @if ($role->deleteCustomer) checked @endif>
                                <label class="form-check-label" for="Delete Customer">
                                    Delete Customer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allCustomersPermission" name="editLoyaltyPoints" type="checkbox" value="1" id="Edit Loyalty Points" @if ($role->editLoyaltyPoints) checked @endif>
                                <label class="form-check-label" for="Edit Loyalty Points">
                                    Edit Loyalty Points
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allCustomersPermission" name="exportCustomers" type="checkbox" value="1" id="Export Customers" @if ($role->exportCustomers) checked @endif>
                                <label class="form-check-label" for="Export Customers">
                                    Export Customers
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Vendor
                            <input type="checkbox" class="selectAll" id="selectAllVendors">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorsPermission" name="addVendor" type="checkbox" value="1" id="Add Vendor" @if ($role->addVendor) checked @endif>
                                <label class="form-check-label" for="Add Vendor">
                                    Add Vendor
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorsPermission" name="viewVendor" type="checkbox" value="1" id="View Vendor" @if ($role->viewVendor) checked @endif>
                                <label class="form-check-label" for="View Vendor">
                                    View Vendor
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorsPermission" name="updateVendor" type="checkbox" value="1" id="Update Vendor" @if ($role->updateVendor) checked @endif>
                                <label class="form-check-label" for="Update Vendor">
                                    Update Vendor
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorsPermission" name="deleteVendor" type="checkbox" value="1" id="Delete Vendor" @if ($role->deleteVendor) checked @endif>
                                <label class="form-check-label" for="Delete Vendor">
                                    Delete Vendor
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorsPermission" name="exportVendors" type="checkbox" value="1" id="Export Vendors" @if ($role->exportVendors) checked @endif>
                                <label class="form-check-label" for="Export Vendors">
                                    Export Vendors
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Inventory
                            <input type="checkbox" class="selectAll" id="selectAllInventories">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="addInventory" type="checkbox" value="1" id="Add Inventory" @if ($role->addInventory) checked @endif>
                                <label class="form-check-label" for="Add Inventory">
                                    Add Inventory
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="viewInventory" type="checkbox" value="1" id="View Inventory" @if ($role->viewInventory) checked @endif>
                                <label class="form-check-label" for="View Inventory">
                                    View Inventory
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="updateInventory" type="checkbox" value="1" id="Update Inventory" @if ($role->updateInventory) checked @endif>
                                <label class="form-check-label" for="Update Inventory">
                                    Update Inventory
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="deleteInventory" type="checkbox" value="1" id="Delete Inventory" @if ($role->deleteInventory) checked @endif>
                                <label class="form-check-label" for="Delete Inventory">
                                    Delete Inventory
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="exportInventories" type="checkbox" value="1" id="Export Inventories" @if ($role->exportInventories) checked @endif>
                                <label class="form-check-label" for="Export Inventories">
                                    Export Inventories
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="newInventoryCount" type="checkbox" value="1" id="New Inventory Count" @if ($role->newInventoryCount) checked @endif>
                                <label class="form-check-label" for="New Inventory Count">
                                    New Inventory Count
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="editInventoryCount" type="checkbox" value="1" id="Edit Inventory Count" @if ($role->editInventoryCount) checked @endif>
                                <label class="form-check-label" for="Edit Inventory Count">
                                    Edit Inventory Count
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="viewInventoryCount" type="checkbox" value="1" id="View Inventory Count" @if ($role->viewInventoryCount) checked @endif>
                                <label class="form-check-label" for="View Inventory Count">
                                    View Inventory Count
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="printInventoryCount" type="checkbox" value="1" id="Print Inventory Count Report" @if ($role->printInventoryCount) checked @endif>
                                <label class="form-check-label" for="Print Inventory Count Report">
                                    Print Inventory Count
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="setInventoryCountCompleted" type="checkbox" value="1" id="Set Inventory Count as Completed" @if ($role->setInventoryCountCompleted) checked @endif>
                                <label class="form-check-label" for="Set Inventory Count as Completed">
                                    Set Inventory Count as Completed
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="deleteInventoryCount" type="checkbox" value="1" id="Delete Inventory Count" @if ($role->deleteInventoryCount) checked @endif>
                                <label class="form-check-label" for="Delete Inventory Count">
                                    Delete Inventory Count
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="inventoryTransfer" type="checkbox" value="1" id="Create Inventory Transfer" @if ($role->inventoryTransfer) checked @endif>
                                <label class="form-check-label" for="Create Inventory Transfer">
                                    Inventory Transfer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="editInventoryTransfer" type="checkbox" value="1" id="Edit Inventory Transfer" @if ($role->editInventoryTransfer) checked @endif>
                                <label class="form-check-label" for="Edit Inventory Transfer">
                                    Edit Inventory Transfer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allInventoriesPermission" name="deleteInventoryTransfer" type="checkbox" value="1" id="Delete Inventory Transfer" @if ($role->deleteInventoryTransfer) checked @endif>
                                <label class="form-check-label" for="Delete Inventory Transfer">
                                    Delete Inventory Transfer
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Expense
                            <input type="checkbox" class="selectAll" id="selectAllExpenses">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allExpensesPermission" name="addExpense" type="checkbox" value="1" id="Add Expense" @if ($role->addExpense) checked @endif>
                                <label class="form-check-label" for="Add Expense">
                                    Add Expense
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allExpensesPermission" name="viewExpense" type="checkbox" value="1" id="View Expense" @if ($role->viewExpense) checked @endif>
                                <label class="form-check-label" for="View Expense">
                                    View Expense
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allExpensesPermission" name="updateExpense" type="checkbox" value="1" id="Update Expense" @if ($role->updateExpense) checked @endif>
                                <label class="form-check-label" for="Update Expense">
                                    Update Expense
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allExpensesPermission" name="deleteExpense" type="checkbox" value="1" id="Delete Expense" @if ($role->deleteExpense) checked @endif>
                                <label class="form-check-label" for="Delete Expense">
                                    Delete Expense
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Voucher
                            <input type="checkbox" class="selectAll" id="selectAllVouchers">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allVouchersPermission" name="addVoucher" type="checkbox" value="1" id="Add Voucher" @if ($role->addVoucher) checked @endif>
                                <label class="form-check-label" for="Add Voucher">
                                    Add Voucher
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVouchersPermission" name="viewVoucher" type="checkbox" value="1" id="View Voucher" @if ($role->viewVoucher) checked @endif>
                                <label class="form-check-label" for="View Voucher">
                                    View Voucher
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVouchersPermission" name="updateVoucher" type="checkbox" value="1" id="Update Voucher" @if ($role->updateVoucher) checked @endif>
                                <label class="form-check-label" for="Update Voucher">
                                    Update Voucher
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVouchersPermission" name="deleteVoucher" type="checkbox" value="1" id="Delete Voucher" @if ($role->deleteVoucher) checked @endif>
                                <label class="form-check-label" for="Delete Voucher">
                                    Delete Voucher
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allVouchersPermission" name="exportVoucher" type="checkbox" value="1" id="Export Vouchers" @if ($role->exportVoucher) checked @endif>
                                <label class="form-check-label" for="Export Vouchers">
                                    Export Vouchers
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Loyalty
                            <input type="checkbox" class="selectAll" id="selectAllLoyalties">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allLoyaltyPermission" name="addLoyalty" type="checkbox" value="1" id="Add Loyalty" @if ($role->addLoyalty) checked @endif>
                                <label class="form-check-label" for="Add Loyalty">
                                    Add Loyalty
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allLoyaltyPermission" name="viewLoyalty" type="checkbox" value="1" id="View Loyalty" @if ($role->viewLoyalty) checked @endif>
                                <label class="form-check-label" for="View Loyalty">
                                    View Loyalty
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allLoyaltyPermission" name="updateLoyalty" type="checkbox" value="1" id="Update Loyalty" @if ($role->updateLoyalty) checked @endif>
                                <label class="form-check-label" for="Update Loyalty">
                                    Update Loyalty
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allLoyaltyPermission" name="deleteLoyalty" type="checkbox" value="1" id="Delete Loyalty" @if ($role->deleteLoyalty) checked @endif>
                                <label class="form-check-label" for="Delete Loyalty">
                                    Delete Loyalty
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allLoyaltyPermission" name="exportLoyalty" type="checkbox" value="1" id="Export Loyalty" @if ($role->exportLoyalty) checked @endif>
                                <label class="form-check-label" for="Export Loyalty">
                                    Export Loyalty
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Purchase
                            <input type="checkbox" class="selectAll" id="selectAllPurchases">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="createPurchaseOrder" type="checkbox" value="1" id="Create Purchase Order" @if ($role->createPurchaseOrder) checked @endif>
                                <label class="form-check-label" for="Create Purchase Order">
                                    Create Purchase Order
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="viewPurchaseOrder" type="checkbox" value="1" id="View Purchase Order" @if ($role->viewPurchaseOrder) checked @endif>
                                <label class="form-check-label" for="View Purchase Order">
                                    View Purchase Order
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="updatePurchaseOrder" type="checkbox" value="1" id="Update Purchase Order" @if ($role->updatePurchaseOrder) checked @endif>
                                <label class="form-check-label" for="Update Purchase Order">
                                    Update Purchase Order
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="deletePurchaseOrder" type="checkbox" value="1" id="Delete Purchase Order" @if ($role->deletePurchaseOrder) checked @endif>
                                <label class="form-check-label" for="Delete Purchase Order">
                                    Delete Purchase Order
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="printPurchaseInvoice" type="checkbox" value="1" id="Print purchase Invoice" @if ($role->printPurchaseInvoice) checked @endif>
                                <label class="form-check-label" for="Print purchase Invoice">
                                    Print purchase Invoice
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="generateGRN" type="checkbox" value="1" id="Generate Good Received Note" @if ($role->generateGRN) checked @endif>
                                <label class="form-check-label" for="Generate Good Received Note">
                                    Generate Good Received Note
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPurchasesPermission" name="exportPurchaseOrder" type="checkbox" value="1" id="Export Purchase Orders" @if ($role->exportPurchaseOrder) checked @endif>
                                <label class="form-check-label" for="Export Purchase Orders">
                                    Export Purchase Orders
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Salary Payment
                            <input type="checkbox" class="selectAll" id="selectAllSalaryPayments">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allSalaryPaymentsPermission" name="makeSalaryPayment" type="checkbox" value="1" id="Make Salary Payment" @if ($role->makeSalaryPayment) checked @endif>
                                <label class="form-check-label" for="Make Salary Payment">
                                    Make Salary Payment
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalaryPaymentsPermission" name="viewSalaryPayment" type="checkbox" value="1" id="View Salary Payment" @if ($role->viewSalaryPayment) checked @endif>
                                <label class="form-check-label" for="View Salary Payment">
                                    View Salary Payment
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalaryPaymentsPermission" name="updateSalaryPayment" type="checkbox" value="1" id="Update Salary Payment" @if ($role->updateSalaryPayment) checked @endif>
                                <label class="form-check-label" for="Update Salary Payment">
                                    Update Salary Payment
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalaryPaymentsPermission" name="deleteSalaryPayment" type="checkbox" value="1" id="Delete Salary Payment" @if ($role->deleteSalaryPayment) checked @endif>
                                <label class="form-check-label" for="Delete Salary Payment">
                                    Delete Salary Payment
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allSalaryPaymentsPermission" name="printSalaryPaymentInvoice" type="checkbox" value="1" id="Print Salary Payment Receipt" @if ($role->printSalaryPaymentInvoice) checked @endif>
                                <label class="form-check-label" for="Print Salary Payment Receipt">
                                    Print Salary Payment Receipt
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Vendor Payment
                            <input type="checkbox" class="selectAll" id="selectAllVendorPayments">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorPaymentsPermission" name="makeVendorPayment" type="checkbox" value="1" id="Make Vendor Payment" @if ($role->makeVendorPayment) checked @endif>
                                <label class="form-check-label" for="Make Vendor Payment">
                                    Make Vendor Payment
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorPaymentsPermission" name="viewVendorPayment" type="checkbox" value="1" id="View Vendor Payment" @if ($role->viewVendorPayment) checked @endif>
                                <label class="form-check-label" for="View Vendor Payment">
                                    View Vendor Payment
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorPaymentsPermission" name="updateVendorPayment" type="checkbox" value="1" id="Update Vendor Payment" @if ($role->updateVendorPayment) checked @endif>
                                <label class="form-check-label" for="Update Vendor Payment">
                                    Update Vendor Payment
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorPaymentsPermission" name="deleteVendorPayment" type="checkbox" value="1" id="Delete Vendor Payment" @if ($role->deleteVendorPayment) checked @endif>
                                <label class="form-check-label" for="Delete Vendor Payment">
                                    Delete Vendor Payment
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allVendorPaymentsPermission" name="printVendorPaymentInvoice" type="checkbox" value="1" id="Print Vendor Payment Invoice" @if ($role->printVendorPaymentInvoice) checked @endif>
                                <label class="form-check-label" for="Print Vendor Payment Invoice">
                                    Print Vendor Payment Invoice
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Point of Sale
                            <input type="checkbox" class="selectAll" id="selectAllPos">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="processSale" type="checkbox" value="1" id="Process Sale" @if ($role->processSale) checked @endif>
                                <label class="form-check-label" for="Process Sale">
                                    Process Sale
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="accessBackend" type="checkbox" value="1" id="Access Backend" @if ($role->accessBackend) checked @endif>
                                <label class="form-check-label" for="Access Backend">
                                    Access Backend
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="openRegister" type="checkbox" value="1" id="Open Register" @if ($role->openRegister) checked @endif>
                                <label class="form-check-label" for="Open Register">
                                    Open Register
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="closeRegister" type="checkbox" value="1" id="Close Register" @if ($role->closeRegister) checked @endif>
                                <label class="form-check-label" for="Close Register">
                                    Close Register
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="retrieveSale" type="checkbox" value="1" id="Retrieve Sale" @if ($role->retrieveSale) checked @endif>
                                <label class="form-check-label" for="Retrieve Sale">
                                    Retrieve Sale
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="parkSale" type="checkbox" value="1" id="Park Sale" @if ($role->parkSale) checked @endif>
                                <label class="form-check-label" for="Park Sale">
                                    Park Sale
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="suspendSale" type="checkbox" value="1" id="Suspend Sale" @if ($role->suspendSale) checked @endif>
                                <label class="form-check-label" for="Suspend Sale">
                                    Suspend Sale
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="giveDiscount" type="checkbox" value="1" id="Give discount" @if ($role->giveDiscount) checked @endif >
                                <label class="form-check-label" for="Give discount">
                                    Give discount
                                </label>
                            </div>

                            <div class="form-check permission-check">
                                <input class="form-check-input allPosPermission" name="printDayEndReport" type="checkbox" value="1" id="Print Day end Report" @if ($role->printDayEndReport) checked @endif>
                                <label class="form-check-label" for="Print Day end Report">
                                    Print Day end Report
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Sales
                            <input type="checkbox" class="selectAll" id="selectAllSales">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allSalesPermission" name="viewSale" type="checkbox" value="1" id="View Sales" @if ($role->viewSale) checked @endif>
                                <label class="form-check-label" for="View Sales">
                                    View Sales
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalesPermission" name="updateSale" type="checkbox" value="1" id="Edit Sales" @if ($role->updateSale) checked @endif>
                                <label class="form-check-label" for="Edit Sales">
                                    Edit Sales
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalesPermission" name="deleteSale" type="checkbox" value="1" id="Delete Sales" @if ($role->deleteSale) checked @endif>
                                <label class="form-check-label" for="Delete Sales">
                                    Delete Sales
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalesPermission" name="viewProfit" type="checkbox" value="1" id="View Profit" @if ($role->viewProfit) checked @endif>
                                <label class="form-check-label" for="View Profit">
                                    View Profit
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allSalesPermission" name="deleteSuspendedSales" type="checkbox" value="1" id="Delete Suspended Sales" @if ($role->deleteSuspendedSales) checked @endif>
                                <label class="form-check-label" for="Delete Suspended Sales">
                                    Delete Suspended Sales
                                </label>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Bank Accounts
                            <input type="checkbox" class="selectAll" id="selectAllBankAccounts">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allBankAccountsPermission" name="addbankAccounts" type="checkbox" value="1" id="Add Bank Accounts" @if ($role->addbankAccounts) checked @endif>
                                <label class="form-check-label" for="Add Bank Accounts">
                                    Add Bank Accounts
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allBankAccountsPermission" name="viewbankAccounts" type="checkbox" value="1" id="View Bank Accounts" @if ($role->viewbankAccounts) checked @endif>
                                <label class="form-check-label" for="View Bank Accounts">
                                    View Bank Accounts
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allBankAccountsPermission" name="updatebankAccounts" type="checkbox" value="1" id="Update Bank Accounts" @if ($role->updatebankAccounts) checked @endif>
                                <label class="form-check-label" for="Update Bank Accounts">
                                    Update Bank Accounts
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allBankAccountsPermission" name="deletebankAccounts" type="checkbox" value="1" id="Delete Bank Accounts" @if ($role->deletebankAccounts) checked @endif>
                                <label class="form-check-label" for="Delete Bank Accounts">
                                    Delete Bank Accounts
                                </label>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Promotions
                            <input type="checkbox" class="selectAll" id="selectAllPromotions">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="createPromotions" type="checkbox" value="1" id="Create Promotion" @if ($role->createPromotions) checked @endif>
                                <label class="form-check-label" for="Create Promotion">
                                    Create Promotion
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="viewPromotions" type="checkbox" value="1" id="View Promotions" @if ($role->viewPromotions) checked @endif>
                                <label class="form-check-label" for="View Promotions">
                                    View Promotions
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="updatePromotions" type="checkbox" value="1" id="Update Promotions" @if ($role->updatePromotions) checked @endif>
                                <label class="form-check-label" for="Update Promotions">
                                    Update Promotions
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="deletePromotions" type="checkbox" value="1" id="Delete Promotions" @if ($role->deletePromotions) checked @endif>
                                <label class="form-check-label" for="Delete Promotions">
                                    Delete Promotions
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="removeProductsFromPromotion" type="checkbox" value="1" id="Remove Products from Promotion" @if ($role->removeProductsFromPromotion) checked @endif>
                                <label class="form-check-label" for="Remove Products from Promotion">
                                    Remove Products from Promotion
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="viewPromotionSummary" type="checkbox" value="1" id="View Promotion Summary" @if ($role->viewPromotionSummary) checked @endif >
                                <label class="form-check-label" for="View Promotion Summary">
                                    View Promotion Summary
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allPromotionsPermission" name="printPromotionSummaryReport" type="checkbox" value="1" id="Print Promotion Summary Report" @if ($role->printPromotionSummaryReport) checked @endif>
                                <label class="form-check-label" for="Print Promotion Summary Report">
                                    Print Promotion Summary Report
                                </label>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Service
                            <input type="checkbox" class="selectAll" id="selectAllServices">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allServicesPermission" name="addService" type="checkbox" value="1" id="Add Service" @if ($role->addService) checked @endif>
                                <label class="form-check-label" for="Add Service">
                                    Add Service
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allServicesPermission" name="viewService" type="checkbox" value="1" id="View Service" @if ($role->viewService) checked @endif>
                                <label class="form-check-label" for="View Service">
                                    View Service
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allServicesPermission" name="updateService" type="checkbox" value="1" id="Edit Service" @if ($role->updateService) checked @endif>
                                <label class="form-check-label" for="Edit Service">
                                    Edit Service
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allServicesPermission" name="deleteService" type="checkbox" value="1" id="Delete Service" @if ($role->deleteService) checked @endif>
                                <label class="form-check-label" for="Delete Service">
                                    Delete Service
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Exchange
                            <input type="checkbox" class="selectAll" id="selectAllExchanges">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allExchangesPermission" name="exchangeProducts" type="checkbox" value="1" id="Exchange Products" @if ($role->exchangeProducts) checked @endif>
                                <label class="form-check-label" for="Exchange Products">
                                    Exchange Products
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allExchangesPermission" name="viewExchange" type="checkbox" value="1" id="View Exchanges" @if ($role->viewExchange) checked @endif>
                                <label class="form-check-label" for="View Exchanges">
                                    View Exchanges
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allExchangesPermission" name="updateExchange" type="checkbox" value="1" id="Edit Exchanges" @if ($role->updateExchange) checked @endif>
                                <label class="form-check-label" for="Edit Exchanges">
                                    Edit Exchanges
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allExchangesPermission" name="deleteExchange" type="checkbox" value="1" id="Delete Exchanges" @if ($role->deleteExchange) checked @endif>
                                <label class="form-check-label" for="Delete Exchanges">
                                    Delete Exchanges
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">

            <div class="col-md-4">
                <div class="access-permission">

                    <div class="section">
                        <div class="section-title">
                            Reports
                            <input type="checkbox" class="selectAll" id="selectAllReports">
                            <hr>
                        </div>
                        <div class="section-content">

                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="productReport" type="checkbox" value="1" id="Products" @if ($role->productReport) checked @endif>
                                <label class="form-check-label" for="Products">
                                    Products
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="categoriesReport" type="checkbox" value="1" id="Categories" @if ($role->categoriesReport) checked @endif>
                                <label class="form-check-label" for="Categories">
                                    Categories
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="employeeReport" type="checkbox" value="1" id="Employee" @if ($role->employeeReport) checked @endif>
                                <label class="form-check-label" for="Employee">
                                    Employee
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="attendanceReport" type="checkbox" value="1" id="Attendance" @if ($role->attendanceReport) checked @endif>
                                <label class="form-check-label" for="Attendance">
                                    Attendance
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="bankAccountReport" type="checkbox" value="1" id="Bank Accounts" @if ($role->bankAccountReport) checked @endif>
                                <label class="form-check-label" for="Bank Accounts">
                                    Bank Accounts
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="salaryReport" type="checkbox" value="1" id="Salary" @if ($role->salaryReport) checked @endif>
                                <label class="form-check-label" for="Salary">
                                    Salary
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="commissionReport" type="checkbox" value="1" id="Commission" @if ($role->commissionReport) checked @endif>
                                <label class="form-check-label" for="Commission">
                                    Commission
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="customersReport" type="checkbox" value="1" id="Customers" @if ($role->customersReport) checked @endif>
                                <label class="form-check-label" for="Customers">
                                    Customers
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="salesReport" type="checkbox" value="1" id="Sales" @if ($role->salesReport) checked @endif>
                                <label class="form-check-label" for="Sales">
                                    Sales
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="balanceChart" type="checkbox" value="1" id="Balance Chart" @if ($role->balanceChart) checked @endif>
                                <label class="form-check-label" for="Balance Chart">
                                    Balance Chart
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="expensesReport" type="checkbox" value="1" id="Expenses" @if ($role->expensesReport) checked @endif>
                                <label class="form-check-label" for="Expenses">
                                    Expenses
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="voucherReport" type="checkbox" value="1" id="Vouchers" @if ($role->voucherReport) checked @endif >
                                <label class="form-check-label" for="Vouchers">
                                    Vouchers
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="inventoryReport" type="checkbox" value="1" id="Inventory" @if ($role->inventoryReport) checked @endif>
                                <label class="form-check-label" for="Inventory">
                                    Inventory
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="loyaltyReport" type="checkbox" value="1" id="Loyalty" @if ($role->loyaltyReport) checked @endif>
                                <label class="form-check-label" for="Loyalty">
                                    Loyalty
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="profitReport" type="checkbox" value="1" id="Profit and Loss" @if ($role->profitReport) checked @endif>
                                <label class="form-check-label" for="Profit and Loss">
                                    Profit and Loss
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="paymentReport" type="checkbox" value="1" id="Payments" @if ($role->paymentReport) checked @endif>
                                <label class="form-check-label" for="Payments">
                                    Payments
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="purchasesReport" type="checkbox" value="1" id="Purchases" @if ($role->purchasesReport) checked @endif>
                                <label class="form-check-label" for="Purchases">
                                    Purchases
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="vendorsReport" type="checkbox" value="1" id="Vendors" @if ($role->vendorsReport) checked @endif>
                                <label class="form-check-label" for="Vendors">
                                    Vendors
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="serviceReport" type="checkbox" value="1" id="Services" @if ($role->serviceReport) checked @endif>
                                <label class="form-check-label" for="Services">
                                    Services
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="stockTransferReport" type="checkbox" value="1" id="Stock Transfer" @if ($role->stockTransferReport) checked @endif>
                                <label class="form-check-label" for="Stock Transfer">
                                    Stock Transfer
                                </label>
                            </div>
                            <div class="form-check permission-check">
                                <input class="form-check-input allReportsPermission" name="viewDashboardStatistics" type="checkbox" value="1" id="View Dashboard Statistics" @if ($role->viewDashboardStatistics) checked @endif>
                                <label class="form-check-label" for="View Dashboard Statistics">
                                    View Dashboard Statistics
                                </label>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row submit-row">
            <div class="col">
                <input class="btn-submit" type="submit" value="Save">
            </div>
        </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#selectAllPermissions').click(function() {
            var checked = this.checked;
            $('input[type=checkbox]').each(function() {
                this.checked = checked;
            });
        });
        $('#selectAllUsers').click(function() {
            var checked = this.checked;
            $('.allUsersPermission').each(function() {
                this.checked = checked;
            });
        });
        $('#selectAllProducts').click(function() {
            var checked = this.checked;
            $('.allProductsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllStaffs').click(function() {
            var checked = this.checked;
            $('.allStaffsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllCustomers').click(function() {
            var checked = this.checked;
            $('.allCustomersPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllVendors').click(function() {
            var checked = this.checked;
            $('.allVendorsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllInventories').click(function() {
            var checked = this.checked;
            $('.allInventoriesPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllExpenses').click(function() {
            var checked = this.checked;
            $('.allExpensesPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllVouchers').click(function() {
            var checked = this.checked;
            $('.allVouchersPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllLoyalties').click(function() {
            var checked = this.checked;
            $('.allLoyaltyPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllPurchases').click(function() {
            var checked = this.checked;
            $('.allPurchasesPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllSalaryPayments').click(function() {
            var checked = this.checked;
            $('.allSalaryPaymentsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllVendorPayments').click(function() {
            var checked = this.checked;
            $('.allVendorPaymentsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllPos').click(function() {
            var checked = this.checked;
            $('.allPosPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllSales').click(function() {
            var checked = this.checked;
            $('.allSalesPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllBankAccounts').click(function() {
            var checked = this.checked;
            $('.allBankAccountsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllPromotions').click(function() {
            var checked = this.checked;
            $('.allPromotionsPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllServices').click(function() {
            var checked = this.checked;
            $('.allServicesPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllExchanges').click(function() {
            var checked = this.checked;
            $('.allExchangesPermission').each(function() {
                this.checked = checked;
            });
        })
        $('#selectAllReports').click(function() {
            var checked = this.checked;
            $('.allReportsPermission').each(function() {
                this.checked = checked;
            });
        })

        $('#selectAllSalaryPayments').click(function() {
            var checked = this.checked;
            $('.allSalaryPaymentsPermission').each(function() {
                this.checked = checked;
            });
        })


            $('#selectAllSalaryPayments').prop("checked",true);
            $('#selectAllPermissions').prop("checked",true);
            $('#selectAllUsers').prop("checked",true);
            $('#selectAllProducts').prop("checked",true);
            $('#selectAllStaffs').prop("checked",true);
            $('#selectAllCustomers').prop("checked",true);
            $('#selectAllVendors').prop("checked",true);
            $('#selectAllInventories').prop("checked",true);
            $('#selectAllExpenses').prop("checked",true);
            $('#selectAllVouchers').prop("checked",true);
            $('#selectAllLoyalties').prop("checked",true);
            $('#selectAllPurchases').prop("checked",true);
            $('#selectAllSalaryPayments').prop("checked",true);
            $('#selectAllVendorPayments').prop("checked",true);
            $('#selectAllPos').prop("checked",true);
            $('#selectAllSales').prop("checked",true);
            $('#selectAllBankAccounts').prop("checked",true);
            $('#selectAllPromotions').prop("checked",true);
            $('#selectAllServices').prop("checked",true);
            $('#selectAllExchanges').prop("checked",true);
            $('#selectAllReports').prop("checked",true);
            $('#selectAllSalaryPayments').prop("checked",true);


            $('input[type=checkbox]').each(function() {

                if(this.checked == false){
                    $('#selectAllPermissions').prop("checked",false);
               };
            });

            $('.allSalaryPaymentsPermission').each(function() {

               if(this.checked == false){
                    $('#selectAllSalaryPayments').prop("checked",false);
               };

            });

            $('.allUsersPermission').each(function() {

                if(this.checked == false){
                    $('#selectAllUsers').prop("checked",false);
                };

            });

            $('.allProductsPermission').each(function() {

                if(this.checked == false){
                    $('#selectAllProducts').prop("checked",false);
                };

            });
            $('.allCustomersPermission').each(function() {

                if(this.checked == false){
                    $('#selectAllCustomers').prop("checked",false);
                };

            });
            $('.allStaffsPermission').each(function() {

                if(this.checked == false){
                    $('#selectAllStaffs').prop("checked",false);
                };

            });
            $('.allCustomersPermission').each(function() {

            if(this.checked == false){
                $('#selectAllCustomers').prop("checked",false);
            };

            });
            $('.allPromotionsPermission').each(function() {

if(this.checked == false){
    $('#selectAllPromotions').prop("checked",false);
};

});

            $('.allVendorsPermission').each(function() {

if(this.checked == false){
    $('#selectAllVendors').prop("checked",false);
};

});

$('.allInventoriesPermission').each(function() {

if(this.checked == false){
    $('#selectAllInventories').prop("checked",false);
};

});

$('.allExpensesPermission').each(function() {

if(this.checked == false){
    $('#selectAllExpenses').prop("checked",false);
};

});

$('.allVouchersPermission').each(function() {

if(this.checked == false){
    $('#selectAllVouchers').prop("checked",false);
};

});

$('.allLoyaltyPermission').each(function() {

if(this.checked == false){
    $('#selectAllLoyalties').prop("checked",false);
};

});

$('.allPurchasesPermission').each(function() {

if(this.checked == false){
    $('#selectAllPurchases').prop("checked",false);
};

});

$('.allSalaryPaymentsPermission').each(function() {

if(this.checked == false){
    $('#selectAllSalaryPayments').prop("checked",false);
};

});

$('.allVendorPaymentsPermission').each(function() {

if(this.checked == false){
    $('#selectAllVendorPayments').prop("checked",false);
};

});

$('.allPosPermission').each(function() {

if(this.checked == false){
    $('#selectAllPos').prop("checked",false);
};

});

$('.allSalesPermission').each(function() {

if(this.checked == false){
    $('#selectAllSales').prop("checked",false);
};

});
$('.allBankAccountsPermission').each(function() {

if(this.checked == false){
    $('#selectAllBankAccounts').prop("checked",false);
};

});
$('.allServicesPermission').each(function() {

if(this.checked == false){
    $('#selectAllServices').prop("checked",false);
};

});

$('.allExchangesPermission').each(function() {

if(this.checked == false){
    $('#selectAllExchanges').prop("checked",false);
};

});

$('.allReportsPermission').each(function() {

if(this.checked == false){
    $('#selectAllReports').prop("checked",false);
};

});

$('.allSalaryPaymentsPermission').each(function() {

if(this.checked == false){
    $('#selectAllSalaryPayments').prop("checked",false);
};

});

    });


</script>
@endsection
