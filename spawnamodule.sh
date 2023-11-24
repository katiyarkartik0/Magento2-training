#!/bin/bash

# Check if vendor name and module name are provided as arguments
if [ "$#" -ne 2 ]; then
  echo "Usage: $0 <vendor_name> <module_name>"
  exit 1
fi

########################################################################################################
#VARIABLES
vendor_name=$1
module_name=$2
route_id=$(echo "${vendor_name}${module_name}" | tr '[:upper:]' '[:lower:]')
vendorName_moduleName="${vendor_name}_${module_name}"

#########################################################################################################



# Magento 2 app/code directory
magento_code_dir=$(pwd)/"app/code"



# Check if the vendor directory already exists
if [ -d "$magento_code_dir/$vendor_name" ]; then
  echo "Error: Vendor directory '$vendor_name' already exists. Please choose a different vendor name."
  exit 1
fi

# Create the directory structure
module_dir="$magento_code_dir/$vendor_name/$module_name"

###########################################################################################################################################################
#FUNCTIONS
create_modulexml(){
  # Create etc/module.xml
cat > "$module_dir/etc/module.xml" <<EOL
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Module/etc/module.xsd">
    <module name="${vendorName_moduleName}" setup_version="1.0.0">
        <!-- Add any module-specific configuration here -->
    </module>
</config>
EOL
}

create_registrationphp(){
  # Create registration.php
cat > "$module_dir/registration.php" <<EOL
<?php
use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    "${vendorName_moduleName}",
    __DIR__
);
EOL
}
create_indexphp(){
  #Create Index.php
  cat > "$module_dir/Controller/Index/Index.php" <<EOL
<?php

namespace ${vendor_name}\\${module_name}\\Controller\\Index;

use Magento\\Framework\\App\\ActionInterface;
use Magento\\Framework\\View\\Result\\PageFactory;

class Index implements ActionInterface {
    protected \$pageFactory;

    public function __construct(PageFactory \$pageFactory) {
        \$this->pageFactory = \$pageFactory;
    }

    public function execute() {
        \$resultPage = \$this->pageFactory->create();
        return \$resultPage;
    }
}
EOL
}

create_routesxml(){
  #Create routes.xml
    cat > "$module_dir/etc/frontend/routes.xml" <<EOL
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
    <router id="standard">
        <route id="$route_id" frontName="$route_id">
            <module name="${vendorName_moduleName}" />
        </route>
    </router>
</config>
EOL
}

create_routeIdindexindexxml(){
  #Create routeId_index_index.xml
  cat > "$module_dir/view/frontend/layout/${route_id}_index_index.xml" <<EOL
<?xml version="1.0"?>
<page xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:View/Layout/etc/page_configuration.xsd">
    <referenceContainer name="content">
        <block 
            class="Magento\Framework\View\Element\Template" 
            name="blockname" 
            template="${vendorName_moduleName}::templateName.phtml" 
        />
    </referenceContainer>
</page>
EOL
}

create_templateNamephtml(){
  #create templateName.phtml
    cat > "$module_dir/view/frontend/templates/templateName.phtml" <<EOL
<div>
    <h2>Welcome to ${vendorName_moduleName}</h2>
</div>
EOL
}

###########################################################################################################################################################

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
create_modulexml

# Create registration.php
create_registrationphp

# Function to create folders based on user input
create_folders_Blck_Cntr_Obs_Plg() {
  #vendorname_modulename in lowercase are used as route_id

  mkdir "$module_dir/Block"
  mkdir -p "$module_dir/Controller/Index"

  #Create Index.php
  create_indexphp

  mkdir "$module_dir/Observer"
  mkdir "$module_dir/Plugin"
  
  mkdir -p "$module_dir/etc/frontend"

  #Create routes.xml
  create_routesxml;
}

create_folders_view(){
  mkdir -p "$module_dir/view/frontend/layout"

  #Create routeId_index_index.xml
  create_routeIdindexindexxml

  mkdir -p "$module_dir/view/frontend/templates"

  #Create templateNamephtml
  create_templateNamephtml

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

# Usage
# add this script as direct-child of the project-folder and give it executable permissions
# run the following command
# ./<scriptname.sh> <VendorName> <ModuleName>
