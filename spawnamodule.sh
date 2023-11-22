#!/bin/bash

# Check if vendor name and module name are provided as arguments
if [ "$#" -ne 2 ]; then
  echo "Usage: $0 <vendor_name> <module_name>"
  exit 1
fi

vendor_name=$1
module_name=$2

# Magento 2 app/code directory
magento_code_dir=$(pwd)/"app/code"

# Check if the vendor directory already exists
if [ -d "$magento_code_dir/$vendor_name" ]; then
  echo "Error: Vendor directory '$vendor_name' already exists. Please choose a different vendor name."
  exit 1
fi

# Create the directory structure
module_dir="$magento_code_dir/$vendor_name/$module_name"

echo "Creating directory structure for $vendor_name/$module_name..."

# Check if the vendor directory exists, if not create it
if [ ! -d "$magento_code_dir/$vendor_name" ]; then
  mkdir "$magento_code_dir/$vendor_name"
fi

# Create the module directory
mkdir -p "$module_dir"

# Create required subdirectories
mkdir "$module_dir/etc"

# Create etc/module.xml
cat > "$module_dir/etc/module.xml" <<EOL
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="${vendor_name}_${module_name}" setup_version="1.0.0">
        <!-- Add any module-specific configuration here -->
    </module>
</config>
EOL

# Create registration.php
cat > "$module_dir/registration.php" <<EOL
<?php
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    "${vendor_name}_${module_name}",
    __DIR__
);
EOL

# Function to create folders based on user input
create_folders_Blck_Cntr_Obs_Plg() {
  #vendorname_modulename in lowercase are used as route_id
  route_id=$(echo "${vendor_name}${module_name}" | tr '[:upper:]' '[:lower:]')

  mkdir "$module_dir/Block"
  mkdir "$module_dir/Controller"
  mkdir "$module_dir/Observer"
  mkdir "$module_dir/Plugin"
  
  mkdir -p "$module_dir/etc/frontend"
  cat > "$module_dir/etc/frontend/routes.xml" <<EOL
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
    <router id="standard">
        <route id="$route_id" frontName="$route_id">
            <module name="${vendor_name}_${module_name}" />
        </route>
    </router>
</config>
EOL
}

create_folders_view(){
  mkdir -p "$module_dir/view/frontend/layout"
  mkdir -p "$module_dir/view/frontend/templates"
  mkdir -p "$module_dir/view/frontend/web/css"
  mkdir -p "$module_dir/view/frontend/web/js"
  mkdir -p "$module_dir/view/frontend/web/template"
}

# Prompt user for folder creation
read -p "Do you want to create view folders? (y/n): " user_response

# Check user response
if [ "$user_response" == "y" ] || [ "$user_response" == "Y" ]; then
  create_folders_view
else
  echo "Folders not created. Exiting script."
fi

# Prompt user for folder creation
read -p "Do you want to create 'Block', 'Controller', 'Observer', 'Plugin', 'routes' folders? (y/n): " user_response

# Check user response
if [ "$user_response" == "y" ] || [ "$user_response" == "Y" ]; then
  create_folders_Blck_Cntr_Obs_Plg
else
  echo "Folders not created. Exiting script."
fi

echo "Directory structure and files created successfully in $module_dir."
