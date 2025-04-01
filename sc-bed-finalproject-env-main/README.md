██╗  ██╗ █████╗ ██╗  ██╗██╗   ██╗███╗   ██╗ █████╗ 
██║ ██╔╝██╔══██╗██║ ██╔╝██║   ██║████╗  ██║██╔══██╗
█████╔╝ ███████║█████╔╝ ██║   ██║██╔██╗ ██║███████║
██╔═██╗ ██╔══██║██╔═██╗ ██║   ██║██║╚██╗██║██╔══██║
██║  ██╗██║  ██║██║  ██╗╚██████╔╝██║ ╚████║██║  ██║
╚═╝  ╚═╝╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═══╝╚═╝  ╚═╝

### **Introduction**

Kahuna Inc. is a manufacturer of smart home appliances. An online portal where
customers can register their appliances has been implemented. Once registered, customers will be able to check on their products, and see information such as serial number, purchase date, warranty time left and so on. For this prototype system, the following products are made available to register:

### **List of Products initially registered**

| Serial #     | Product                      | Warranty  |
|-------------|-----------------------------|----------|
| KHWM8199911 | CombiSpin Washing Machine    | 2 Years  |
| KHWM8199912 | CombiSpin + Dry Washing Machine | 2 Years  |
| KHMW789991  | CombiGrill Microwave         | 1 Year   |
| KHWP890001  | K5 Water Pump                | 5 Years  |
| KHWP890002  | K5 Heated Water Pump         | 5 Years  |
| KHSS988881  | Smart Switch Lite            | 2 Years  |
| KHSS988882  | Smart Switch Pro             | 2 Years  |
| KHSS988883  | Smart Switch Pro V2          | 2 Years  |
| KHHM89762   | Smart Heated Mug             | 1 Year   |
| KHSB0001    | Smart Bulb 001               | 1 Year   |

# API Endpoints

| Endpoint            | Description |
|---------------------|-------------|
| `login`            | Login into account, as an admin or as a user. |
| `create_Account`   | Creates an account, as an admin or as a user. |
| `add_Product(admin)` | Adds a product to the product list (administrators only). |
| `register_Product` | Allows clients to register products they have purchased. |
| `view_Products`    | Allows the user to view the products they have registered. |
| `view_Product`     | Allows the user to view an individual product they have registered. |
| `logout`          | Logs out of an account, as an admin or as a user. |

### **Setup**

1.) Download and install Docker
2.) Open the GitHub repository in Visual Studio Code
3.) Click on docker-compose.yml and run it.
4.) In the terminal, type "./run.cmd" (windows)
5.) In the terminal, click on the client link to open the index.html file.

### **Navigation**


1.) Click on the user icon at the top right of the home page to load the login page.

2.) Click "don't have an account? Create one" to create an account, if you don't have one.

3.) Enter login credentials to login, to login as administrator;
 Admin_Email: Gforce2009@gmail.com, Admin_Password: S@BERLING.

4.) If logged in as administrator, you should see the add product page, this will add a product to the products list.

5.)To log out of any account, press the logout icon at the home page.

6.)If logged in as a user, you can now register a product. Click the "Register your Appliance" button in the navigation menu in the home screen to do so.

7.)You can now navigate the view Products and view Product page where you can see your registered products

