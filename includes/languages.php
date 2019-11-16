<?php

$SelectLang="";
$actual_link="";
$url='';

function UpdateDefaultLanguage($lang){
include_once('../../includes/adoconn.php');
include_once('../../model/db.php');
include_once('../../includes/check_session.php');

	$company_id=$_SESSION['company_id'];
	$user_id=$_SESSION['user_id'];
	$SqlStr="UPDATE members set lang='$lang' where id='$user_id' and company_id='$company_id'";
	$res= db_query($SqlStr);	
}

if(isset($_REQUEST['chang_lang']) && ($_REQUEST['chang_lang']=='1')){
	$_SESSION['lang_session']="EN";
	$url='?chang_lang=2';
	UpdateDefaultLanguage("EN");
	
			$pageAllwed =$_SESSION['pageAllwed'];
			$size=sizeof($pageAllwed);
            for($i=0;$i < $size;$i++){ $pageAllwed[$i]['page_name'] = $pageAllwed[$i]['page_name_EN']; }
            $_SESSION['pageAllwed']= $pageAllwed;


}
if(isset($_REQUEST['chang_lang']) && ($_REQUEST['chang_lang']=='2')){
	$_SESSION['lang_session']="AR";
	$url='?chang_lang=1';
	UpdateDefaultLanguage("AR");
			$pageAllwed =$_SESSION['pageAllwed'];
			$size=sizeof($pageAllwed);
            for($i=0;$i < $size;$i++){ $pageAllwed[$i]['page_name'] = $pageAllwed[$i]['page_name_AR']; }
            $_SESSION['pageAllwed']= $pageAllwed;
	
}

if($url==''){
if($_SESSION['lang_session']=="EN")
	$url='?chang_lang=2';
else
	$url='?chang_lang=1';
}
		
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$actual_link ='http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0] . $url;


if($_SESSION['lang_session']=="AR"){
$SelectLang="English";
}else{
$SelectLang="Arabic";
}
	
$Lang = array (
    "AR"  => array(
	
//// New Customer  
			"AddNewCustomer_New_Customers" => "شاشة إضافة عميل جديد",
			"Registration_number" => "إضافه رقم التسجيل",
			"Enter_Registration_number" => "ادخل رقم التسجيل",
			"Customer_name" => "أسم العميل",
			"Enter_Customer_name" => "ادخل اسم الزبون",
			"Enter_Customer_shop_name" => "ادخل اسم المتجر",
			"Customer_shop_name" => "أسم متجر العميل",
			"Customer_phone" => "رقم هاتف العميل",
			"Enter_Customer_phone" => "ادخل رقم التلفون",
			"Days_of_work" => "عدد ايام العمل",
			"Users" => "المستخدمين",
			"AddNewCustomer_Customer_Name" => "أسم العميل",
			"AddNewCustomer_Phone" => "رقم هاتف العميل",
			"AddNewCustomer_Shop_Name" => "أسم متجر العميل",
			"AddNewCustomer_Date" => "التاريخ",
			"AddNewCustomer_Users_List" => "قائمة العملاء",
			
			
			
			
			
			
			



	
////////Start Arabic	


//Trucks Shipmentment New Shipmentment

              "New_Shipmentment_Product_Shipment" => "شاشة شحن المنتجات",
              //"NewShipmentment_Product_Shipmentment" => "",
			  //"NewShipmentment_Product_Name" => "أسم المنتج",
			  "NewShipmentment_Product_Package_Price" => "سعر وحدة قياس المنتج",
			  "NewShipmentment_Quantity" => "الكميه",
			  "NewShipmentment_Total_Price" => "إجمالي السعر",
			  "NewShipmentment_Add_to_Truck" => "إضافة للشحن",
			  "NewShipmentment_Print_Shipped_Products" => "طباعة المنتجات المشحونة",
			  "NewShipmentment_Select_Product_Name" => "اختار اسم المنتج",
			  "NewShipmentment_Product_Name" => "أسم المنتج",
			  "NewShipmentment_Store_Name" => "أسم المخزن",
			  "NewShipmentment_Avalable_QTY" => "الكمية المتوفرة في المخزن",
			  "NewShipmentment_Enter_QTY" => "ادخل الكمية",
			  "NewShipmentment_List_of_Shipped_Products" => "قائمة المنتجات المشحونة",
			  "NewShipmentment_Customers_Requests" => "طلبيات العملاء",
			  "NewShipmentment_Proposed_Quantities" => "الكميات المخترحه من النظام",
			  "NewShipmentment_Payment_Status" => "حالة الدفع",
			  "NewShipmentment_Update_Returned_Value" => "تحديث للمنتجات المسترجعة",
			  "NewShipmentment_Shipping_ID" => "رقم الشحنة",
			  "NewShipmentment_Returned_Value" => "كمية المسترجع",
			  "NewShipmentment_Enter_Returned_Value" => "الرجاء ادخال كمية المسترجع",
			  "NewShipmentment_Cancel" => "إلغاء",
			  "NewShipmentment_Add_Returned" => "إضافة المسترجع",
			  
			  
			

	
	
// Button Save+cancel for all pages

			"btn_Save" => "حفظ",
			"btn_Cancel" => "إلغاء",		

//Dashboard
	
	
			"index_GraphTitel" => "رسم بياني يوضح نسبة المبيعات لكل المنتجات لهذا اليوم ", 
			"index_Market_Coverage" => "رسم يوضح نسبة تغطية السوق لكل المنتجات الحالية",
			"index_USED" => "نسبة التغطية الحالية",
			"index_REVENUE" => "<h5>رسم بياني يوضح مقارنة الدخل اليومي في الشهر</h5>",
			"index_Month_Incom" => "<h5>مؤشر يوضح حالة الإيرادات</h5>",
			"index_COMPLETED_PROGRESS_IN_SALES" => "رسم يوضح نسبة المبيعات لهذا اليوم",
			"index_TODAY_Sales_Percentag" => "رسم بياني يوضح مقارنة الإيرادات الشهرية في السنة",
			//"index_Market_Coverage" => "تغطية السوق",
			"index_Added_New_Phone_User" => "تمت إضافة مستخدم جديد الي الهاتف.",
			"index_RECENT_ACTIVITY" => "آخر نشاط تم من المناديب ومستخدمي النظام",
			"index_TEAM_MEMBERS_ONLINE" => "المستخدمين المتواجدين علي النظام الان",
			"index_AVAILABLE" => "متواجد الآن",
			"dashboards" => "القائمه الرئسيه",
			"index_DIRECT_MESSAGE" => "<h5>رسالة مباشرة</h5>",
			"elmohandis_paint" => "Mico Poultry Company",
			
			
			
//Users Managment Add New User (Admin)
			
			"Users_management" => "قسم إدارة المستخدمين",	
			
			"NewUser_Password_Notes" =>"<h4>إرشادات حول كيفية كتابة أسم المستخدم و كلمة المرور الصحيحة:-</h4>
                <ul>
                  <li> - قد تحتوي أسماء المستخدمين في النظام علي أرقام وأحرف كبيرة او صفيرة.</li>
                  <li> - يجب ان يكون البريد الإلكتروني صالح لاستقبال الرسائل.</li>
            <li> - يجب ألا يقل طول كلمة المرور عن 6 أحرف.</li>
            <li> - يجب أن تحتوي كلمات المرور علي الأقل علي:
                <ul>
                    <li> - حرف كبير مثل (A..Z).</li>
                    <li> - حرف صغير مثل (a..z).</li>
                    <li> - رقم واحد مثل (9..0).</li>
                </ul>
            </li>
            <li> - يجب أن تتطابق كلمة السر.</li>",
			
			"NewUser_Add_New_User_web" => "إضافة مستخدم جديد الإدارة",
			"NewUser_User_Name"=> "أسم المستخدم",
			"NewUser_Enter_User_Full_Name"=> "الرجاء ادخال اسم المستخدم الكامل",
			"NewUser_User_E_maile" => " البريد الالكتروني للمستخدم",
			"Enter_NewUser_User_E_maile" => " الرجاء ادخل البريد الالكتروني للمستخدم",
			"NewUser_User_Phone" => "هاتف المستخدم",
			"Enter_NewUser_User_Phone" => "الرجاء ادخل رقم الهاتف",
			//"Enter_NewUser_User_Phone" => "الرجاء ادخل رقم الهاتف",
			"NewUser_Phone_number_should_be_start_with" => "يجب أن يبدأ رقم الهاتف بـ 00249 ، على سبيل المثال 00249xxxxxxxxx.",
			"NewUser_User_Password" => "كلمة مرور المستخدم",
			"NewUser_Confirm_password" => "تأكيد كلمة المرور",
			"NewUser_User_Privileges" => "صلاحيات وإمتيازات المستخدمين للنظام:-",
			"NewUser_Admin_Accout_All_Pages_allwed" => "حساب مدير النظام - جميع الصفحات المسموح بها",
			"NewUser_Sales_Administration_Pages_Allowed" => "إدارة المبيعات - الصفحات المسموح بها (Pagge1 ، Page2 ، Pag3)",
			"NewUser_Financial_Management_Pages_Allowed" => "الإدارة المالية - الصفحات المسموح بها (Pagge1 ، Page2 ، Pag3)",
			"NewUser_Production_Management_Pages_Allowed" => "إدارة الإنتاج - الصفحات المسموح بها (Pagge1 ، Page2 ، Pag3)",
			
			
//Add New User (Admin)Users List


            "NewUser_Users_List" => "قائمة المستخدمين المسجلين في النظام",
			"NewUser_User_Name" => "أسم المستخدم",
			"NewUser_User_E_mail" => "البريد الالكتروني للمستخدم",
			"NewUser_User_Phone" => "هاتف المستخدم",
			"NewUser_Status" => "حالة المستخدم",
			
			
			
//Users Managment Add New User (Pos)


            "NewUserPhone_Password_Notes" => "<h4>إرشادات حول كيفية كتابة أسم المستخدم و كلمة المرور الصحيحة:-</h4>
                <ul>
                  <li> - قد تحتوي أسماء المستخدمين في النظام علي أرقام وأحرف كبيرة او صفيرة.</li>
                  <li> - يجب ان يكون البريد الإلكتروني صالح لاستقبال الرسائل.</li>
            <li> - يجب ألا يقل طول كلمة المرور عن 6 أحرف.</li>
            <li> - يجب أن تحتوي كلمات المرور علي الأقل علي:
                <ul>
                    <li> - حرف كبير مثل (A..Z).</li>
                    <li> - حرف صغير مثل (a..z).</li>
                    <li> - رقم واحد مثل (9..0).</li>
                </ul>
            </li>
            <li> - يجب أن تتطابق كلمة السر.</li>",
			
			"NewUserPhone_Add_New_User_web" => "إضافة مستخدم جديد مندوب مبيعات",
			//"NewUserPhone_User_Name" => "أسم المندوب",
			//"Enter_NewUserPhone_User_Name" => "الرجاء ادخال اسم المندوب الكامل",
			//"NewUserPhone_User_E_mail" => "البريد الالكتروني للمندوب",
			//"Enter_NewUserPhone_User_E_mail" => "الرجاء ادخل البريد الالكتروني للمندوب",
			"NewUserPhone_User_Phone" => "هاتف المندوب",
			//"Enter_NewUserPhone_User_Phone" => "ادخل اسم المستخدم",
			"NewUserPhone_Phone_number_should_be_start_with" => "يجب أن يبدأ رقم الهاتف بـ 00249 ، على سبيل المثال 00249xxxxxxxxx.",
			"NewUserPhone_User_Password" => "كلمة مرور المندوب",
			"Enter_NewUserPhone_User_Password" => "الرجاء ادخال كلمة المرور",
			"NewUserPhone_Confirm_password" => "تأكيد كلمة المرور",
			"Enter_NewUserPhone_Confirm_password" => "الرجاء تأكيد كلمة المرور",
			//"NewUserPhone_User_Privileges" => "امتيازات المستخدم",
			"NewUserPhone_User_Privileges" => "صلاحيات وإمتيازات المناديب علي النظام:-",
			"NewUserPhone_Phone_User_Pages_Allowed_All" => "مندوب مبيعات - الصفحات المسموح بها (الكل)",
			
			
			
//Add New User (Pos)Users List


            "NewUserPhone_Users_List" => "قائمة المناديب المسجلين في النظام",
			"NewUserPhone_User_Name" => "أسم المندوب",
			"Enter_NewUserPhone_User_Name" => "الرجاء ادخال اسم المندوب الكامل",
			"NewUserPhone_User_E_mail" => "البريد الالكتروني للمندوب",
			"Enter_NewUserPhone_User_E_mail" => "الرجاء ادخل البريد الالكتروني للمندوب",
			"Enter_NewUserPhone_User_Phone" => "الرجاء ادخال هاتف المندوب",
			"NewUserPhone_Status" => "حالة المناديب",
			
			
			
//Users Managment System Setting


			"SystemSetting_SystemSetting" => "إعدادات النظام",
			"SystemSetting_Main_Graph" => "الرسم البياني",
			"SystemSetting_Working_Days" => "أيام العمل",
			
			
			"SystemSetting_Main_Graph_Settings" => "إعداد الرسم البياني",
			
			"SystemSetting_Accountin_System_Integration" =>"ربط نظام مناديب مع أنظمة اخري",
			"SystemSetting_Users_Pages_Privilegess" =>"صلاحيات المستخدمين لنظام مناديب",
			"SystemSetting_Working_Days_Settings" =>"تحديد ايام العمل",
			"SystemSetting_Accounting_System_Integrations_Settings" =>"إعداد ربط نظام مناديب مع إنظمة اخري",
			"SystemSetting_Users_Pages_Privileges" =>"تحديد وإعطاء الصلاحيات",
			"SystemSetting_Active" => "نشط",
			"SystemSetting_Not_Active" => "غير نشط",
			"SystemSetting_QuickBooks" => "نظام كيوك بوكس",
			"SystemSetting_Odoo" => "نظام أدو",
			"SystemSetting_Pages_Privileges" => "أسماء الصفحات",
			
			
			
			
			
			

			
			
			
			
//System Setting Main Graph 


//System Setting Working Days



			"SystemSetting_Working_Days_List" => "قائمة أيام العمل",
			"SystemSetting_Day_of_the_week" => "يوم في الاسبوع",
			"SystemSetting_Working_Day" => "يوم عمل؟",
			"SystemSetting_Saturday" => "السبت",
			"SystemSetting_Sunday" => "الأحد",
			"SystemSetting_Monday" => "الإثنين",
			"SystemSetting_Tuesday" => "الثلاثاء",
			"SystemSetting_Wednesday" => "الأربعاء",
			"SystemSetting_Thursday" => "الخميس",
			"SystemSetting_Friday" => "الجمعة",
			
			
//System Setting Accounting System Integrations

            
			"SystemSetting_System_Name" => "اسم النظام",
			"SystemSetting_IP_Address" => "عنوان الخادم",
			//"SystemSetting_Server_IP_Address" => "عنوان الخادم",
			"SystemSetting_Organization_Name" => "أسم المؤسسة",
			"SystemSetting_User_Name" => "أسم المستخدم",
			"SystemSetting_Organization_Password" => "كلمة المرور",
			"SystemSetting_Re_Password" => "إعادة كلمة المرور",
			"SystemSetting_Save" => "حفظ",
			"SystemSetting_Cancel" => "إلغاء",
			"SystemSetting_Enter_Server_IP" => "الرجاء ادخال عنوان الخادم",
			"SystemSetting_Enter_Organization_Name" => "الرجاء ادخال اسم المؤسسة",
			"SystemSetting_Ente_User_Name" => "الرجاء ادخال أسم المستخدم",
			"SystemSetting_Enter_Organization_Password" => "الرجاء ادخال كلمة المرور",
			"SystemSetting_Enter_Re_Enter_Password" => "الرجاء إعادة كتابة كلمة المرور",
			
			
			
//System Setting Accounting System Integrations Accounting System Configration


            "SystemSetting_Accounting_System_Configration" => "إعدادات نظام الحسابات",
			"SystemSetting_System_Name" => "اسم النظام",
			"SystemSetting_IP_Address" => "عنوان الخادم",
			//"SystemSetting_Server_IP_Address" => "عنوان الخادم",
			"SystemSetting_Organization_Name" => "أسم المؤسسة",
			"SystemSetting_User_Name" => "أسم المستخدم",
			
										
//Products Managment Products Vendors			
			
			
			"Vendors_Add_New_Products_Vendors" => "إضافة مورد جديد",
			"ADD_NEW_Products" => "أضافه منتج جديد",
			"Vendors_Vendor_Name" => "أسم المورد",
			"Vendors_Vendor_Phone" => "رقم هاتف المورد",
			"Vendors_Vendor_Tell" => "رقم هاتف المورد الثابت",
			"Vendors_Company_Name" => "اسم الشركة",
			"Vendors_Company_Address" => "عنوان الشركة",
			"Vendors_Company_Addresss" => "الرجاء ادخال عنوان الشركة",
			
			
//Products Managment Products Vendors Packages List
			
			"products_vendors" => "مورد منتجات",
			"Vendors_Packages_List" => "تفاصيل الموردين",
			"Vendors_Vendor_Namee" => "الرجاء ادخال أسم المورد",
			"Vendors_Vendor_Phonee" => "الرجاء ادخال رقم هاتف المورد",
			"Vendors_Vendor_Telll" => "الرجاء ادخال رقم هاتف المورد الثابت",
			"Vendors_Company_Name" => "أسم الشركة",
			"Vendors_Enter_Vendors_Company_Name" => "الرجاء ادخال أسم الشركة",
	
			
//Products Managment Products Packages
			
			
			"Products_Packages" => "حزم منتجات ",
			"Packages_Add_New_Products_Packages" => "شاشة إضافة الوحدات (مقياس - وزن - حجم)",
			//"Packages_Package_Name" => "أسم المقياس",
			//"Enter_Packages_Package_Name" => "ادخل اسم الحزمه",
			//"Packages_Package_Abbreviation" => "اختصار الحزمة",
			//"Enter_Packages_Package_Abbreviation" => "أدخل اختصار الحزمه",
			
			
//Products Managment Products Packages Packages List
			
			
			"Packages_Packages_List" => "قائمة وحدات القياس",
			"Packages_Package_Name" => "وحدة القياس",
			"Enter_Packages_Package_Name" => "الرجاء ادخال المقياس أو الأوزان أو الاحجام",
			"Packages_Package_Abbreviation" => "اختصار  احرف المقياس",
			"Enter_Packages_Package_Abbreviation" => "الرجاء ادخال اختصار المقياس أو الأوزن أو الاحجام",
			
//Products Managment Add New Product

             
			 "NewProduct_Add_New_Product" => "شاشة إضافة منتج جديد",
			 "ADD_NEW_Products" => "إضافة منتج جديد",
			 "NewProduct_Product_Name" => "اسم المنتج",
			 "NewProduct_Product_Status" => "حالة المنتج",
			 "NewProduct_Product_Vendor" => "بائع المنتج",
			 "NewProduct_Is_Product_with_managed_inventory" => "إضافة المنتج للمخزن",
			 "NewProduct_Product_Descriptions" => "وصف المنتج",
			 "NewProduct_Active" => "نشط",
			"NewProduct_Not_Active" => "غير نشط",
			"NewProduct_Enter_Product_Name" => "الرجاء ادخال اسم المنتج",
			 
//Products Managment Add New Product Product List
			 
			 
			 "NewProduct_Product_List" => "قائمة المنتجات",
			 "NewProduct_Product_Name" => "أسم المنتج",
			 "NewProduct_Product_Vendor" => "أسم مورد المنتج",
			 "NewProduct_Product_Status" => "حالة المنتج",
			 "NewProduct_managed" => "إدارة المنتج",
			 "NewProduct_featured" => "متميز",
			 
			 
//Products Managment Pricing Products Prices List


             "Pricing_Products" => "تسعير المنتجات",
			 "PricingProducts_Products_Prices" => "أسعار المنتجات",
			 "PricingProducts_Products_Prices" => "شاشة إضافة سعر المنتجات",
			 "PricingProducts_Select_Product_Name" => "اختار أسم المنتج",
			 "PricingProducts_Select_Product_Package" => "حدد وحدة القياس للمنتج",
			 "PricingProducts_Product_Package_Price" => "تكلفة انتاج المنتج",
			 "Enter_PricingProducts_Product_Package_Price" => "ادخل سعر الانتاج للمنتج",
			 "PricingProducts_Product_Package_Cost" => "ادخل سعر بيع المنتج",
			 "Enter_PricingProducts_Product_Package_Cost" => "ادخل سعر بيع المنتج",
			 
			 
// 			 
			 
			 
//Products Managment Pricing Products  


			 "PricingProducts_Prices_List" => "تفاصيل المنتجات",
			 "PricingProducts_Product_Name" => "أسم المنتج",
			 "PricingProducts_Package" => "وحدة القياس",
			 "PricingProducts_Product_Price" => "سعر المنتج",
			 "PricingProducts_Product_Cost" => "تكلفة المنتج",
			 "PricingProducts_Set_Date" => "التاريخ",
	
	
//Customer Managment Customer Classes

             "Customers_Management" => "قسم إدارة العملاء",  
			 "Customers_Classe" => "تصنيف عملاء",
			 "Add_New_Customer" => "إضافه عملاء جدد",
			 "Store_Management" => "قسم إدارة المخزن",
			 "User_Customers" => "عملاء الزبون",
			 "Users_Status_POS" => "حاله عملاء - نقطه بيع ",
			 "Users_status_admin" => "حاله عملاء - مشرفين",
			 "General_Reports" => "قسم التقارير العامة",
			 "ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class" => "هذا القسم يشير الي أي من العملاء ينتمي  لهذا التصنيف",
			 "Customer_Loaction_in_Map" => "موقع العميل علي الخريطه",
			 "Sales_Revenue_Per_Product" => "إيرادات المنتجات - لكل منتج",
			 "Sales_Revenue_General" => "إيرادات المبيعات العامة",
			 "Products_Sales_Per_Product" => "مبيعات المنتجات - بلمنتج الواحد",
			 "Products_Sales_Genral" => "مبيعات المنتجات العامه",
			 "Customer_Performance" => "أداء العميل",
			 "Custome_Reports" => "قسم تقارير إتخاذ القرار",
			 "Customers_Pending_Bills" => "فواتير العملاء الغير مدفوعه",
			 "Receipts_Payment" => "القيمه المدفوعه",
			 "Trucks_Shipmentment" => "شحن الشحنات",
			 "Product_Packages_and_Price" => "حزم المنتج والسعر",
             "CustomersClasse_Create_Customer_Classes" => "شاشة إضافة تصنيف العملاء",
			 "Manage_Users_Customers" => "إداره زبائن العملاء",
			 "Customers_Classification" => "تصانيف عملاء",
			 "Classes_Configrations" => "إعدادات التصنيف",
			 //"CustomersClasse_Class_Name" => "اسم الفئة",
			 "Enter_CustomersClasse_Class_Name" => "الرجاء ادخال اسم التصنيف",
			 "CustomersClasse_Classe_Code" => "رقم التصنيف",
			 "Enter_CustomersClasse_Classe_Code" => "الرجاء ادخال رقم التصنيف",
			 "CustomersClasse_Class_Sales_Status" => "حالة التصنيف",
			 "CustomersClasse_Select_Store_Status" => "الرجاء اختيار حالة التصنيف",
			 "CustomersClasse_Active" => "نشط",
			 "CustomersClasse_Not_Active" => "غير نشط",
			 
			 
//Customer Managment Customer Classes Store List


             "CustomersClasse_Store_List" => "قائمة المخزن",
			 "CustomersClasse_Class_Name" => "أسم التصنيف",
			 "CustomersClasse_Status" => "حالة التصنيف",			 
            

//Customer Managment Classes Configrations


             //"ClassesConfigrations_Customers_Classes_Configurations" => "Customers Classes Configurations",
			 //"ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class" => "This section indicates which client will be offered for this Class",
			 //
			 //
			 "ClassesConfigrations_Minimum_Registration_Period" => "Minimum Registration Period",
			 
			 
			 //
			 
			 
			 "ClassesConfigrations_Customers_Classes_List" => "قائمة تصنيفات العملاء",
			 "ClassesConfigrations_Customers_Classes_Configurations" => "إعدادات تصنيف العملاء",
			 "ClassesConfigrations_Configrations" => "اعدادات لتصنيف ",
			 "ClassesConfigrations_UPDATE" => "تحديث",
			 "ClassesConfigrations_Minimum_Registration_Period" => "اقل فترة لتسجيل العميل في النظام",
			 "ClassesConfigrations_Enter_Registration_Period_Per_day" => "ادخل فترة التسجيل باليوم",
			 "ClassesConfigrations_Enter_Registration_Period" => "الرجاء ادخال فترة التسجيل باليوم",
			 "ClassesConfigrations_Minimum_Sales_Consumed" => "اقل مبيعات يستهلكها العميل في",
			 "ClassesConfigrations_weekly" => "الاسبوع",
			 "ClassesConfigrations_Enter_Sales_Consumed_Per_Product" => " ادخل اقل مبيعات يستهلكها العميل في الاسبوع",
			 "ClassesConfigrations_Select_Product_Name" => " اختار أسم المنتج",
			 "ClassesConfigrations_Enter_Product_QTY" => "الرجاء ادخال كمية المنتج",
			 "ClassesConfigrations_Minimum_Sales_Amount" => "اقل مبلغ لمبيعات العميل في",
			 "ClassesConfigrations_weekly" => "الاسبوع",
			 "ClassesConfigrations_Enter_Sales_Amount_Per_day" => "ادخل مبلغ المبيعات باليوم",
			 "ClassesConfigrations_Enter_Sales_Amount" => "الرجاء ادخال مبلغ المبيعات",
			 "ClassesConfigrations_Configrations" => "اعدادات لتصنيف ",
			 "ClassesConfigrations_Maximum_Sales_QTY" => "اعلي مبلغ لكمية المبيعات في ",
			 "ClassesConfigrations_Daily" => "اليوم",
			 "ClassesConfigrations_Enter_Sales_Consumed_Per_Product" => "ادخل المبيعات المستهلكة للمنتج",
			 "ClassesConfigrations_Maximum_Sales_Amount" => "اعلي مبلغ للمبيعات",
			 "ClassesConfigrations_Daily" => "اليوم",
			 "ClassesConfigrations_Enter_Sales_Amount_Per_day" => "ادخل مبلغ المبيعات باليوم",
			 "ClassesConfigrations_Sales_Amount" => "كمية المبيعات",
			 "ClassesConfigrations_Maximum_Installment_QTY" => "اعلي كمية للمنتجات ",
			 "ClassesConfigrations_Per_Product" => "بالتقسيط",
			 "ClassesConfigrations_Enter_Maximum_Installment_QTY" => "ادخل اعلي كمية للقسط",
			 "ClassesConfigrations_Maximum_Installment_Amount" => "اعلي مبلغ للقسط",
			 "ClassesConfigrations_Enter_Maximum_Installment_Amount" => "ادخل اعلي مبلغ للقسط",
			 
			 //
			 
			 
			 
			 "CustomersClassification_List_of_Classes" => "قائمة التصنيفات",
			 "CustomersClassification_Auto_Move" => "نقل العميل تلقائياً",
			 "CustomersClassification_REG_Date" => "تاريخ التسجيل",
			 

			 
			  //
			 
			 
			 "ClassesConfigrations_Customers_Classes_Configrations" => "إعدادات تصنيف العملاء",
			 "ClassesConfigrations_This_section_indicates_the_way_of_dealing_with_customers_present_in_this_Class" => "هذا القسم يشير لماذا  ينتمي العملاء لهذا التصنيف",
			 

//Customer Managment Customers Classification


//Customer Managment Manage Users Customers

                
			"CustomersManagement_Customers_List" => "قائمة العملاء",
			
			
			"CustomersManagement_Users_List" => "قائمة المناديب",

			 
//Store Managment Create Store


            "CreateStore_Create_New_Store" => "شاشة إضافة مخزن جديد",
			"Add_New_Users_Admin" => "أضافه مستخدم - مشرف",
			"System_setting" => "اعدادات النظام",  
			"Add_New_Users_pos" => "اضافه مستخدم - نقطه بيع",
			//"Users_management" => "إداره المستخدمين",
			//"CreateStore_Store_Name" => "اسم المخزن",
			"CreateStore_Store_Types" => "نوع المخزن",
			"CreateStore_Store_Status" => "حالة المخزن",
			"CreateStore_Enter_Store_Name" => "الرجاء ادخال اسم المخزن",
			"CreateStore_Select_Store_Type" => "اختيار نوع المخزن",
			"CreateStore_Normal_Store" => "المخزن الرئيسي",
			"CreateStore_Shipping_Store" => "مخزن الشحن",
			"CreateStore_Return_Store" => "مخزن الراجع او التالف",
			"CreateStore_Select_Store_Status" => "اختيار حالة المخزن",
			"CreateStore_Active" => "نشط",
			"CreateStore_Not_Active" => "غير نشط",
			"CreateStore_Edit_customer_Class" => "شاشة تعديل تصنيف العملاء",
			"CreateStore_Update_Info" => "تعديل",
			"CreateStore_Cancel" => "إلغاء",
			


//Store Managment Create Store Store List


             "CreateStore_Store_List" => "قائمة المخازن",
			 "CreateStore_Store_Name" => "أسم المخزن",
			 "CreateStore_Store_Type" => "نوع المخزن",
			 "CreateStore_Status" => "حالة المخزن",
			 "CreateStore_Created_Date" => "تاريخ الإنشاء",			
			
			 
//Store Managment Product to Store
             "products_management" => "قسم إدارة المنتجات ",
             "products_vendors" => "مورد منتجات",
             "ProductsStore_Add_New_Product_to_Store" => "شاشة إضافة المنتجات للمخزن",
			 "Create_Store" => "إضافة منتج جديد  ",
			 "Trucks_and_Shipment" => "قسم إدارة الشحن والشحنات ",
			 "Products_store" => "منتجات المتجر ",
			 "Finance" => "حساب",
			 "Finance_Management" => "قسم إدارة حسابات المناديب ",
			 "New_Shipmentment" => "شحنه جديده",
			 "Customers_Request" => "طلبات الزباءن ",
			 "ProductsStore_Store_Name" => "أسم المخزن",
			 "ProductsStore_Product_Name" => "أسم المنتج",
			 "ProductsStore_Product_QTY" => "كمية المنتج",
			 "ProductsStore_Select_Store_Name" => "اختار اسم المخزن",
			 "ProductsStore_Select_Product_Name" => "اختار اسم المنتج",
			 "ProductsStore_Avalable_QTY" => "الكمية المتوفرة في المخزن",
			 "ProductsStore_Enter_Product_QTY" => "الرجاء ادخال كمية المنتج",
			 
// Report genral


    			 
//Store Managment Product to Store Store List

              
			  "ProductsStore_Store_List" => "قائمة تفاصيل المخازن",
			  //"ProductsStore_Store_Name" => "اسم المخزن",
			  "ProductsStore_Product_Name" => "اسم المنتج",
			  "ProductsStore_Product_Package" => "وحدة القياس",
			  "ProductsStore_QTY" => "الكمية",
			  "ProductsStore_Movement_Type" => "نوع الحركة داخل المخزن",
			  "ProductsStore_Movement_Entre_Date" => "تاريخ الإدخال",


//General Reports Users Status (Admin)

            
			"rptActiveUsersWeb_Actives_Users_Report" => "تقارير المستخدمين النشطين",
			"rptActiveUsersWeb_Report_Name_Actives_Users_admin" => "تقارير المستخدمين النشطين",
			"rptActiveUsersWeb_Report_Date" => "تاريخ التقرير: ",			
			"rptActiveUsersWeb_NO" => "NO",
			"rptActiveUsersWeb_User_Name" => "أسم المخزن",
			"rptActiveUsersWeb_User_E_mail" => "البريد الالكتروني للمستخدم",
			"rptActiveUsersWeb_User_Phone" => "تلفون المستخدم",
			"rptActiveUsersWeb_User_Privileges" => "صلاحيات المستخدم",
			"rptActiveUsersWeb_Status" => "الحاله",
			
			"rptActiveUsersWeb_Print_Report" => "اطبع التقرير",


 //Custome Reports Products Sales-Per Product


			  "CrptProductsSalesPerProduc_Products_Sales_PerProduct_Report" => "تقارير منتجات المبيعات (قبل الانتاج) ",
			  "CrptProductsSalesPerProduc_Product_Name" => "اسم المنتج",
			  "CrptProductsSalesPerProduc_Date_Range" => "الفتره الزمنيه",
			  "CrptProductsSalesPerProduc_To" => "الي",
			  "CrptProductsSalesPerProduc_Select_date_range" => "اختار الفتره الزمنيه",
			  "CrptProductsSalesPerProduc_Report_Name_Products_Sales_PerProduc" => "اسم التقرير: مبيعات المنتجات قبل الانتاج",
			  "CrptProductsSalesPerProduc_NO" => "NO",
			  "CrptProductsSalesPerProduc_Vendor" => "المورد",
			  "CrptProductsSalesPerProduc_Product_Name" => "اسم المنتج",
			  "CrptProductsSalesPerProduc_Packages_Name" => "اسم الحزمه",
			  "CrptProductsSalesPerProduc_Sales_QTY" => "كميه المبيعات",
			  "CrptProductsSalesPerProduc_Sales_Date" => "تاريخ المبيعات",
			  "CrptProductsSalesPerProduc_Preview_Report" => "مراجعه التقرير",
			  "CrptProductsSalesPerProduc_Print_Report" => "اطبع التقرير",			

			  
			  
			  
//General Reports Trucks Shipmentments


             "rptTrucksShipmentment_Trucks_Shipmentments_Report" => "تقرير الشحن والشحنات",
			 "rptTrucksShipmentment_User_Name" => "اسم المستخدم",
			 "rptTrucksShipmentment_Date_Range" => "متوسط التاريخ",
			 "rptTrucksShipmentment_To" => "ألي",
			 "rptTrucksShipmentment_Select_date_range" => "اختار مدي",
			 "rptTrucksShipmentment_Report_Name_Trucks_Shipmentments" => "اسم التقرير : الشحنه والشحنات",
			 "rptTrucksShipmentment_NO" => "NO",
			 "rptTrucksShipmentment_Product_Name" => "اسم المنتج",
			 "rptTrucksShipmentment_Product_QTY" => "كميه المنتج",
			 "rptTrucksShipmentment_Product_Package_Price" => "سعر حزمه المنتج",
			 "rptTrucksShipmentment_Product_Total_Price" => "السعر الكلي",
			 "rptTrucksShipmentment_Shipping_Date" => "تاريخ الشحن",
			 "rptTrucksShipmentment_Payment_Status" => "حاله الدفع",
			 "rptTrucksShipmentment_Preview_Report" => "مراجعه التقرير",
			 "rptTrucksShipmentment_Print_Report" => "اطبع التقرير",


			  
			  
//Custome Reports Sales Revenue-Per Product


			  "CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report" => "ايرادات المبيعات قبل الانتاج",
			  "CrptSalesRevenuePerProduct_Product_Name" => "اسم المنتج",
			  "CrptSalesRevenuePerProduct_Date_Range" => "الفتره الزمنيه",
			  "CrptSalesRevenuePerProduct_To" => "الى",
			  "CrptSalesRevenuePerProduct_Select_date_range" => "اختار الفتره الزمنيه",
			  "CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct" => "اسم التقرير: ايرادات المبيعات(PerProduct)",
			  "CrptSalesRevenuePerProduct_NO" => "NO",
			  "CrptSalesRevenuePerProduct_Vendor" => "المورد",
			  "CrptSalesRevenuePerProduct_Product_Name" => "اسم المنتج",
			  "CrptSalesRevenuePerProduct_Packages_Name" => "اسم الحزمه",
			  "CrptSalesRevenuePerProduct_Sales_QTY" => "كميه المبيعات",
			  "CrptSalesRevenuePerProduct_Product_Cost" => "تكلفه المنتج",
			  "CrptSalesRevenuePerProduct_Product_Price" => "سعر المنتج",
			  "CrptSalesRevenuePerProduct_Cost_Revenue" => "تكلفه الايراد",
			  "CrptSalesRevenuePerProduct_Sales_Revenue" => "ايرادات المبيعات",
			  "CrptSalesRevenuePerProduct_Sales_Date" => "تاريخ المبيعات",
			  "CrptSalesRevenuePerProduct_Total" => "المجموع الكلي",
			  "CrptSalesRevenuePerProduct_Preview_Report" => "مراجعه التقرير",
			  "CrptSalesRevenuePerProduct_Print_Report" => "اطبع التقرير",
			  			 
//General Reports Receipts Payment


			  "rptReceiptsPayment_Receipts_Payments_Report" => "تقرير المبالغ المستلمه",
			  "rptReceiptsPayment_User_Name" => "اسم المستخدم",
			  "rptReceiptsPayment_Date_Range" => "نطاق الدفع",
			  "rptReceiptsPayment_To" => "الى",
			  "rptReceiptsPayment_Select_date_range" => "ااختار تاريخ المدى",
			  "rptReceiptsPayment_Report_Name_Receipts_Payments" => "اسم التقرير : القيم المد",
			  "rptReceiptsPayment_NO" => "NO",
			  "rptReceiptsPayment_Product_Name" => "Product Name",
			  "rptReceiptsPayment_Product_QTY" => "Product QTY",
			  "rptReceiptsPayment_Product_Package_Price" => "Product Package Price",
			  "rptReceiptsPayment_Total_Amount" => "Total Amount",
			  "rptReceiptsPayment_Paid_Amount" => "Paid Amount",
			  "rptReceiptsPayment_Pending_Amount" => "Pending Amount",
			  "rptReceiptsPayment_Shipping_Date" => "Shipping Date",
			  "rptReceiptsPayment_Preview_Report" => "Preview Report",
			  "rptReceiptsPayment_Print_Report" => "Print Report",
			  			 
			 			
			
			
						
//General Reports Users Status (POS)


            "rptActiveUsersPhone_Users_Status_Report_Phone" => "حاله المستخمين النشطين - نقاط البيع",
			"rptActiveUsersPhone_Report_Name_Users_Status_Phone" => "اسم التقرير : حاله المستخمين النشطين - نقاط البيع",
            "rptActiveUsersPhone_NO" => "NO",
			"rptActiveUsersPhone_User_Name" => "اسم المستخدم",
			"rptActiveUsersPhone_User_E_mail" => "البريد الالكتروني للمستخدم",
			"rptActiveUsersPhone_User_Phone" => "تلفون المستخدم",
			"rptActiveUsersPhone_Customers_Count" => "حساب العملاء",
			"rptActiveUsersPhone_Pending_Bills" => "الفواتير المعلقه",
			"rptActiveUsersPhone_Status" => "الحاله",
			"rptActiveUsersPhone_Print_Report" => "اطبع التقرير",
			
			//General Reports User Customers


            "rptUserCustomers_User_Customers_Report" => "تقرير عملاء المستخدم",
			"rptUserCustomers_User_Name" => "User Name:",
			"rptUserCustomers_Report_Name_User_Customers" => "اسم التقرير : عملاء المستخدم",
			"rptUserCustomers_User_Name" => "اسم المستخدم:",
			"rptUserCustomers_NO" => "NO",
			"rptUserCustomers_Customer_Name" => "اسم المستخدم",
			"rptUserCustomers_Shop_Name" => "اسم المتجر",
			"rptUserCustomers_Customer_Phone" => "تلفون العميل",
			"rptUserCustomers_REG_Date" => "تاريخ التسجيل",
			"rptUserCustomers_Print_Report" => "اطبع التقرير",
			

			  			
//General Reports Product Packages & Price 			
             
			 
			 "rptProductsPackagesPrice_Product_Packages_Price_Report" => "تقرير حزم المنتج والسعر",
			 "rptProductsPackagesPrice_Product_Name" => "اسم المنتج",
			 "rptProductsPackagesPrice_Report_Name_Product_Packages_Price" => "اسم المنتج: حزم المنتج والسعر",
			 "rptProductsPackagesPrice_NO" => "NO",
			 "rptProductsPackagesPrice_Product_Name" => "اسم المنتج",
			 "rptProductsPackagesPrice_Package" => "الحزمه",
			 "rptProductsPackagesPrice_Product_Price" => "سعر المنتج",
			 "rptProductsPackagesPrice_Product_Cost" => "تكلفه المنتج",
			 "rptProductsPackagesPrice_REG_Date" => "تاريخ التسجيل",
			 "rptProductsPackagesPrice_Print_Report" => "اطبع المنتج",
					
	
			

	//Custome Reports Products Sales-General

     "CrptProductsSalesGeneral_Customers_Performers_Report" => "تقرير اداء العميل",	
	 "CrptProductsSalesGeneral_ReportName" => "اسم التقرير",
	  "CrptProductsSalesGeneral_Customers_Performance" => "تقرير اداء العملاء",
	  "rptUserCustomers_Performance" => "الأداء",
	  
	 					  
			  
//Store Managment Product Store  Products In Store



			  "ProductsStore_Products_In_Store" => "تفاصيل إجمالي المنتجات في المخازن",
			  "ProductsStore_Store_Namee" => "اسم المخزن",
			  "ProductsStore_Product_Name" => "اسم المنتج",
			  "ProductsStore_Package" => "وحدة القياس",
			  "ProductsStore_QTY_AVALABLE" => "الكمية المتوفرة الحالية",
			  
			  //
			  
			  
			  "ProductsStore_Edit_Customers_class_Data" => "الكمية المتوفرة الحالية",
			  "ProductsStore_Select_Store_Status" => "اختيار حالة المخزن",
			  "ProductsStore_Active" => "نشط",
			  "ProductsStore_Not_Active" => "غير نشط",
			  "ProductsStore_Update_Info" => "تعديل",
			  "ProductsStore_Cancel" => "إلغاء",
			
			                
                      /*<option value="0"  >{$ProductsStore_Active}</option>
                      <option value="1"  >{$ProductsStore_Not_Active}</option>*/
					  
			  
//Finance Managment Finance


            //"Finance_Finance_Receipt_Payment" => "الحساب وقيمه الدفع المستلمه",
			
			
//Trucks Shipmentment Customers Requests

              "CustomersRequests_Customers_Requests" => "طلبات العملاء",
			  
			  
//Trucks Shipmentment Customers Requests Requests List

			  
			  "CustomersRequests_Requests_List" => "قائمة الطلبات",
			  "CustomersRequests_Product_Name" => "أسم المنتج",
			  "CustomersRequests_Requested_QTY" => "كمية المنتج",
			  "CustomersRequests_Price_Upon_Request" => "السعر علي الطلب",
			  "CustomersRequests_Customer_Name" => "أسم العميل",
			  "CustomersRequests_Customer_Phone" => "رقم الهاتف",
			  "CustomersRequests_Request_Date" => "تاريخ الطلب",
			  "CustomersRequests_Request_Status" => "حالة الطلب",
			  

//Trucks Shipmentment Customers Requests Users List


              "CustomersRequests_Users_List" => "قائمة المناديب",		  

			  
/*//Trucks Shipmentment New Shipmentment


              "NewShipmentment_Product_Shipmentment" => "Product Shipmentment",
			  "NewShipmentment_Product_Name" => "Product Name",
			  "NewShipmentment_Product_Package_Price" => "Product Package Price",
			  "NewShipmentment_Quantity" => "Quantity",
			  "NewShipmentment_Total_Price" => "Total Price",
			  "NewShipmentment_Add_to_Truck" => "Add to Truck",
			  "NewShipmentment_Print_Shipped_Products" => "Print Shipped Products",
			  "NewShipmentment_Select_Product_Name" => "Select Product Name",
			  "NewShipmentment_Product_Name" => "Product Name",
			  "NewShipmentment_Store_Name" => "Store Name",*/
			  

//Custome Reports Sales Revenue-General	


              "CrptSalesRevenueGeneral_Sales_Revenue_General_Report" => "اتقارير ايرادات المبيعات العامه",
			  "CrptSalesRevenueGeneral_Date_Range" => "الفتره الزمنيه",
			  "CrptSalesRevenueGeneral_To" => "الى",
			  "CrptSalesRevenueGeneral_Select_date_range" => "اختار الفتره الزمنيه",
			  "CrptSalesRevenueGeneral_Report_Name_Sales_Revenue_General" => "اسم التقرير : ايرادات المبيعات (General)",
			  "CrptSalesRevenueGeneral_NO" => "NO",
			  "CrptSalesRevenueGeneral_Vendor" => "المورد",
			  "CrptSalesRevenueGeneral_Product_Name" => "اسم المنتج",
			  "CrptSalesRevenueGeneral_Packages_Name" => "اسم الحزمه",
			  "CrptSalesRevenueGeneral_Sales_QTY" => "كميه المبيعات",
			  "CrptSalesRevenueGeneral_Product_Cost" => "تكلفه المنتج",
			  "CrptSalesRevenueGeneral_Product_Price" => "سعر المنتج",
			  "CrptSalesRevenueGeneral_Cost_Revenue" => "تكلفه الايرادات",
			  "CrptSalesRevenueGeneral_Sales_Revenue" => "ايرادات المبيعات",
			  "CrptSalesRevenueGeneral_Sales_Date" => "تاريخ المبيعات",
			  "CrptSalesRevenueGeneral_Total" => "المجموع الكلي",
			  "CrptSalesRevenueGeneral_Preview_Report" => "مراجعه التقرير",
			  "CrptSalesRevenueGeneral_Print_Report" => "اطبع التقرير",
			  			  
//Trucks Shipmentment New Shipmentment List of Shipped Products

			  
			  
			  //"NewShipmentment_List_of_Shipped_Products" => "List of Shipped Products",
			  //"NewShipmentment_Product_Name" => "Product Name",
			  //"NewShipmentment_Quantity" => "Quantity",
			  //"NewShipmentment_Product_Package_Price" => "Product Package Price",
			  //"NewShipmentment_Total_Price" => "Total Price",
			  //"NewShipmentment_Payment_Status" => "Payment Status",
			  
			  
//Trucks Shipmentment New Shipmentment Users List
			  
			  
			  "NewShipmentment_Users_List" => "قائمة المناديب",
			  
			  
//Trucks Shipmentment New Shipmentment


              "NewShipmentment_Product_Shipmentment" => "Product Shipmentment",
			  //"NewShipmentment_Product_Name" => "Product Name",
			  //"NewShipmentment_Product_Package_Price" => "Product Package Price",
			  //"NewShipmentment_Quantity" => "Quantity",
			  //"NewShipmentment_Total_Price" => "Total Price",
			  //"NewShipmentment_Add_to_Truck" => "Add to Truck",
			  //"NewShipmentment_Print_Shipped_Products" => "Print Shipped Products",
			
			
//Trucks Shipmentment New Shipmentment Customers Requests
			
			
			//"NewShipmentment_Customers_Requests" => "Customers Requests",
			
			
//Trucks Shipmentment New Shipmentment Proposed Quantities


            //"NewShipmentment_Proposed_Quantities" => "Proposed Quantities",
			
			
//Finance Managment Finance


            "Finance_Finance_Receipt_Payment" => "شاشة الحسابات واستلام الدفعيات",
			"Finance_Product_Name" => "أسم المنتج",
			"Finance_Product_Package_Price" => "سعر وحدة قياس المنتج",
			"Finance_Quantity" => "الكمية",
			"Finance_Total_Amount" => "إجمالي الكمية",
			"Finance_Remaining_Balance" => "الرصيد المتبقي",
			"Finance_Amount" => "الكمية",
			"Finance_Add_Receipt_Payment" => "إضافة ايصال الدفع",
			
			
//Finance Managment Finance User Pending Receipt
			
			
			"Finance_User_Pending_Receipt" => "قائمة فواتير المبالغ المتبقية علي المندوب",
			//"Finance_Product_Name" => "Product Name",
			//"Finance_Quantity" => "Quantity",
			//"Finance_Product_Package_Price" => "Product Package Price",
			//"Finance_Total_Amount" => "Total Amount",
			"Finance_Paid_Amount" => "المبلغ المدفوع",
			"Finance_Pending_Amount" => "المبلغ المتبقي",
			"Finance_Action" => "الحالة",
			"Finance_Price" => "السعر",
			"Finance_Total" => "الإجمالي",
			"Finance_Shipping_Date" => "تاريخ الشحن",
			
			
			
			
//Finance Managment Finance Users List



            "Finance_Users_List" => "قائمة المناديب",
			
			


			

			

			
			

			 
			 

			 
			 

			  
//Custome Reports Products Sales-General


              "CrptProductsSalesGeneral_Products_Sales_General_Report" => "تقرير المنتجات العامه",
			  "CrptProductsSalesGeneral_Date_Range" => "تاريخ المده",
			  "CrptProductsSalesGeneral_To" => "الي",
			  "CrptProductsSalesGeneral_Select_date_range" => "اختار الفتره الزمنيه",
			  "CrptProductsSalesGeneral_Report_Name_Products_Sales_General" => "اسم التقرير : المبيعات العامه للمنتجات",
			  "CrptProductsSalesGeneral_Sales_Date" => "تاريخ التقرير:",
			  "CrptProductsSalesGeneral_NO" => "NO",
			  "CrptProductsSalesGeneral_Vendor" => "المورد",
			  "CrptProductsSalesGeneral_Product_Name" => "اسم المنتج",
			  "CrptProductsSalesGeneral_Packages_Name" => "اسم الحزمه",
			  "CrptProductsSalesGeneral_Sales_QTY" => "كميه المبيعات",
			  "CrptProductsSalesGeneral_Sales_Date" => "تاريخ المبيعات",
			  "CrptProductsSalesGeneral_Preview_Report" => "مراجعه التاريخ",
			  "CrptProductsSalesGeneral_Print_Report" => "اطبع التقرير",
			  
			  

			  

			  
			  

//Customer Loaction in Map


              "google_maps_Map_with_Customer_Loaction_List" => "تحديد المواقع الجغرافية لعملاء المندوب علي الخريطة",
			  "google_maps_Select_User_Name" => "000",
			  "google_maps_Select_User_Name" => "اختار أسم المندوب من القائمة لتحديد موقع العملاء",

              			  	  		  			 


			
			
			"c" => "apple"


			
			
			
			
///////////END Arabic			
	),
    "EN" => array(
	
	
///// add new Customer


	        "AddNewCustomer_New_Customers" => "Add new Customers",
	        "Registration_number" => "Registration Number",
	        "Enter_Registration_number" => "Enter Registration Number",
	        "Customer_name" => "Customer Name",
	        "Enter_Customer_name" => "Customer Name",
	        "Customer_shop_name" => "Customer Shop Name",
	        "Enter_Customer_shop_name" => "Enter Customer Shop Name",
	        "Customer_phone" => "Customer Phone",
	        "Enter_Customer_phone" => "Enter Customer Phone",
	        "Days_of_work" => "Days of work",
	        "Users" => "Users",
	        "AddNewCustomer_Customer_Name" => "Customer Name",
			"AddNewCustomer_Phone" => "Phone",
			"AddNewCustomer_Shop_Name" => "Shop_Name",
			"AddNewCustomer_Date" => "Date",
			"AddNewCustomer_Users_List" => "Users List",
	
	
	
	
	
	
	
	
	
	
// Button Save+cancel for all pages

			"btn_Save" => "Save",
			"btn_Cancel" => "Cance",
				
//Dashboard
	
	
			"index_GraphTitel" => "PRODUCT SALLED PERCENTAG",
			"index_COMPLETED_PROGRESS_IN_SALES" => "COMPLETED PROGRESS IN SALES",
			"index_TODAY_Sales_Percentag" => "TODAY Sales Percentag", 
			"index_Market_Coverage" => "Market Coverage",
			"index_USED" => "USED",
			"index_REVENUE" => "<h5>REVENUE</h5>",
			"index_Month_Incom" => "<h5>Month Incom</h5>",
			"index_Market_Coverage" => "Market Coverage",
			"index_Added_New_Phone_User" => "Added New Phone User.",
			"index_RECENT_ACTIVITY" => "RECENT ACTIVITY",
			"index_TEAM_MEMBERS_ONLINE" => "TEAM MEMBERS ONLINE",
			"index_AVAILABLE" => "AVAILABLE",
			"index_DIRECT_MESSAGE" => "<h5>DIRECT MESSAGE</h5>",
			"elmohandis_paint" => "Mico Poultry Company",
			"dashboards" => "Dashboards",
			
			
//General Reports Users Status (POS)


            "rptActiveUsersPhone_Users_Status_Report_Phone" => "Users Status Report (Phone)",
			"rptActiveUsersPhone_Report_Name_Users_Status_Phone" => "Report Name : Users Status (Phone)",
            "rptActiveUsersPhone_NO" => "NO",
			"rptActiveUsersPhone_User_Name" => "User Name",
			"rptActiveUsersPhone_User_E_mail" => "User E-mail",
			"rptActiveUsersPhone_User_Phone" => "User Phone",
			"rptActiveUsersPhone_Customers_Count" => "Customers Count",
			"rptActiveUsersPhone_Pending_Bills" => "Pending Bills",
			"rptActiveUsersPhone_Status" => "Status",
			"rptActiveUsersPhone_Print_Report" => "Print Report",
			//General Reports User Customers


            "rptUserCustomers_User_Customers_Report" => "User Customers Report",
			"rptUserCustomers_User_Name" => "User Name:",
			"rptUserCustomers_Report_Name_User_Customers" => "Report Name : User Customers:",
			"rptUserCustomers_User_Name" => "User Name:",
			"rptUserCustomers_NO" => "NO",
			"rptUserCustomers_Customer_Name" => "Customer Name",
			"rptUserCustomers_Shop_Name" => "Shop Name",
			"rptUserCustomers_Customer_Phone" => "Customer Phone",
			"rptUserCustomers_REG_Date" => "REG Date",
			"rptUserCustomers_Print_Report" => "Print Report",
//Custome Reports Products Sales-General

     "CrptProductsSalesGeneral_Customers_Performers_Report" => "Customers Peformers Report",
	 "CrptProductsSalesGeneral_Customers_Performance" => "Customers peformers Report",
	 "CrptProductsSalesGeneral_ReportName" => "Report Name",	
	  "rptUserCustomers_Performance" => "Peformence",	
	  
	 
			  				
//Users Managment Add New User (Admin)
			
			
			"NewUser_Password_Notes" => "<h4>Password Notes</h4>
                <ul>
                  <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
                  <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>",
			"NewUser_Add_New_User_web" => "Add New User (Administrative)",
			"NewUser_User_Name" => "User Name",
			"NewUser_Enter_User_Full_Name"=> "Enter user full name",
			"NewUser_User_E_maile" => "User E-mail",
			"Enter_NewUser_User_E_maile" => "Enter User E-mail",
			"NewUser_User_Phone" => "User Phone",
			"Enter_NewUser_User_Phone" => "Enter User Phone",
			"NewUser_Phone_number_should_be_start_with" => "Phone number should be start with 00249, ex. 00249xxxxxxxxx.",
			"NewUser_User_Password" => "User Password",
			"NewUser_Confirm_password" => "Confirm password",
			"NewUser_Admin_Accout_All_Pages_allwed" => "Admin Accout — All Pages allwed",
			"NewUser_Sales_Administration_Pages_Allowed" => "Sales Administration — Pages Allowed (Pagge1,Page2,Pag3)",
			"NewUser_Financial_Management_Pages_Allowed" => "Financial Management — Pages Allowed (Pagge1,Page2,Pag3)",
			"NewUser_Production_Management_Pages_Allowed" => "Production Management — Pages Allowed (Pagge1,Page2,Pag3)",
			
			
			
//Add New User (Admin)Users List


            "NewUser_Users_List" => "Users List",
			"NewUser_User_Name" => "User Name",
			"NewUser_User_E_mail" => "User E-mail",
			"NewUser_User_Phone" => "User Phone",
			"NewUser_User_Privileges" => "User Privileges",
			"NewUser_Status" => "Status",


//Custome Reports Sales Revenue-Per Product


			  "CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report" => "Sales Revenue (PerProduct) Report",
			  "CrptSalesRevenuePerProduct_Product_Name" => "Product Name",
			  "CrptSalesRevenuePerProduct_Date_Range" => "Date Range",
			  "CrptSalesRevenuePerProduct_To" => "To",
			  "CrptSalesRevenuePerProduct_Select_date_range" => "Select date range",
			  "CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct" => "Report Name : Sales Revenue (PerProduct)",
			  "CrptSalesRevenuePerProduct_NO" => "NO",
			  "CrptSalesRevenuePerProduct_Vendor" => "Vendor",
			  "CrptSalesRevenuePerProduct_Product_Name" => "Product Name",
			  "CrptSalesRevenuePerProduct_Packages_Name" => "Packages Name",
			  "CrptSalesRevenuePerProduct_Sales_QTY" => "Sales QTY",
			  "CrptSalesRevenuePerProduct_Product_Cost" => "Product Cost",
			  "CrptSalesRevenuePerProduct_Product_Price" => "Product Price",
			  "CrptSalesRevenuePerProduct_Cost_Revenue" => "Cost Revenue",
			  "CrptSalesRevenuePerProduct_Sales_Revenue" => "Sales Revenue",
			  "CrptSalesRevenuePerProduct_Sales_Date" => "Sales Date",
			  "CrptSalesRevenuePerProduct_Total" => "Total",
			  "CrptSalesRevenuePerProduct_Preview_Report" => "Preview Report",
			  "CrptSalesRevenuePerProduct_Print_Report" => "Print Report",
			  
			  
			  			
			
//Users Managment Add New User (Pos)


            "NewUserPhone_Password_Notes" => "<h4>Password Notes</h4>
                <ul>
                  <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
                  <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>",
			"NewUserPhone_Add_New_User_web" => "Add New User (POS)",
			"NewUserPhone_User_Name" => "User Name",
			"Enter_NewUserPhone_User_Name" => "Enter_User Name",
			"NewUserPhone_User_E_mail" => "User E-mail",
			"Enter_NewUserPhone_User_E_mail" => "User E-mail",
			"NewUserPhone_User_Phone" => "User Phone",
			"Enter_NewUserPhone_User_Phone" => "Enter User Phone",
			"NewUserPhone_Phone_number_should_be_start_with" => "Phone number should be start with 00249, eg. 00249xxxxxxxxx",
			"NewUserPhone_User_Password" => "User Password",
			"Enter_NewUserPhone_User_Password" => "Enter User Password",
			"Enter NewUserPhone_User_Password" => "Enter User Password",
			"NewUserPhone_Confirm_password" => "Confirm password",
			"Enter_NewUserPhone_Confirm_password" => "Enter Confirm password",
			"NewUserPhone_User_Privileges" => "User Privileges",
			"NewUserPhone_Phone_User_Pages_Allowed_All" => "Phone User — Pages Allowed (All)",

			  
			  
//Custome Reports Sales Revenue-Per Product


			  "CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report" => "Sales Revenue (PerProduct) Report",
			  "CrptSalesRevenuePerProduct_Product_Name" => "Product Name",
			  "CrptSalesRevenuePerProduct_Date_Range" => "Date Range",
			  "CrptSalesRevenuePerProduct_To" => "To",
			  "CrptSalesRevenuePerProduct_Select_date_range" => "Select date range",
			  "CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct" => "Report Name : Sales Revenue (PerProduct)",
			  "CrptSalesRevenuePerProduct_NO" => "NO",
			  "CrptSalesRevenuePerProduct_Vendor" => "Vendor",
			  "CrptSalesRevenuePerProduct_Product_Name" => "Product Name",
			  "CrptSalesRevenuePerProduct_Packages_Name" => "Packages Name",
			  "CrptSalesRevenuePerProduct_Sales_QTY" => "Sales QTY",
			  "CrptSalesRevenuePerProduct_Product_Cost" => "Product Cost",
			  "CrptSalesRevenuePerProduct_Product_Price" => "Product Price",
			  "CrptSalesRevenuePerProduct_Cost_Revenue" => "Cost Revenue",
			  "CrptSalesRevenuePerProduct_Sales_Revenue" => "Sales Revenue",
			  "CrptSalesRevenuePerProduct_Sales_Date" => "Sales Date",
			  "CrptSalesRevenuePerProduct_Total" => "Total",
			  "CrptSalesRevenuePerProduct_Preview_Report" => "Preview Report",
			  "CrptSalesRevenuePerProduct_Print_Report" => "Print Report",
			  			
			
//Add New User (Pos)Users List


            "NewUserPhone_Users_List" => "Users List",
			"NewUserPhone_User_Name" => "User Name",
			"Enter_NewUserPhone_User_Name" => "Enter User Name",
			"NewUserPhone_User_E_mail" => "User E-mail",
			"Enter_NewUserPhone_User_E_mail" => "Enter User E-mail",
			"NewUserPhone_User_Phone" => "User Phone",
			"Enter_NewUserPhone_User_Phone" => "Enter User Phone",
			"NewUserPhone_User_Privileges" => "User Privileges",
			"NewUserPhone_Status" => "Status",
			
			
			
//Users Managment System Setting


			"SystemSetting_SystemSetting" => "SystemSetting",
			"SystemSetting_Working_Days" => "Working Days",
			"SystemSetting_Main_Graph" => "Main Graph",
	 		"SystemSetting_Main_Graph_Settings" => "Main Graph Settings",			
			"SystemSetting_Accountin_System_Integration" =>"Accountin System Integration",
			"SystemSetting_Users_Pages_Privilegess" =>"Users Pages Privileges",
			"SystemSetting_Working_Days_Settings" =>"Working Days Settings",
			"SystemSetting_Accounting_System_Integrations_Settings" =>"Accounting System Integrations Settings",
			"SystemSetting_Users_Pages_Privileges" =>"Users Pages Privileges",
			"SystemSetting_Active" => "Active",
			"SystemSetting_Not_Active" => "Not Active",
			"SystemSetting_QuickBooks" => "QuickBooks",
			"SystemSetting_Odoo" => "Odoo",
			"SystemSetting_Pages_Privileges" => "Names Pages",
			"SystemSetting_Save" => "Save",
			"SystemSetting_Cancel" => "Cancel",

			
		
			
			
//System Setting Main Graph 


 //Custome Reports Products Sales-Per Product


			  "CrptProductsSalesPerProduc_Products_Sales_PerProduct_Report" => "Products Sales (PerProduct) Report",
			  "CrptProductsSalesPerProduc_Product_Name" => "Product Name",
			  "CrptProductsSalesPerProduc_Date_Range" => "Date Range",
			  "CrptProductsSalesPerProduc_To" => "To",
			  "CrptProductsSalesPerProduc_Select_date_range" => "Select date range",
			  "CrptProductsSalesPerProduc_Report_Name_Products_Sales_PerProduc" => "Report Name : Products Sales-PerProduc",
			  "CrptProductsSalesPerProduc_NO" => "NO",
			  "CrptProductsSalesPerProduc_Vendor" => "Vendor",
			  "CrptProductsSalesPerProduc_Product_Name" => "Product Name",
			  "CrptProductsSalesPerProduc_Packages_Name" => "Packages Name",
			  "CrptProductsSalesPerProduc_Sales_QTY" => "Sales QTY",
			  "CrptProductsSalesPerProduc_Sales_Date" => "Sales Date",
			  "CrptProductsSalesPerProduc_Preview_Report" => "Preview Report",
			  "CrptProductsSalesPerProduc_Print_Report" => "Print Report",
			  
//System Setting Working Days



			"SystemSetting_Working_Days_List" => "Working Days List",
			"SystemSetting_Day_of_the_week" => "Day of the week",
			"SystemSetting_Working_Day" => "Working Day?",
			"SystemSetting_Saturday" => "Saturday",
			"SystemSetting_Sunday" => "Sunday",
			"SystemSetting_Monday" => "Monday",
			"SystemSetting_Tuesday" => "Tuesday",
			"SystemSetting_Wednesday" => "Wednesday",
			"SystemSetting_Thursday" => "Thursday",
			"SystemSetting_Friday" => "Friday",
			
			
//System Setting Accounting System Integrations


			"SystemSetting_System_Name" => "System Name",
			"SystemSetting_IP_Address" => "IP Addressm",
			//"SystemSetting_Server_IP_Address" => "Server IP Address",
			"SystemSetting_Organization_Name" => "Organization Name",
			"SystemSetting_User_Name" => "User Name",
			"SystemSetting_Organization_Password" => "Organization Password",
			"SystemSetting_Re_Password" => "Re-Password",
			"SystemSetting_Enter_Server_IP" => "Enter Serve IP",
			"SystemSetting_Enter_Organization_Name" => "Enter Organization Name",
			"SystemSetting_Ente_User_Name" => "Ente User Name",
			"SystemSetting_Enter_Organization_Password" => "Enter Organization Password",
			"SystemSetting_Enter_Re_Enter_Password" => "Enter Re-Enter Password",
			
			
//System Setting Accounting System Integrations Accounting System Configration


            "SystemSetting_Accounting_System_Configration" => "Accounting System Configration",
			"SystemSetting_System_Name" => "System Name",
			//"SystemSetting_Server_IP_Address" => "Server IP Address",
			"SystemSetting_Organization_Name" => "Organization Name",
			"SystemSetting_User_Name" => "User Name",
			
										
//Products Managment Products Vendors			
			
			
			"Vendors_Add_New_Products_Vendors" => "Add New Products Vendors",
			"Vendors_Vendor_Name" => "Vendor Name",
			"Vendors_Vendor_Phone" => "Vendor Phone",
			"Vendors_Vendor_Tell" => "Vendor Tell",
			"Vendors_Company_Name" => "Company Name",
			//"Vendors_Company_Name" => "Company Name",
			"Vendors_Company_Address" => "Company Address",
			"Vendors_Company_Addresss" => "Enter Company Address",
			
			
			
//Trucks Shipmentment New Shipmentment


              "NewShipmentment_Product_Shipmentment" => "Product Shipmentment",
			  "NewShipmentment_Product_Name" => "Product Name",
			  "NewShipmentment_Product_Package_Price" => "Product Package Price",
			  "NewShipmentment_Quantity" => "Quantity",
			  "NewShipmentment_Total_Price" => "Total Price",
			  "NewShipmentment_Add_to_Truck" => "Add to Truck",
			  "NewShipmentment_Print_Shipped_Products" => "Print Shipped Products",
			  "NewShipmentment_Select_Product_Name" => "Select Product Name",
			  //"NewShipmentment_Product_Name" => "Product Name",
			  "NewShipmentment_Store_Name" => "Store Name",
			  "NewShipmentment_Avalable_QTY" => "Avalable QTY: ",
			  "NewShipmentment_Enter_QTY" => "Enter QTY",
			  "NewShipmentment_List_of_Shipped_Products" => "List of Shipped Products",
			  "NewShipmentment_Customers_Requests" => "Customers Requests",
			  "NewShipmentment_Proposed_Quantities" => "Proposed Quantities",
			  "NewShipmentment_Payment_Status" => "Payment Status",
			  "NewShipmentment_Update_Returned_Value" => "Update Returned Value",
			  "NewShipmentment_Shipping_ID" => "Shipping ID",
			  "NewShipmentment_Returned_Value" => "Returned Value",
			  "NewShipmentment_Enter_Returned_Value" => "Enter Returned Value",
			  "NewShipmentment_Cancel" => "Cancel",
			  "NewShipmentment_Add_Returned" => "Add Returned",
			  
			  
			
			
//General Reports Trucks Shipmentments


             "rptTrucksShipmentment_Trucks_Shipmentments_Report" => "Trucks & Shipmentments Report",
			 "rptTrucksShipmentment_User_Name" => "User Name",
			 "rptTrucksShipmentment_Date_Range" => "Date Range",
			 "rptTrucksShipmentment_To" => "To",
			 "rptTrucksShipmentment_Select_date_range" => "Select date range",
			 "rptTrucksShipmentment_Report_Name_Trucks_Shipmentments" => "Report Name : Trucks & Shipmentments",
			 "rptTrucksShipmentment_NO" => "NO",
			 "rptTrucksShipmentment_Product_Name" => "Product Name",
			 "rptTrucksShipmentment_Product_QTY" => "Product QTY",
			 "rptTrucksShipmentment_Product_Package_Price" => "Product Package Price",
			 "rptTrucksShipmentment_Product_Total_Price" => "Total Price",
			 "rptTrucksShipmentment_Shipping_Date" => "Shipping Date",
			 "rptTrucksShipmentment_Payment_Status" => "Payment Status",
			 "rptTrucksShipmentment_Preview_Report" => "Preview Report",
			 "rptTrucksShipmentment_Print_Report" => "Print Report",
			 			
			
//Products Managment Products Vendors Packages List
			
			"products_vendors" => "Products Vendor",
			"Vendors_Packages_List" => "Packages List",
			"Vendors_Vendor_Namee" => "Enter Vendor Name",
			"Vendors_Vendor_Phonee" => "Enter Vendor Phone",
			"Vendors_Vendor_Telll" => "Enter Vendor Tell",
			"Vendors_Company_Name" => "Company Name",
			"Vendors_Enter_Vendors_Company_Name" => "Enter Company Name",
			
	
			
//Products Managment Products Packages
			
			"Products_Packages" => "Products Packages",
			"Packages_Add_New_Products_Packages" => "Add New Products Packages",
			"Packages_Package_Name" => "Package Name",
			"Enter_Packages_Package_Name" => "Enter Pakage Name",
			"Packages_Package_Abbreviation" => "Package Abbreviation",
			"Enter_Packages_Package_Abbreviation" => "Enter Package Abbreviation ",
			
			
//Products Managment Products Packages Packages List
			
			
			"Packages_Packages_List" => "Packages List",
			"Packages_Package_Name" => "Package Name",
			"Enter_Packages_Package_Name" => "Enter Pakage Name",
			"Packages_Package_Abbreviation" => "Package Abbreviation",
			"Enter_Packages_Package_Abbreviation" => "Enter Package Abbreviation",
			
//Products Managment Add New Product

             
			 "NewProduct_Add_New_Product" => "Add New Product",
			 "ADD_NEW_Products" => "Add New Product",
			 "NewProduct_Product_Name" => "Product Name",
			 "NewProduct_Product_Status" => "Product Status",
			 "NewProduct_Product_Vendor" => "Product Vendor",
			 "NewProduct_Is_Product_with_managed_inventory" => "Is Product with managed inventory",
			 "NewProduct_Product_Descriptions" => "Product Descriptions",
			 "NewProduct_Active" => "Active",
			"NewProduct_Not_Active" => "Not Active",
			"NewProduct_Enter_Product_Name" => "Enter Product Name",
			 
//Products Managment Add New Product Product List
			 
			 
			 "NewProduct_Product_List" => "Product List",
			 "NewProduct_Product_Name" => "Product Name",
			 "NewProduct_Product_Vendor" => "Product Vendor",
			 "NewProduct_Product_Status" => "Product Status",
			 "NewProduct_managed" => "managed",
			 "NewProduct_featured" => "Featured",
			 
			 
//Products Managment Pricing Products Prices List


             "PricingProducts_Products_Prices" => "Products Prices",
			  "Pricing_Products" => "Pricing Products",
			 "PricingProducts_Select_Product_Name" => "Select Product Name",
			 "PricingProducts_Select_Product_Package" => "Select Product Package",
			 "PricingProducts_Product_Package_Price" => "Product Package Price",
			 "Enter_PricingProducts_Product_Package_Price" => "Enter Product Package Price",
			 "PricingProducts_Product_Package_Cost" => "Product Package Cost",
			 "Enter_PricingProducts_Product_Package_Cost" => "Enter Product Package Cost",
			 
			 
//Products Managment Pricing Products  


			 "PricingProducts_Prices_List" => "Prices List",
			 "PricingProducts_Product_Name" => "Product Name",
			 "PricingProducts_Package" => "Package",
			 "PricingProducts_Product_Price" => "Product Price",
			 "PricingProducts_Product_Cost" => "Product Cost",
			 "PricingProducts_Set_Date" => "Set Date",
	
	
//Customer Managment Customer Classes


             "CustomersClasse_Create_Customer_Classes" => "Create Customer Classes",
			 "Manage_Users_Customers" => "Manage Users Customers",
			 "Store_Management" => "Store Management",
			 "User_Customers" => "User Customers",
			 "Users_Status_POS" => "Users Status-POS",
			 "Users_status_admin" => "Users Status - Admin",
			 "General_Reports" => "General Reports",
			 "ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class" => "This section indicates which client will be offered for this Class",
			 "Customer_Loaction_in_Map" => "Customer Loaction in Map",
			 "Sales_Revenue_Per_Product" => "Sales Revenue - Per Product",
			 "Sales_Revenue_General" => "Sales Revenue (General)",
			 "Products_Sales_Per_Product" => "Products Sales (PerProduct)",
			 "Products_Sales_Genral" => "Products Sales-General",
			 "Customer_Performance" => "Customer Peformance",
			  "Custome_Reports" => "Customers Reports",
			 "Receipts_Payment" => "Receipts Payment",
			 "Customers_Pending_Bills" => "Customers Pending Bills",
			 "Trucks_Shipmentment" => "Trucks Shipmentment",
			  "Product_Packages_and_Price" => "Product Packages & Price",
			 "Customers_Classification" => "Customers Classification",
			 "Classes_Configrations" => "Classes Configrations",
			 "Customers_Classe" => "Customers Classe",
			 "Customers_Management" => "Customers Management",
			 "Add_New_Customer" => "Add New Customers ",
			 "CustomersClasse_Class_Name" => "Class Name",
			 "Enter_CustomersClasse_Class_Name" => "Enter Class Name",
			 "CustomersClasse_Classe_Code" => "Classe Code",
			 "Enter_CustomersClasse_Classe_Code" => "Enter Classe Code",
			 "CustomersClasse_Class_Sales_Status" => "Class Sales Status",
			 "CustomersClasse_Select_Store_Status" => "Select StoreىStatus",
			 "CustomersClasse_Active" => "Active",
			 "CustomersClasse_Not_Active" => "NotActive",
			 
			 
//Customer Managment Customer Classes Store List


             "CustomersClasse_Store_List" => "Store List",
			 "CustomersClasse_Class_Name" => "Class Name",
			 "CustomersClasse_Status" => "Status",			 


//Customer Managment Classes Configrations


             //"ClassesConfigrations_Customers_Classes_Configurations" => "Customers Classes Configurations",
			 //"ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class" => "This section indicates which client will be offered for this Class",
			 //
			 //
			 "ClassesConfigrations_Minimum_Registration_Period" => "Minimum Registration Period",
			 
			 
			 //
			 
			 
			 "ClassesConfigrations_Customers_Classes_List" => "Customers Classes List",
			 "ClassesConfigrations_Customers_Classes_Configurations" => "Customers Classes Configurations",
			 "ClassesConfigrations_Configrations" => "Configrations",
			 "ClassesConfigrations_UPDATE" => "UPDAT",
			 "ClassesConfigrations_Minimum_Registration_Period" => "Minimum Registration Period",
			 "ClassesConfigrations_Enter_Registration_Period_Per_day" => "Enter Registration Period Per-day",
			 "ClassesConfigrations_Enter_Registration_Period" => "Enter Registration Period",
			 "ClassesConfigrations_Minimum_Sales_Consumed" => "Minimum Sales Consumed",
			 "ClassesConfigrations_weekly" => "weekly",
			 "ClassesConfigrations_Enter_Sales_Consumed_Per_Product" => " Enter Sales Consumed Per-Product",
			 "ClassesConfigrations_Select_Product_Name" => "Select Product Name",
			 "ClassesConfigrations_Enter_Product_QTY" => "Enter Product QTY",
			 "ClassesConfigrations_Minimum_Sales_Amount" => "Minimum Sales Amount",
			 "ClassesConfigrations_weekly" => "weekly",
			 "ClassesConfigrations_Enter_Sales_Amount_Per_day" => "Enter Sales Amount Per-day",
			 "ClassesConfigrations_Enter_Sales_Amount" => "Enter Sales Amount",
			 "ClassesConfigrations_Configrations" => "Configrations",
			 "ClassesConfigrations_Maximum_Sales_QTY" => "Maximum Sales QTY",
			 "ClassesConfigrations_Daily" => "Dailys",
			 "ClassesConfigrations_Enter_Sales_Consumed_Per_Product" => "Enter Sales Consumed Per-Product",
			 "ClassesConfigrations_Maximum_Sales_Amount" => "Maximum Sales Amount",
			 "ClassesConfigrations_Daily" => "Daily",
			 "ClassesConfigrations_Enter_Sales_Amount_Per_day" => "Enter Sales Amount Per day",
			 "ClassesConfigrations_Sales_Amount" => "Sales Amount",
			 "ClassesConfigrations_Maximum_Installment_QTY" => " Maximum Installment QTY",
			 "ClassesConfigrations_Per_Product" => "Per-Product",
			 "ClassesConfigrations_Enter_Maximum_Installment_QTY" => "Enter Maximum Installment QTY",
			 "ClassesConfigrations_Maximum_Installment_Amount" => "Maximum Installment Amount",
			 "ClassesConfigrations_Enter_Maximum_Installment_Amount" => "Enter Maximum Installment Amoun",
			 
			 
			 //
			 
			 
			 "CustomersClassification_List_of_Classes" => "List of Classes",
			 "CustomersClassification_Auto_Move" => "Auto Move",
			 "CustomersClassification_REG_Date" => "REG-Date",
			 
			 
			  //
			 
			 
			 "ClassesConfigrations_Customers_Classes_Configrations" => "Customers Classes Configrations",
			 "ClassesConfigrations_This_section_indicates_the_way_of_dealing_with_customers_present_in_this_Class" => "This section indicates the way of dealing with customers present in this Class",
			 

//Customer Managment Customers Classification


//Customer Managment Manage Users Customers

                
			"CustomersManagement_Customers_List" => "Customers List",
			
			
			"CustomersManagement_Users_List" => "Users List",

			 
//Store Managment Create Store


            "CreateStore_Create_New_Store" => "Create New Store",
			"Add_New_Users_Admin" => "Add New Users - Admin",
			"System_setting" => "System Setting",
			"Add_New_Users_pos" => "Add New Users - POS",
			"CreateStore_Store_Name" => "Store Name",
			"Users_management" => "Users Management",
			"CreateStore_Store_Types" => "Store Types",
			"CreateStore_Store_Status" => "Store Status",
			"CreateStore_Enter_Store_Name" => "Enter Store Name",
			"CreateStore_Select_Store_Type" => "Select Store Type",
			"CreateStore_Normal_Store" => "Normal Store",
			"CreateStore_Shipping_Store" => "Shipping Store",
			"CreateStore_Return_Store" => "Return Store",
			"CreateStore_Select_Store_Status" => "Select_Store_Status",
			"CreateStore_Active" => "Active",
			"CreateStore_Not_Active" => "Not_Active",
			"CreateStore_Edit_customer_Class" => "Edit customer Class",
			"CreateStore_Update_Info" => "Update Info",
			"CreateStore_Cancel" => "Cancel",
			


//Store Managment Create Store Store List


             "CreateStore_Store_List" => "Store List",
			 "CreateStore_Store_Name" => "Store Name",
			 "CreateStore_Store_Type" => "Store Type",
			 "CreateStore_Status" => "Status",
			 "CreateStore_Created_Date" => "Created Date",			
			
			 
//Store Managment Product to Store


             "ProductsStore_Add_New_Product_to_Store" => "Add New Product to Store",
			 "Create_Store" => "Create Store",
			 "Products_store" => "Products Store",
			 "New_Shipmentment" => "New Shipmentment",
			 "Customers_Request" => "Customers Requests",
			 "Finance_Management" => "Finance Management",
			 "Finance" => "Finance",
			 "Trucks_and_Shipment" => "Trucks And Shipment",
			 "ProductsStore_Store_Name" => "Store Name",
			 "ProductsStore_Product_Name" => "Product Name",
			 "ProductsStore_Product_QTY" => "Product QTY",
			 "ProductsStore_Select_Store_Name" => "Select Store Name",
			 "ProductsStore_Select_Product_Name" => "Select Product Name",
			 "ProductsStore_Avalable_QTY" => "Avalable QTY: ",
			 "ProductsStore_Enter_Product_QTY" => "Enter Product QTY",
			 
			 
			 //
			 
			 
			 "ProductsStore_Edit_Customers_class_Data" => "Customers class Data",
			  "ProductsStore_Select_Store_Status" => "Selec Store Statu",
			  "ProductsStore_Active" => "Active",
			  "ProductsStore_Not_Active" => "Not Active",
			  "ProductsStore_Update_Info" => "Update Info",
			  "ProductsStore_Cancel" => "Cancel",
			 
			 
//Store Managment Product to Store Store List

              "products_management" => "Products Management",
			  "ProductsStore_Store_List" => "Store List",
			  "ProductsStore_Store_Name" => "Store Name",
			  "ProductsStore_Product_Name" => "Product Name",
			  "ProductsStore_Product_Package" => "Product Package",
			  "ProductsStore_QTY" => "QTY",
			  "ProductsStore_Movement_Type" => "Movement Type",
			  "ProductsStore_Movement_Entre_Date" => "Entre Date",
			  
			  
//Store Managment Product Store  Products In Store


			  "ProductsStore_Products_In_Store" => "Products In Store",
			  "ProductsStore_Store_Namee" => "Store Name",
			  "ProductsStore_Product_Name" => "Product Name",
			  "ProductsStore_Package" => "Package",
			  "ProductsStore_QTY_AVALABLE" => "QTY AVALABLE",

			  
//Trucks Shipmentment Customers Requests


              "CustomersRequests_Customers_Requests" => "Customers Requests",
			  
			  
//Trucks Shipmentment Customers Requests Requests List

			  
			  "CustomersRequests_Requests_List" => "Requests List",
			  "CustomersRequests_Product_Name" => "Product Name",
			  "CustomersRequests_Requested_QTY" => "Requested QTY",
			  "CustomersRequests_Price_Upon_Request" => "Price Upon Request",
			  "CustomersRequests_Customer_Name" => "Customer Name",
			  "CustomersRequests_Customer_Phone" => "Customer Phone",
			  "CustomersRequests_Request_Date" => "Request Date",
			  "CustomersRequests_Request_Status" => "Request Status",
			  

//Trucks Shipmentment Customers Requests Users List


              "CustomersRequests_Users_List" => "Users List",		  

			  
//Trucks Shipmentment New Shipmentment
              
              "New_Shipmentment_Product_Shipment" => "Product Shipment",
              //"NewShipmentment_Product_Shipmentment" => "Product Shipment",
			  //"NewShipmentment_Product_Name" => "Product Name",
			  //"NewShipmentment_Product_Package_Price" => "Product Package Price",
			  //"NewShipmentment_Quantity" => "Quantity",
			  //"NewShipmentment_Total_Price" => "Total Price",
			  //"NewShipmentment_Add_to_Truck" => "Add to Truck",
			  //"NewShipmentment_Print_Shipped_Products" => "Print Shipped Products",

			  
//Trucks Shipmentment New Shipmentment List of Shipped Products
			  
			  
			  //"NewShipmentment_List_of_Shipped_Products" => "List of Shipped Products",
			  //"NewShipmentment_Product_Name" => "Product Name",
			  //"NewShipmentment_Quantity" => "Quantity",
			  //"NewShipmentment_Product_Package_Price" => "Product Package Price",
			  //"NewShipmentment_Total_Price" => "Total Price",
			  //"NewShipmentment_Payment_Status" => "Payment Status",
			  
			  
//Trucks Shipmentment New Shipmentment Users List
			  
			  
			  "NewShipmentment_Users_List" => "Users List-POS",
			
			
//Trucks Shipmentment New Shipmentment Customers Requests
			
			
			//"NewShipmentment_Customers_Requests" => "Customers Requests",
			
			
//Trucks Shipmentment New Shipmentment Proposed Quantities


            //"NewShipmentment_Proposed_Quantities" => "Proposed Quantities",
			
			
//Finance Managment Finance


            "Finance_Finance_Receipt_Payment" => "Finance & Receipt Payment",
			"Finance_Product_Name" => "Product Name",
			"Finance_Product_Package_Price" => "Product Package Price",
			"Finance_Quantity" => "Quantity",
			"Finance_Total_Amount" => "Total Amount",
			"Finance_Remaining_Balance" => "Remaining Balance",
			"Finance_Amount" => "Amount",
			"Finance_Add_Receipt_Payment" => "Add Receipt Payment",
			
			
//Finance Managment Finance User Pending Receipt
			
			
			"Finance_User_Pending_Receipt" => "User Pending Receipt",
			//"Finance_Product_Name" => "Product Name",
			//"Finance_Quantity" => "Quantity",
			//"Finance_Product_Package_Price" => "Product Package Price",
			//"Finance_Total_Amount" => "Total Amount",
			"Finance_Paid_Amount" => "Paid Amount",
			"Finance_Pending_Amount" => "Pending Amount",
			"Finance_Action" => "Action",
			"Finance_Price" => "Price",
			"Finance_Total" => "Total: ",
			"Finance_Shipping_Date" => "Shipping Date",
			
			
//Finance Managment Finance Users List



            "Finance_Users_List" => "Users List",
			
			
//General Reports Users Status (Admin)

            
			"rptActiveUsersWeb_Actives_Users_Report" => "Actives Users Report",
			"rptActiveUsersWeb_Report_Name_Actives_Users_admin" => "Report Name : Actives Users (Admin)",
			"rptActiveUsersWeb_Report_Date" => "Report Date :",			
			"rptActiveUsersWeb_NO" => "NO",
			"rptActiveUsersWeb_User_Name" => "User Name",
			"rptActiveUsersWeb_User_E_mail" => "User E-mail",
			"rptActiveUsersWeb_User_Phone" => "User Phone",
			"rptActiveUsersWeb_User_Privileges" => "User Privileges",
			"rptActiveUsersWeb_Status" => "Status",
			
			"rptActiveUsersWeb_Print_Report" => "Print Report",
			
			

			
			
//General Reports User Customers


            "rptUserCustomers_User_Customers_Report" => "User Customers Report",
			"rptUserCustomers_User_Name" => "User Name:",
			"rptUserCustomers_Report_Name_User_Customers" => "Report Name : User Customers:",
			"rptUserCustomers_User_Name" => "User Name:",
			"rptUserCustomers_NO" => "NO",
			"rptUserCustomers_Customer_Name" => "Customer Name",
			"rptUserCustomers_Shop_Name" => "Shop Name",
			"rptUserCustomers_Customer_Phone" => "Customer Phone",
			"rptUserCustomers_REG_Date" => "REG Date",
			"rptUserCustomers_Print_Report" => "Print Report",
			
			
//General Reports Product Packages & Price 			
             
			 
			 "rptProductsPackagesPrice_Product_Packages_Price_Report" => "Product Packages & Price Report",
			 "rptProductsPackagesPrice_Product_Name" => "Product Name",
			 "rptProductsPackagesPrice_Report_Name_Product_Packages_Price" => "Report Name : Product Packages & Price",
			 "rptProductsPackagesPrice_NO" => "NO",
			 "rptProductsPackagesPrice_Product_Name" => "Product Name",
			 "rptProductsPackagesPrice_Package" => "Package",
			 "rptProductsPackagesPrice_Product_Price" => "Product Price",
			 "rptProductsPackagesPrice_Product_Cost" => "Product Cost",
			 "rptProductsPackagesPrice_REG_Date" => "REG Date",
			 "rptProductsPackagesPrice_Print_Report" => "Print Report",
			 
			 
//General Reports Trucks Shipmentments


             "rptTrucksShipmentment_Trucks_Shipmentments_Report" => "Trucks & Shipmentments Report",
			 "rptTrucksShipmentment_User_Name" => "User Name",
			 "rptTrucksShipmentment_Date_Range" => "Date Range",
			 "rptTrucksShipmentment_To" => "To",
			 "rptTrucksShipmentment_Select_date_range" => "Select date range",
			 "rptTrucksShipmentment_Report_Name_Trucks_Shipmentments" => "Report Name : Trucks & Shipmentments",
			 "rptTrucksShipmentment_NO" => "NO",
			 "rptTrucksShipmentment_Product_Name" => "Product Name",
			 "rptTrucksShipmentment_Product_QTY" => "Product QTY",
			 "rptTrucksShipmentment_Product_Package_Price" => "Product Package Price",
			 "rptTrucksShipmentment_Product_Total_Price" => "Total Price",
			 "rptTrucksShipmentment_Shipping_Date" => "Shipping Date",
			 "rptTrucksShipmentment_Payment_Status" => "Payment Status",
			 "rptTrucksShipmentment_Preview_Report" => "Preview Report",
			 "rptTrucksShipmentment_Print_Report" => "Print Report",
			 
			 
//General Reports Receipts Payment


			  "rptReceiptsPayment_Receipts_Payments_Report" => "Receipts Payments Report",
			  "rptReceiptsPayment_User_Name" => "User Name",
			  "rptReceiptsPayment_Date_Range" => "Date Range",
			  "rptReceiptsPayment_To" => "To",
			  "rptReceiptsPayment_Select_date_range" => "Select date range",
			  "rptReceiptsPayment_Report_Name_Receipts_Payments" => "Report Name : Receipts Payments",
			  "rptReceiptsPayment_NO" => "NO",
			  "rptReceiptsPayment_Product_Name" => "Product Name",
			  "rptReceiptsPayment_Product_QTY" => "Product QTY",
			  "rptReceiptsPayment_Product_Package_Price" => "Product Package Price",
			  "rptReceiptsPayment_Total_Amount" => "Total Amount",
			  "rptReceiptsPayment_Paid_Amount" => "Paid Amount",
			  "rptReceiptsPayment_Pending_Amount" => "Pending Amount",
			  "rptReceiptsPayment_Shipping_Date" => "Shipping Date",
			  "rptReceiptsPayment_Preview_Report" => "Preview Report",
			  "rptReceiptsPayment_Print_Report" => "Print Report",
			  
			  
//Custome Reports Products Sales-General


              "CrptProductsSalesGeneral_Products_Sales_General_Report" => "Products Sales-General Report",
			  "CrptProductsSalesGeneral_Date_Range" => "Date Range",
			  "CrptProductsSalesGeneral_To" => "To",
			  "CrptProductsSalesGeneral_Select_date_range" => "Select date range",
			  "CrptProductsSalesGeneral_Report_Name_Products_Sales_General" => "Report Name : Products Sales-General",
			  "CrptProductsSalesGeneral_Sales_Date" => "Report Date:",
			  "CrptProductsSalesGeneral_NO" => "NO",
			  "CrptProductsSalesGeneral_Vendor" => "Vendor",
			  "CrptProductsSalesGeneral_Product_Name" => "Product Name",
			  "CrptProductsSalesGeneral_Packages_Name" => "Packages Name",
			  "CrptProductsSalesGeneral_Sales_QTY" => "Sales QTY",
			  "CrptProductsSalesGeneral_Sales_Date" => "Sales Date",
			  "CrptProductsSalesGeneral_Preview_Report" => "Preview Report",
			  "CrptProductsSalesGeneral_Print_Report" => "Print Report",
			  "rptActiveUsersWeb_Actives_Users_Report" => "Actives Users Report",

			  

			  
			  
//Custome Reports Sales Revenue-General	


              "CrptSalesRevenueGeneral_Sales_Revenue_General_Report" => "Sales Revenue (General) Report",
			  "CrptSalesRevenueGeneral_Date_Range" => "Date Range",
			  "CrptSalesRevenueGeneral_To" => "To",
			  "CrptSalesRevenueGeneral_Select_date_range" => "Select date range",
			  "CrptSalesRevenueGeneral_Report_Name_Sales_Revenue_General" => "Report Name : Sales Revenue (General)",
			  "CrptSalesRevenueGeneral_NO" => "NO",
			  "CrptSalesRevenueGeneral_Vendor" => "Vendor",
			  "CrptSalesRevenueGeneral_Product_Name" => "Product Name",
			  "CrptSalesRevenueGeneral_Packages_Name" => "Packages Name",
			  "CrptSalesRevenueGeneral_Sales_QTY" => "Sales QTY",
			  "CrptSalesRevenueGeneral_Product_Cost" => "Product Cost",
			  "CrptSalesRevenueGeneral_Product_Price" => "Product Price",
			  "CrptSalesRevenueGeneral_Cost_Revenue" => "Cost Revenue",
			  "CrptSalesRevenueGeneral_Sales_Revenue" => "Sales Revenue",
			  "CrptSalesRevenueGeneral_Sales_Date" => "Sales Date",
			  "CrptSalesRevenueGeneral_Total" => "Total",
			  "CrptSalesRevenueGeneral_Preview_Report" => "Preview Report",
			  "CrptSalesRevenueGeneral_Print_Report" => "Print Report",
			  
			  
//Custome Reports Sales Revenue-Per Product


			  "CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report" => "Sales Revenue (PerProduct) Report",
			  "CrptSalesRevenuePerProduct_Product_Name" => "Product Name",
			  "CrptSalesRevenuePerProduct_Date_Range" => "Date Range",
			  "CrptSalesRevenuePerProduct_To" => "To",
			  "CrptSalesRevenuePerProduct_Select_date_range" => "Select date range",
			  "CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct" => "Report Name : Sales Revenue (PerProduct)",
			  "CrptSalesRevenuePerProduct_NO" => "NO",
			  "CrptSalesRevenuePerProduct_Vendor" => "Vendor",
			  "CrptSalesRevenuePerProduct_Product_Name" => "Product Name",
			  "CrptSalesRevenuePerProduct_Packages_Name" => "Packages Name",
			  "CrptSalesRevenuePerProduct_Sales_QTY" => "Sales QTY",
			  "CrptSalesRevenuePerProduct_Product_Cost" => "Product Cost",
			  "CrptSalesRevenuePerProduct_Product_Price" => "Product Price",
			  "CrptSalesRevenuePerProduct_Cost_Revenue" => "Cost Revenue",
			  "CrptSalesRevenuePerProduct_Sales_Revenue" => "Sales Revenue",
			  "CrptSalesRevenuePerProduct_Sales_Date" => "Sales Date",
			  "CrptSalesRevenuePerProduct_Total" => "Total",
			  "CrptSalesRevenuePerProduct_Preview_Report" => "Preview Report",
			  "CrptSalesRevenuePerProduct_Print_Report" => "Print Report",
			  
			  
//Customer Loaction in Map


              "google_maps_Map_with_Customer_Loaction_List" => "Map with Customer Loaction List",
			  "google_maps_Select_User_Name" => "Select User Name",
			  "google_maps_Select_User_Name" => "Select User Nameء",

              			  	  		  			 


			
			
			"c" => "apple"
			
	)
);
$lang_sesc=$_SESSION['lang_session'];




//Sned Lang Parameters


//Dashboard


$smarty->assign('index_GraphTitel',$Lang[$lang_sesc]['index_GraphTitel']);
$smarty->assign('index_COMPLETED_PROGRESS_IN_SALES',$Lang[$lang_sesc]['index_COMPLETED_PROGRESS_IN_SALES']);
$smarty->assign('index_TODAY_Sales_Percentag',$Lang[$lang_sesc]['index_TODAY_Sales_Percentag']);
$smarty->assign('index_Market_Coverage',$Lang[$lang_sesc]['index_Market_Coverage']);
$smarty->assign('index_USED',$Lang[$lang_sesc]['index_USED']);
$smarty->assign('index_REVENUE',$Lang[$lang_sesc]['index_REVENUE']);
$smarty->assign('index_Month_Incom',$Lang[$lang_sesc]['index_Month_Incom']);
$smarty->assign('index_RECENT_ACTIVITY',$Lang[$lang_sesc]['index_RECENT_ACTIVITY']);
$smarty->assign('index_Added_New_Phone_User',$Lang[$lang_sesc]['index_Added_New_Phone_User']);
$smarty->assign('index_TEAM_MEMBERS_ONLINE',$Lang[$lang_sesc]['index_TEAM_MEMBERS_ONLINE']);
$smarty->assign('index_AVAILABLE',$Lang[$lang_sesc]['index_AVAILABLE']);
$smarty->assign('dashboards',$Lang[$lang_sesc]['dashboards']);
$smarty->assign('elmohandis_paint',$Lang[$lang_sesc]['elmohandis_paint']);
$smarty->assign('index_DIRECT_MESSAGE',$Lang[$lang_sesc]['index_DIRECT_MESSAGE']);


//Users Managment Add New User (Admin)


$smarty->assign('NewUser_Password_Notes',$Lang[$lang_sesc]['NewUser_Password_Notes']);
$smarty->assign('NewUser_Add_New_User_web',$Lang[$lang_sesc]['NewUser_Add_New_User_web']);
$smarty->assign('NewUser_User_Name',$Lang[$lang_sesc]['NewUser_User_Name']);
$smarty->assign('NewUser_Enter_User_Full_Name',$Lang[$lang_sesc]['NewUser_Enter_User_Full_Name']);
$smarty->assign('NewUser_User_E_maile',$Lang[$lang_sesc]['NewUser_User_E_maile']);
$smarty->assign('Enter_NewUser_User_E_maile',$Lang[$lang_sesc]['Enter_NewUser_User_E_maile']);
$smarty->assign('NewUser_User_sPhone',$Lang[$lang_sesc]['NewUser_User_Phone']);
$smarty->assign('Enter_NewUser_User_Phone',$Lang[$lang_sesc]['Enter_NewUser_User_Phone']);
$smarty->assign('NewUser_Phone_number_should_be_start_with',$Lang[$lang_sesc]['NewUser_Phone_number_should_be_start_with']);
$smarty->assign('NewUser_User_Password',$Lang[$lang_sesc]['NewUser_User_Password']);
$smarty->assign('NewUser_Confirm_password',$Lang[$lang_sesc]['NewUser_Confirm_password']);
$smarty->assign('NewUser_Admin_Accout_All_Pages_allwed',$Lang[$lang_sesc]['NewUser_Admin_Accout_All_Pages_allwed']);
$smarty->assign('NewUser_Sales_Administration_Pages_Allowed',$Lang[$lang_sesc]['NewUser_Sales_Administration_Pages_Allowed']);
$smarty->assign('NewUser_Financial_Management_Pages_Allowed',$Lang[$lang_sesc]['NewUser_Financial_Management_Pages_Allowed']);
$smarty->assign('NewUser_Production_Management_Pages_Allowed',$Lang[$lang_sesc]['NewUser_Production_Management_Pages_Allowed']);
$smarty->assign('btn_Save',$Lang[$lang_sesc]['btn_Save']);
$smarty->assign('btn_Cancel',$Lang[$lang_sesc]['btn_Cancel']);


//Add New User (Admin)Users List


$smarty->assign('NewUser_Users_List',$Lang[$lang_sesc]['NewUser_Users_List']);
$smarty->assign('NewUser_User_Name',$Lang[$lang_sesc]['NewUser_User_Name']);
$smarty->assign('NewUser_User_E_mail',$Lang[$lang_sesc]['NewUser_User_E_mail']);
$smarty->assign('NewUser_User_Phone',$Lang[$lang_sesc]['NewUser_User_Phone']);
$smarty->assign('Enter_NewUser_User_Phone',$Lang[$lang_sesc]['Enter_NewUser_User_Phone']);
$smarty->assign('NewUser_User_Privileges',$Lang[$lang_sesc]['NewUser_User_Privileges']);
$smarty->assign('NewUser_Status',$Lang[$lang_sesc]['NewUser_Status']);


//Users Managment Add New User (Pos)


$smarty->assign('NewUserPhone_Password_Notes',$Lang[$lang_sesc]['NewUserPhone_Password_Notes']);
$smarty->assign('NewUserPhone_Add_New_User_web',$Lang[$lang_sesc]['NewUserPhone_Add_New_User_web']);
$smarty->assign('NewUserPhone_User_Name',$Lang[$lang_sesc]['NewUserPhone_User_Name']);
$smarty->assign('Enter_NewUserPhone_User_Name',$Lang[$lang_sesc]['Enter_NewUserPhone_User_Name']);
$smarty->assign('NewUserPhone_User_E_maile',$Lang[$lang_sesc]['NewUserPhone_User_E_mail']);
$smarty->assign('Enter_NewUserPhone_User_E_maile',$Lang[$lang_sesc]['Enter_NewUserPhone_User_E_mail']);
$smarty->assign('NewUserPhone_User_Phone',$Lang[$lang_sesc]['NewUserPhone_User_Phone']);
$smarty->assign('Enbter_NewUserPhone_User_Phone',$Lang[$lang_sesc]['Enter_NewUserPhone_User_Phone']);
$smarty->assign('NewUserPhone_Phone_number_should_be_start_with',$Lang[$lang_sesc]['NewUserPhone_Phone_number_should_be_start_with']);
$smarty->assign('NewUserPhone_User_Password',$Lang[$lang_sesc]['NewUserPhone_User_Password']);
$smarty->assign('Enter_NewUserPhone_User_Password',$Lang[$lang_sesc]['Enter_NewUserPhone_User_Password']);
$smarty->assign('Enter_NewUserPhone_User_Password',$Lang[$lang_sesc]['Enter_NewUserPhone_User_Password']);
$smarty->assign('NewUserPhone_Confirm_password',$Lang[$lang_sesc]['NewUserPhone_Confirm_password']);
$smarty->assign('Enter_NewUserPhone_Confirm_password',$Lang[$lang_sesc]['Enter_NewUserPhone_Confirm_password']);
$smarty->assign('NewUserPhone_User_Privileges',$Lang[$lang_sesc]['NewUserPhone_User_Privileges']);
$smarty->assign('NewUserPhone_Phone_User_Pages_Allowed_All',$Lang[$lang_sesc]['NewUserPhone_Phone_User_Pages_Allowed_All']);


//Add New User (Pos)Users List


$smarty->assign('NewUserPhone_Users_List',$Lang[$lang_sesc]['NewUserPhone_Users_List']);
$smarty->assign('NewUserPhone_User_Name',$Lang[$lang_sesc]['NewUserPhone_User_Name']);
$smarty->assign('Enter_NewUserPhone_User_Name',$Lang[$lang_sesc]['Enter_NewUserPhone_User_Name']);
$smarty->assign('NewUserPhone_User_E_mail',$Lang[$lang_sesc]['NewUserPhone_User_E_mail']);
$smarty->assign('Enter_NewUserPhone_User_E_mail',$Lang[$lang_sesc]['Enter_NewUserPhone_User_E_mail']);
$smarty->assign('NewUserPhone_User_Phone',$Lang[$lang_sesc]['NewUserPhone_User_Phone']);
$smarty->assign('Enter_NewUserPhone_User_Phone',$Lang[$lang_sesc]['Enter_NewUserPhone_User_Phone']);
$smarty->assign('NewUserPhone_User_Privileges',$Lang[$lang_sesc]['NewUserPhone_User_Privileges']);
$smarty->assign('NewUserPhone_Status',$Lang[$lang_sesc]['NewUserPhone_Status']);


//Users Managment System Setting


$smarty->assign('SystemSetting_SystemSetting',$Lang[$lang_sesc]['SystemSetting_SystemSetting']);
$smarty->assign('SystemSetting_Main_Graph',$Lang[$lang_sesc]['SystemSetting_Main_Graph']);
$smarty->assign('SystemSetting_Main_Graph_Settings',$Lang[$lang_sesc]['SystemSetting_Main_Graph_Settings']);	
$smarty->assign('SystemSetting_Working_Days',$Lang[$lang_sesc]['SystemSetting_Working_Days']);
$smarty->assign('SystemSetting_Accounting_System_Integration',$Lang[$lang_sesc]['SystemSetting_Accountin_System_Integration']);
$smarty->assign('SystemSetting_Users_Pages_Privilegess',$Lang[$lang_sesc]['SystemSetting_Users_Pages_Privilegess']);
$smarty->assign('SystemSetting_Working_Days_Settings',$Lang[$lang_sesc]['SystemSetting_Working_Days_Settings']);
$smarty->assign('SystemSetting_Accounting_System_Integrations_Settings',$Lang[$lang_sesc]['SystemSetting_Accounting_System_Integrations_Settings']);
$smarty->assign('SystemSetting_Users_Pages_Privileges',$Lang[$lang_sesc]['SystemSetting_Users_Pages_Privileges']);
$smarty->assign('SystemSetting_Active',$Lang[$lang_sesc]['SystemSetting_Active']);
$smarty->assign('SystemSetting_Not_Active',$Lang[$lang_sesc]['SystemSetting_Not_Active']);
$smarty->assign('SystemSetting_QuickBooks',$Lang[$lang_sesc]['SystemSetting_QuickBooks']);
$smarty->assign('SystemSetting_Odoo',$Lang[$lang_sesc]['SystemSetting_Odoo']);
$smarty->assign('SystemSetting_Save',$Lang[$lang_sesc]['SystemSetting_Save']);
$smarty->assign('SystemSetting_Cancel',$Lang[$lang_sesc]['SystemSetting_Cancel']);
$smarty->assign('SystemSetting_Pages_Privileges',$Lang[$lang_sesc]['SystemSetting_Pages_Privileges']);








//System Setting Main Graph


//System Setting Working Days


$smarty->assign('SystemSetting_Working_Days_List',$Lang[$lang_sesc]['SystemSetting_Working_Days_List']);
$smarty->assign('SystemSetting_Day_of_the_week',$Lang[$lang_sesc]['SystemSetting_Day_of_the_week']);
$smarty->assign('SystemSetting_Working_Day',$Lang[$lang_sesc]['SystemSetting_Working_Day']);
$smarty->assign('SystemSetting_Saturday',$Lang[$lang_sesc]['SystemSetting_Saturday']);
$smarty->assign('SystemSetting_Sunday',$Lang[$lang_sesc]['SystemSetting_Sunday']);
$smarty->assign('SystemSetting_Monday',$Lang[$lang_sesc]['SystemSetting_Monday']);
$smarty->assign('SystemSetting_Tuesday',$Lang[$lang_sesc]['SystemSetting_Tuesday']);
$smarty->assign('SystemSetting_Wednesday',$Lang[$lang_sesc]['SystemSetting_Wednesday']);
$smarty->assign('SystemSetting_Thursday',$Lang[$lang_sesc]['SystemSetting_Thursday']);
$smarty->assign('SystemSetting_Friday',$Lang[$lang_sesc]['SystemSetting_Friday']);


//System Setting Accounting System Integrations 


//
$smarty->assign('SystemSetting_System_Name',$Lang[$lang_sesc]['SystemSetting_System_Name']);
$smarty->assign('SystemSetting_IP_Address',$Lang[$lang_sesc]['SystemSetting_IP_Address']);
//$smarty->assign('SystemSetting_Server_IP_Address',$Lang[$lang_sesc]['SystemSetting_Server_IP_Address']);
$smarty->assign('SystemSetting_Organization_Name',$Lang[$lang_sesc]['SystemSetting_Organization_Name']);
$smarty->assign('SystemSetting_User_Name',$Lang[$lang_sesc]['SystemSetting_User_Name']);
$smarty->assign('SystemSetting_Organization_Password',$Lang[$lang_sesc]['SystemSetting_Organization_Password']);
$smarty->assign('SystemSetting_Re_Password',$Lang[$lang_sesc]['SystemSetting_Re_Password']);
$smarty->assign('SystemSetting_Enter_Server_IP',$Lang[$lang_sesc]['SystemSetting_Enter_Server_IP']);
$smarty->assign('SystemSetting_Enter_Organization_Name',$Lang[$lang_sesc]['SystemSetting_Enter_Organization_Name']);
$smarty->assign('SystemSetting_Ente_User_Name',$Lang[$lang_sesc]['SystemSetting_Ente_User_Name']);
$smarty->assign('SystemSetting_Enter_Organization_Password',$Lang[$lang_sesc]['SystemSetting_Enter_Organization_Password']);
$smarty->assign('SystemSetting_Enter_Re_Enter_Password',$Lang[$lang_sesc]['SystemSetting_Enter_Re_Enter_Password']);


//System Setting Accounting System Integrations Accounting System Configration


$smarty->assign('SystemSetting_Accounting_System_Configration',$Lang[$lang_sesc]['SystemSetting_Accounting_System_Configration']);
$smarty->assign('SystemSetting_System_Name',$Lang[$lang_sesc]['SystemSetting_System_Name']);
//$smarty->assign('SystemSetting_Server_IP_Address',$Lang[$lang_sesc]['SystemSetting_Server_IP_Address']);
$smarty->assign('SystemSetting_Organization_Name',$Lang[$lang_sesc]['SystemSetting_Organization_Name']);
$smarty->assign('SystemSetting_User_Name',$Lang[$lang_sesc]['SystemSetting_User_Name']);


//Products Managment Products Vendors


$smarty->assign('Vendors_Add_New_Products_Vendors',$Lang[$lang_sesc]['Vendors_Add_New_Products_Vendors']);
$smarty->assign('ADD_NEW_Products',$Lang[$lang_sesc]['ADD_NEW_Products']);
$smarty->assign('Vendors_Vendor_Name',$Lang[$lang_sesc]['Vendors_Vendor_Name']);
$smarty->assign('Vendors_Vendor_Phone',$Lang[$lang_sesc]['Vendors_Vendor_Phone']);
$smarty->assign('Vendors_Vendor_Tell',$Lang[$lang_sesc]['Vendors_Vendor_Tell']);
$smarty->assign('Vendors_Company_Name',$Lang[$lang_sesc]['Vendors_Company_Name']);
//$smarty->assign('Vendors_Company_Name',$Lang[$lang_sesc]['Vendors_Company_Name']);
$smarty->assign('Vendors_Company_Address',$Lang[$lang_sesc]['Vendors_Company_Address']);
$smarty->assign('Vendors_Vendor_Namee',$Lang[$lang_sesc]['Vendors_Vendor_Namee']);
$smarty->assign('Vendors_Vendor_Phonee',$Lang[$lang_sesc]['Vendors_Vendor_Phonee']);
$smarty->assign('Vendors_Vendor_Telll',$Lang[$lang_sesc]['Vendors_Vendor_Telll']);
$smarty->assign('Vendors_Company_Addresss',$Lang[$lang_sesc]['Vendors_Company_Addresss']);
$smarty->assign('Vendors_Enter_Vendors_Company_Name',$Lang[$lang_sesc]['Vendors_Enter_Vendors_Company_Name']);



//Products Managment Products Vendors Packages List


$smarty->assign('Vendors_Packages_List',$Lang[$lang_sesc]['Vendors_Packages_List']);
$smarty->assign('Vendors_Vendor_Name',$Lang[$lang_sesc]['Vendors_Vendor_Name']);
$smarty->assign('Vendors_Vendor_Phone',$Lang[$lang_sesc]['Vendors_Vendor_Phone']);
$smarty->assign('Vendors_Vendor_Tell',$Lang[$lang_sesc]['Vendors_Vendor_Tell']);
$smarty->assign('Vendors_Company_Name',$Lang[$lang_sesc]['Vendors_Company_Name']);


//Products Managment Products Packages

$smarty->assign('Products_Packages',$Lang[$lang_sesc]['Products_Packages']);
$smarty->assign('Packages_Add_New_Products_Packages',$Lang[$lang_sesc]['Packages_Add_New_Products_Packages']);
$smarty->assign('Packages_Package_Name',$Lang[$lang_sesc]['Packages_Package_Name']);
$smarty->assign('Enter_Packages_Package_Name',$Lang[$lang_sesc]['Enter_Packages_Package_Name']);
$smarty->assign('Packages_Package_Abbreviation',$Lang[$lang_sesc]['Packages_Package_Abbreviation']);
$smarty->assign('Enter_Packages_Package_Abbreviation',$Lang[$lang_sesc]['Enter_Packages_Package_Abbreviation']);


//Products Managment Products Packages Packages List


$smarty->assign('Packages_Packages_List',$Lang[$lang_sesc]['Packages_Packages_List']);
$smarty->assign('Packages_Package_Name',$Lang[$lang_sesc]['Packages_Package_Name']);
$smarty->assign('Enter_Packages_Package_Name',$Lang[$lang_sesc]['Enter_Packages_Package_Name']);
$smarty->assign('Packages_Package_Abbreviation',$Lang[$lang_sesc]['Packages_Package_Abbreviation']);
$smarty->assign('Enter_Packages_Package_Abbreviation',$Lang[$lang_sesc]['Enter_Packages_Package_Abbreviation']);


//Products Managment Add New Product


$smarty->assign('NewProduct_Add_New_Product',$Lang[$lang_sesc]['NewProduct_Add_New_Product']);
$smarty->assign('NewProduct_Add_New_Product',$Lang[$lang_sesc]['NewProduct_Add_New_Product']);
$smarty->assign('NewProduct_Product_Name',$Lang[$lang_sesc]['NewProduct_Product_Name']);
$smarty->assign('NewProduct_Product_Status',$Lang[$lang_sesc]['NewProduct_Product_Status']);
$smarty->assign('NewProduct_Product_Vendor',$Lang[$lang_sesc]['NewProduct_Product_Vendor']);
$smarty->assign('NewProduct_Is_Product_with_managed_inventory',$Lang[$lang_sesc]['NewProduct_Is_Product_with_managed_inventory']);
$smarty->assign('NewProduct_Product_Descriptions',$Lang[$lang_sesc]['NewProduct_Product_Descriptions']);
$smarty->assign('NewProduct_Active',$Lang[$lang_sesc]['NewProduct_Active']);
$smarty->assign('NewProduct_Not_Active',$Lang[$lang_sesc]['NewProduct_Not_Active']);
$smarty->assign('NewProduct_Enter_Product_Name',$Lang[$lang_sesc]['NewProduct_Enter_Product_Name']);



//Products Managment Add New Product Product List


$smarty->assign('NewProduct_Product_List',$Lang[$lang_sesc]['NewProduct_Product_List']);
$smarty->assign('NewProduct_Product_Name',$Lang[$lang_sesc]['NewProduct_Product_Name']);
$smarty->assign('NewProduct_Product_Vendor',$Lang[$lang_sesc]['NewProduct_Product_Vendor']);
$smarty->assign('NewProduct_Product_Status',$Lang[$lang_sesc]['NewProduct_Product_Status']);
$smarty->assign('NewProduct_managed',$Lang[$lang_sesc]['NewProduct_managed']);
$smarty->assign('NewProduct_featured',$Lang[$lang_sesc]['NewProduct_featured']);


//Products Managment Pricing Products

$smarty->assign('Pricing_Products',$Lang[$lang_sesc]['Pricing_Products']);
$smarty->assign('PricingProducts_Products_Prices',$Lang[$lang_sesc]['PricingProducts_Products_Prices']);
$smarty->assign('PricingProducts_Select_Product_Name',$Lang[$lang_sesc]['PricingProducts_Select_Product_Name']);
$smarty->assign('PricingProducts_Select_Product_Package',$Lang[$lang_sesc]['PricingProducts_Select_Product_Package']);
$smarty->assign('PricingProducts_Product_Package_Price',$Lang[$lang_sesc]['PricingProducts_Product_Package_Price']);
$smarty->assign('PricingProducts_Product_Package_Price',$Lang[$lang_sesc]['PricingProducts_Product_Package_Price']);
$smarty->assign('Enter_PricingProducts_Product_Package_Price',$Lang[$lang_sesc]['Enter_PricingProducts_Product_Package_Price']);
$smarty->assign('PricingProducts_Product_Package_Cost',$Lang[$lang_sesc]['PricingProducts_Product_Package_Cost']);
$smarty->assign('Enter_PricingProducts_Product_Package_Cost',$Lang[$lang_sesc]['Enter_PricingProducts_Product_Package_Cost']);


//Products Managment Pricing Products Prices List


$smarty->assign('PricingProducts_Prices_List',$Lang[$lang_sesc]['PricingProducts_Prices_List']);
$smarty->assign('PricingProducts_Product_Name',$Lang[$lang_sesc]['PricingProducts_Product_Name']);
$smarty->assign('PricingProducts_Package',$Lang[$lang_sesc]['PricingProducts_Package']);
$smarty->assign('PricingProducts_Product_Price',$Lang[$lang_sesc]['PricingProducts_Product_Price']);
$smarty->assign('PricingProducts_Product_Cost',$Lang[$lang_sesc]['PricingProducts_Product_Cost']);
$smarty->assign('PricingProducts_Set_Date',$Lang[$lang_sesc]['PricingProducts_Set_Date']);


//Customer Managment Customer Classes

$smarty->assign('Add_New_Customer',$Lang[$lang_sesc]['Add_New_Customer']);
$smarty->assign('Customers_Management',$Lang[$lang_sesc]['Customers_Management']);
$smarty->assign('Customers_Classe',$Lang[$lang_sesc]['Customers_Classe']);
$smarty->assign('Classes_Configrations',$Lang[$lang_sesc]['Classes_Configrations']);
$smarty->assign('Manage_Users_Customers',$Lang[$lang_sesc]['Manage_Users_Customers']);
$smarty->assign('CustomersClasse_Create_Customer_Classes',$Lang[$lang_sesc]['CustomersClasse_Create_Customer_Classes']);
$smarty->assign('Store_Management',$Lang[$lang_sesc]['Store_Management']);
$smarty->assign('User_Customers',$Lang[$lang_sesc]['User_Customers']);
$smarty->assign('Users_Status_POS',$Lang[$lang_sesc]['Users_Status_POS']);
$smarty->assign('Users_status_admin',$Lang[$lang_sesc]['Users_status_admin']);
$smarty->assign('Customers_Classification',$Lang[$lang_sesc]['Customers_Classification']);
$smarty->assign('CustomersClasse_Class_Name',$Lang[$lang_sesc]['CustomersClasse_Class_Name']);
$smarty->assign('Enter_CustomersClasse_Class_Name',$Lang[$lang_sesc]['Enter_CustomersClasse_Class_Name']);
$smarty->assign('CustomersClasse_Classe_Code',$Lang[$lang_sesc]['CustomersClasse_Classe_Code']);
$smarty->assign('Enter_CustomersClasse_Classe_Code',$Lang[$lang_sesc]['Enter_CustomersClasse_Classe_Code']);
$smarty->assign('CustomersClasse_Class_Sales_Status',$Lang[$lang_sesc]['CustomersClasse_Class_Sales_Status']);
$smarty->assign('CustomersClasse_Select_Store_Status',$Lang[$lang_sesc]['CustomersClasse_Select_Store_Status']);
$smarty->assign('CustomersClasse_Active',$Lang[$lang_sesc]['CustomersClasse_Active']);
$smarty->assign('CustomersClasse_Not_Active',$Lang[$lang_sesc]['CustomersClasse_Not_Active']);


		 
// Dashboard Report


$smarty->assign('Custome_Reports',$Lang[$lang_sesc]['Custome_Reports']);
$smarty->assign('General_Reports',$Lang[$lang_sesc]['General_Reports']);
$smarty->assign('ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class',$Lang[$lang_sesc]['ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class']);
$smarty->assign('Customer_Loaction_in_Map',$Lang[$lang_sesc]['Customer_Loaction_in_Map']);
$smarty->assign('Sales_Revenue_Per_Product',$Lang[$lang_sesc]['Sales_Revenue_Per_Product']);
$smarty->assign('Sales_Revenue_General',$Lang[$lang_sesc]['Sales_Revenue_General']);
$smarty->assign('Products_Sales_Per_Product',$Lang[$lang_sesc]['Products_Sales_Per_Product']);
$smarty->assign('Products_Sales_Genral',$Lang[$lang_sesc]['Products_Sales_Genral']);
$smarty->assign('Customer_Performance',$Lang[$lang_sesc]['Customer_Performance']);
$smarty->assign('Trucks_Shipmentment',$Lang[$lang_sesc]['Trucks_Shipmentment']);
$smarty->assign('Customers_Pending_Bills',$Lang[$lang_sesc]['Customers_Pending_Bills']);
$smarty->assign('Receipts_Payment',$Lang[$lang_sesc]['Receipts_Payment']);
$smarty->assign('Product_Packages_and_Price',$Lang[$lang_sesc]['Product_Packages_and_Price']);
$smarty->assign('rptActiveUsersWeb_User_Name',$Lang[$lang_sesc]['rptActiveUsersWeb_User_Name']);


//Customer Managment Customer Classes Store List


$smarty->assign('CustomersClasse_Store_List',$Lang[$lang_sesc]['CustomersClasse_Store_List']);
$smarty->assign('CustomersClasse_Class_Name',$Lang[$lang_sesc]['CustomersClasse_Class_Name']);
$smarty->assign('CustomersClasse_Status',$Lang[$lang_sesc]['CustomersClasse_Status']);


//Customer Managment Classes Configrations


//$smarty->assign('ClassesConfigrations_Customers_Classes_Configurations',$Lang[$lang_sesc]['ClassesConfigrations_Customers_Classes_Configurations']);
//$smarty->assign('ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class',$Lang[$lang_sesc]['ClassesConfigrations_This_section_indicates_which_client_will_be_offered_for_this_Class']);
//
//
$smarty->assign('ClassesConfigrations_Minimum_Registration_Period',$Lang[$lang_sesc]['ClassesConfigrations_Minimum_Registration_Period']);

//

$smarty->assign('ClassesConfigrations_Customers_Classes_List',$Lang[$lang_sesc]['ClassesConfigrations_Customers_Classes_List']);
$smarty->assign('ClassesConfigrations_Customers_Classes_Configurations',$Lang[$lang_sesc]['ClassesConfigrations_Customers_Classes_Configurations']);
$smarty->assign('ClassesConfigrations_Configrations',$Lang[$lang_sesc]['ClassesConfigrations_Configrations']);
$smarty->assign('ClassesConfigrations_UPDATE',$Lang[$lang_sesc]['ClassesConfigrations_UPDATE']);
$smarty->assign('ClassesConfigrations_Minimum_Registration_Period',$Lang[$lang_sesc]['ClassesConfigrations_Minimum_Registration_Period']);
$smarty->assign('ClassesConfigrations_Enter_Registration_Period_Per_day',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Registration_Period_Per_day']);
$smarty->assign('ClassesConfigrations_Enter_Registration_Period',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Registration_Period']);
$smarty->assign('ClassesConfigrations_Minimum_Sales_Consumed',$Lang[$lang_sesc]['ClassesConfigrations_Minimum_Sales_Consumed']);
$smarty->assign('ClassesConfigrations_weekly',$Lang[$lang_sesc]['ClassesConfigrations_weekly']);
$smarty->assign('ClassesConfigrations_Enter_Sales_Consumed_Per_Product',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Sales_Consumed_Per_Product']);
$smarty->assign('ClassesConfigrations_Select_Product_Name',$Lang[$lang_sesc]['ClassesConfigrations_Select_Product_Name']);
$smarty->assign('ClassesConfigrations_Enter_Product_QTY',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Product_QTY']);
$smarty->assign('ClassesConfigrations_Minimum_Sales_Amount',$Lang[$lang_sesc]['ClassesConfigrations_Minimum_Sales_Amount']);
$smarty->assign('ClassesConfigrations_weekly',$Lang[$lang_sesc]['ClassesConfigrations_weekly']);
$smarty->assign('ClassesConfigrations_Enter_Sales_Amount_Per_day',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Sales_Amount_Per_day']);
$smarty->assign('ClassesConfigrations_Enter_Sales_Amount',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Sales_Amount']);
$smarty->assign('ClassesConfigrations_Configrations',$Lang[$lang_sesc]['ClassesConfigrations_Configrations']);
$smarty->assign('ClassesConfigrations_Maximum_Sales_QTY',$Lang[$lang_sesc]['ClassesConfigrations_Maximum_Sales_QTY']);
$smarty->assign('ClassesConfigrations_Daily',$Lang[$lang_sesc]['ClassesConfigrations_Daily']);
$smarty->assign('ClassesConfigrations_Enter_Sales_Consumed_Per_Product',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Sales_Consumed_Per_Product']);
$smarty->assign('ClassesConfigrations_Maximum_Sales_Amount',$Lang[$lang_sesc]['ClassesConfigrations_Maximum_Sales_Amount']);
$smarty->assign('ClassesConfigrations_Daily',$Lang[$lang_sesc]['ClassesConfigrations_Daily']);
$smarty->assign('ClassesConfigrations_Enter_Sales_Amount_Per_day',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Sales_Amount_Per_day']);
$smarty->assign('ClassesConfigrations_Sales_Amount',$Lang[$lang_sesc]['ClassesConfigrations_Sales_Amount']);
$smarty->assign('ClassesConfigrations_Maximum_Installment_QTY',$Lang[$lang_sesc]['ClassesConfigrations_Maximum_Installment_QTY']);
$smarty->assign('ClassesConfigrations_Per_Product',$Lang[$lang_sesc]['ClassesConfigrations_Per_Product']);
$smarty->assign('ClassesConfigrations_Enter_Maximum_Installment_QTY',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Maximum_Installment_QTY']);
$smarty->assign('ClassesConfigrations_Maximum_Installment_Amount',$Lang[$lang_sesc]['ClassesConfigrations_Maximum_Installment_Amount']);
$smarty->assign('ClassesConfigrations_Enter_Maximum_Installment_Amount',$Lang[$lang_sesc]['ClassesConfigrations_Enter_Maximum_Installment_Amount']);


//


//

$smarty->assign('CustomersClassification_List_of_Classes',$Lang[$lang_sesc]['CustomersClassification_List_of_Classes']);
$smarty->assign('CustomersClassification_Auto_Move',$Lang[$lang_sesc]['CustomersClassification_Auto_Move']);
$smarty->assign('CustomersClassification_REG_Date',$Lang[$lang_sesc]['CustomersClassification_REG_Date']);


//

$smarty->assign('ClassesConfigrations_Customers_Classes_Configrations',$Lang[$lang_sesc]['ClassesConfigrations_Customers_Classes_Configrations']);
$smarty->assign('ClassesConfigrations_This_section_indicates_the_way_of_dealing_with_customers_present_in_this_Class',$Lang[$lang_sesc]['ClassesConfigrations_This_section_indicates_the_way_of_dealing_with_customers_present_in_this_Class']);


//Customer Managment Customers Classification


//Customer Managment Manage Users Customers


$smarty->assign('CustomersManagement_Customers_List',$Lang[$lang_sesc]['CustomersManagement_Customers_List']);


$smarty->assign('CustomersManagement_Users_List',$Lang[$lang_sesc]['CustomersManagement_Users_List']);


//Store Managment Create Store


$smarty->assign('CreateStore_Create_New_Store',$Lang[$lang_sesc]['CreateStore_Create_New_Store']);
$smarty->assign('Add_New_Users_Admin',$Lang[$lang_sesc]['Add_New_Users_Admin']);
$smarty->assign('System_setting',$Lang[$lang_sesc]['System_setting']);
$smarty->assign('Add_New_Users_pos',$Lang[$lang_sesc]['Add_New_Users_pos']);
$smarty->assign('Users_management',$Lang[$lang_sesc]['Users_management']);
$smarty->assign('CreateStore_Store_Name',$Lang[$lang_sesc]['CreateStore_Store_Name']);
$smarty->assign('CreateStore_Store_Types',$Lang[$lang_sesc]['CreateStore_Store_Types']);
$smarty->assign('CreateStore_Store_Status',$Lang[$lang_sesc]['CreateStore_Store_Status']);
$smarty->assign('CreateStore_Enter_Store_Name',$Lang[$lang_sesc]['CreateStore_Enter_Store_Name']);
$smarty->assign('CreateStore_Select_Store_Type',$Lang[$lang_sesc]['CreateStore_Select_Store_Type']);
$smarty->assign('CreateStore_Normal_Store',$Lang[$lang_sesc]['CreateStore_Normal_Store']);
$smarty->assign('CreateStore_Shipping_Store',$Lang[$lang_sesc]['CreateStore_Shipping_Store']);
$smarty->assign('CreateStore_Return_Store',$Lang[$lang_sesc]['CreateStore_Return_Store']);
$smarty->assign('CreateStore_Select_Store_Status',$Lang[$lang_sesc]['CreateStore_Select_Store_Status']);
$smarty->assign('CreateStore_Active',$Lang[$lang_sesc]['CreateStore_Active']);
$smarty->assign('CreateStore_Not_Active',$Lang[$lang_sesc]['CreateStore_Not_Active']);
$smarty->assign('CreateStore_Edit_customer_Class',$Lang[$lang_sesc]['CreateStore_Edit_customer_Class']);
$smarty->assign('CreateStore_Update_Info',$Lang[$lang_sesc]['CreateStore_Update_Info']);
$smarty->assign('CreateStore_Cancel',$Lang[$lang_sesc]['CreateStore_Cancel']);


//Store Managment Create Store Store List


$smarty->assign('CreateStore_Store_List',$Lang[$lang_sesc]['CreateStore_Store_List']);
$smarty->assign('CreateStore_Store_Name',$Lang[$lang_sesc]['CreateStore_Store_Name']);
$smarty->assign('CreateStore_Store_Type',$Lang[$lang_sesc]['CreateStore_Store_Type']);
$smarty->assign('CreateStore_Status',$Lang[$lang_sesc]['CreateStore_Status']);
$smarty->assign('CreateStore_Created_Date',$Lang[$lang_sesc]['CreateStore_Created_Date']);


//Store Managment Product to Store


$smarty->assign('ProductsStore_Add_New_Product_to_Store',$Lang[$lang_sesc]['ProductsStore_Add_New_Product_to_Store']);
$smarty->assign('ProductsStore_Store_Name',$Lang[$lang_sesc]['ProductsStore_Store_Name']);
$smarty->assign('Create_Store',$Lang[$lang_sesc]['Create_Store']);
$smarty->assign('Trucks_and_Shipment',$Lang[$lang_sesc]['Trucks_and_Shipment']);
$smarty->assign('Products_store',$Lang[$lang_sesc]['Products_store']);
$smarty->assign('New_Shipmentment',$Lang[$lang_sesc]['New_Shipmentment']);
$smarty->assign('Finance',$Lang[$lang_sesc]['Finance']);
$smarty->assign('Finance_Management',$Lang[$lang_sesc]['Finance_Management']);
$smarty->assign('Customers_Request',$Lang[$lang_sesc]['Customers_Request']);
$smarty->assign('ProductsStore_Product_Name',$Lang[$lang_sesc]['ProductsStore_Product_Name']);
$smarty->assign('ProductsStore_Product_QTY',$Lang[$lang_sesc]['ProductsStore_Product_QTY']);
$smarty->assign('ProductsStore_Select_Store_Name',$Lang[$lang_sesc]['ProductsStore_Select_Store_Name']);
$smarty->assign('ProductsStore_Select_Product_Name',$Lang[$lang_sesc]['ProductsStore_Select_Product_Name']);
$smarty->assign('ProductsStore_Avalable_QTY',$Lang[$lang_sesc]['ProductsStore_Avalable_QTY']);
$smarty->assign('ProductsStore_Enter_Product_QTY',$Lang[$lang_sesc]['ProductsStore_Enter_Product_QTY']);


//


$smarty->assign('ProductsStore_Edit_Customers_class_Data',$Lang[$lang_sesc]['ProductsStore_Edit_Customers_class_Data']);
$smarty->assign('ProductsStore_Select_Store_Status',$Lang[$lang_sesc]['ProductsStore_Select_Store_Status']);
$smarty->assign('ProductsStore_Active',$Lang[$lang_sesc]['ProductsStore_Active']);
$smarty->assign('ProductsStore_Not_Active',$Lang[$lang_sesc]['ProductsStore_Not_Active']);
$smarty->assign('ProductsStore_Update_Info',$Lang[$lang_sesc]['ProductsStore_Update_Info']);
$smarty->assign('ProductsStore_Cancel',$Lang[$lang_sesc]['ProductsStore_Cancel']);


//Store Managment Product to Store Store List


$smarty->assign('products_vendors',$Lang[$lang_sesc]['products_vendors']);
$smarty->assign('products_management',$Lang[$lang_sesc]['products_management']);
$smarty->assign('ProductsStore_Store_List',$Lang[$lang_sesc]['ProductsStore_Store_List']);
$smarty->assign('ProductsStore_Store_Name',$Lang[$lang_sesc]['ProductsStore_Store_Name']);
$smarty->assign('ProductsStore_Product_Name',$Lang[$lang_sesc]['ProductsStore_Product_Name']);
$smarty->assign('ProductsStore_Product_Package',$Lang[$lang_sesc]['ProductsStore_Product_Package']);
$smarty->assign('ProductsStore_QTY',$Lang[$lang_sesc]['ProductsStore_QTY']);
$smarty->assign('ProductsStore_Movement_Type',$Lang[$lang_sesc]['ProductsStore_Movement_Type']);
$smarty->assign('ProductsStore_Movement_Entre_Date',$Lang[$lang_sesc]['ProductsStore_Movement_Entre_Date']);


//Store Managment Product Store  Products In Store


$smarty->assign('ProductsStore_Products_In_Store',$Lang[$lang_sesc]['ProductsStore_Products_In_Store']);
$smarty->assign('ProductsStore_Store_Namee',$Lang[$lang_sesc]['ProductsStore_Store_Namee']);
$smarty->assign('ProductsStore_Product_Name',$Lang[$lang_sesc]['ProductsStore_Product_Name']);
$smarty->assign('ProductsStore_Package',$Lang[$lang_sesc]['ProductsStore_Package']);
$smarty->assign('ProductsStore_QTY_AVALABLE',$Lang[$lang_sesc]['ProductsStore_QTY_AVALABLE']);



//Trucks Shipmentment Customers Requests 


$smarty->assign('CustomersRequests_Customers_Requests',$Lang[$lang_sesc]['CustomersRequests_Customers_Requests']);


//Trucks Shipmentment Customers Requests Requests List

			  
$smarty->assign('CustomersRequests_Requests_List',$Lang[$lang_sesc]['CustomersRequests_Requests_List']);
$smarty->assign('CustomersRequests_Product_Name',$Lang[$lang_sesc]['CustomersRequests_Product_Name']);
$smarty->assign('CustomersRequests_Requested_QTY',$Lang[$lang_sesc]['CustomersRequests_Requested_QTY']);
$smarty->assign('CustomersRequests_Price_Upon_Request',$Lang[$lang_sesc]['CustomersRequests_Price_Upon_Request']);
$smarty->assign('CustomersRequests_Customer_Name',$Lang[$lang_sesc]['CustomersRequests_Customer_Name']);
$smarty->assign('CustomersRequests_Customer_Phone',$Lang[$lang_sesc]['CustomersRequests_Customer_Phone']);
$smarty->assign('CustomersRequests_Request_Date',$Lang[$lang_sesc]['CustomersRequests_Request_Date']);
$smarty->assign('CustomersRequests_Request_Status',$Lang[$lang_sesc]['CustomersRequests_Request_Status']);


//Trucks Shipmentment Customers Requests Users List


$smarty->assign('CustomersRequests_Users_List',$Lang[$lang_sesc]['CustomersRequests_Users_List']);


//Trucks Shipmentment New Shipmentment

$smarty->assign('New_Shipmentment_Product_Shipment',$Lang[$lang_sesc]['New_Shipmentment_Product_Shipment']);
//$smarty->assign('NewShipmentment_Product_Shipment',$Lang[$lang_sesc]['NewShipmentment_Product_Shipment']);
$smarty->assign('NewShipmentment_Product_Name',$Lang[$lang_sesc]['NewShipmentment_Product_Name']);
$smarty->assign('NewShipmentment_Product_Package_Price',$Lang[$lang_sesc]['NewShipmentment_Product_Package_Price']);
$smarty->assign('NewShipmentment_Quantity',$Lang[$lang_sesc]['NewShipmentment_Quantity']);
$smarty->assign('NewShipmentment_Total_Price',$Lang[$lang_sesc]['NewShipmentment_Total_Price']);
$smarty->assign('NewShipmentment_Add_to_Truck',$Lang[$lang_sesc]['NewShipmentment_Add_to_Truck']);
$smarty->assign('NewShipmentment_Print_Shipped_Products',$Lang[$lang_sesc]['NewShipmentment_Print_Shipped_Products']);
$smarty->assign('NewShipmentment_Select_Product_Name',$Lang[$lang_sesc]['NewShipmentment_Select_Product_Name']);
//$smarty->assign('NewShipmentment_Product_Name',$Lang[$lang_sesc]['NewShipmentment_Product_Name']);
$smarty->assign('NewShipmentment_Store_Name',$Lang[$lang_sesc]['NewShipmentment_Store_Name']);
$smarty->assign('NewShipmentment_Avalable_QTY',$Lang[$lang_sesc]['NewShipmentment_Avalable_QTY']);
$smarty->assign('NewShipmentment_Enter_QTY',$Lang[$lang_sesc]['NewShipmentment_Enter_QTY']);


//Trucks Shipmentment New Shipmentment List of Shipped Products


$smarty->assign('NewShipmentment_List_of_Shipped_Products',$Lang[$lang_sesc]['NewShipmentment_List_of_Shipped_Products']);
//$smarty->assign('NewShipmentment_Product_Name',$Lang[$lang_sesc]['NewShipmentment_Product_Name']);
//$smarty->assign('NewShipmentment_Quantity',$Lang[$lang_sesc]['NewShipmentment_Quantity']);
//$smarty->assign('NewShipmentment_Product_Package_Price',$Lang[$lang_sesc]['NewShipmentment_Product_Package_Price']);
//$smarty->assign('NewShipmentment_Total_Price',$Lang[$lang_sesc]['NewShipmentment_Total_Price']);
$smarty->assign('NewShipmentment_Payment_Status',$Lang[$lang_sesc]['NewShipmentment_Payment_Status']);
$smarty->assign('NewShipmentment_Update_Returned_Value',$Lang[$lang_sesc]['NewShipmentment_Update_Returned_Value']);
$smarty->assign('NewShipmentment_Shipping_ID',$Lang[$lang_sesc]['NewShipmentment_Shipping_ID']);
$smarty->assign('NewShipmentment_Returned_Value',$Lang[$lang_sesc]['NewShipmentment_Returned_Value']);
$smarty->assign('NewShipmentment_Enter_Returned_Value',$Lang[$lang_sesc]['NewShipmentment_Enter_Returned_Value']);
$smarty->assign('NewShipmentment_Cancel',$Lang[$lang_sesc]['NewShipmentment_Cancel']);
$smarty->assign('NewShipmentment_Add_Returned',$Lang[$lang_sesc]['NewShipmentment_Add_Returned']);



//Trucks Shipmentment New Shipmentment Users List


$smarty->assign('NewShipmentment_Users_List',$Lang[$lang_sesc]['NewShipmentment_Users_List']);


//Trucks Shipmentment New Shipmentment Customers Requests


$smarty->assign('NewShipmentment_Customers_Requests',$Lang[$lang_sesc]['NewShipmentment_Customers_Requests']);


//Trucks Shipmentment New Shipmentment Proposed Quantities


$smarty->assign('NewShipmentment_Proposed_Quantities',$Lang[$lang_sesc]['NewShipmentment_Proposed_Quantities']);


//Finance Managment Finance


$smarty->assign('Finance_Finance_Receipt_Payment',$Lang[$lang_sesc]['Finance_Finance_Receipt_Payment']);
$smarty->assign('Finance_Product_Name',$Lang[$lang_sesc]['Finance_Product_Name']);
$smarty->assign('Finance_Product_Package_Price',$Lang[$lang_sesc]['Finance_Product_Package_Price']);
$smarty->assign('Finance_Quantity',$Lang[$lang_sesc]['Finance_Quantity']);
$smarty->assign('Finance_Total_Amount',$Lang[$lang_sesc]['Finance_Total_Amount']);
$smarty->assign('Finance_Remaining_Balance',$Lang[$lang_sesc]['Finance_Remaining_Balance']);
$smarty->assign('Finance_Amount',$Lang[$lang_sesc]['Finance_Amount']);
$smarty->assign('Finance_Add_Receipt_Payment',$Lang[$lang_sesc]['Finance_Add_Receipt_Payment']);


//Finance Managment Finance User Pending Receipt


$smarty->assign('Finance_User_Pending_Receipt',$Lang[$lang_sesc]['Finance_User_Pending_Receipt']);
//$smarty->assign('Finance_Product_Name',$Lang[$lang_sesc]['Finance_Product_Name']);
//$smarty->assign('Finance_Quantity',$Lang[$lang_sesc]['Finance_Quantity']);
//$smarty->assign('Finance_Product_Package_Price',$Lang[$lang_sesc]['Finance_Product_Package_Price']);
//$smarty->assign('Finance_Total_Amount',$Lang[$lang_sesc]['Finance_Total_Amount']);
$smarty->assign('Finance_Paid_Amount',$Lang[$lang_sesc]['Finance_Paid_Amount']);
$smarty->assign('Finance_Pending_Amount',$Lang[$lang_sesc]['Finance_Pending_Amount']);
$smarty->assign('Finance_Action',$Lang[$lang_sesc]['Finance_Action']);
$smarty->assign('Finance_Price',$Lang[$lang_sesc]['Finance_Price']);
$smarty->assign('Finance_Total',$Lang[$lang_sesc]['Finance_Total']);
$smarty->assign('Finance_Shipping_Date',$Lang[$lang_sesc]['Finance_Shipping_Date']);


//Finance Managment Finance Users List


$smarty->assign('Finance_Users_List',$Lang[$lang_sesc]['Finance_Users_List']);


//General Reports Users Status (Admin)


$smarty->assign('rptActiveUsersWeb_Actives_Users_Report',$Lang[$lang_sesc]['rptActiveUsersWeb_Actives_Users_Report']);
$smarty->assign('rptActiveUsersWeb_Report_Name_Actives_Users_admin',$Lang[$lang_sesc]['rptActiveUsersWeb_Report_Name_Actives_Users_admin']);
$smarty->assign('rptActiveUsersWeb_Report_Date',$Lang[$lang_sesc]['rptActiveUsersWeb_Report_Date']);

$smarty->assign('rptActiveUsersWeb_NO',$Lang[$lang_sesc]['rptActiveUsersWeb_NO']);
$smarty->assign('rptActiveUsersWeb_User_E_mail',$Lang[$lang_sesc]['rptActiveUsersWeb_User_E_mail']);
$smarty->assign('rptActiveUsersWeb_User_Phone',$Lang[$lang_sesc]['rptActiveUsersWeb_User_Phone']);
$smarty->assign('rptActiveUsersWeb_User_Privileges',$Lang[$lang_sesc]['rptActiveUsersWeb_User_Privileges']);
$smarty->assign('rptActiveUsersWeb_Status',$Lang[$lang_sesc]['rptActiveUsersWeb_Status']);
$smarty->assign('rptActiveUsersWeb_Print_Report',$Lang[$lang_sesc]['rptActiveUsersWeb_Print_Report']);



//General Reports Users Status (POS)


$smarty->assign('rptActiveUsersPhone_Users_Status_Report_Phone',$Lang[$lang_sesc]['rptActiveUsersPhone_Users_Status_Report_Phone']);
$smarty->assign('rptActiveUsersPhone_Report_Name_Users_Status_Phone',$Lang[$lang_sesc]['rptActiveUsersPhone_Report_Name_Users_Status_Phone']);

$smarty->assign('rptActiveUsersPhone_NO',$Lang[$lang_sesc]['rptActiveUsersPhone_NO']);
$smarty->assign('rptActiveUsersPhone_User_Name',$Lang[$lang_sesc]['rptActiveUsersPhone_User_Name']);
$smarty->assign('rptActiveUsersPhone_User_E_mail',$Lang[$lang_sesc]['rptActiveUsersPhone_User_E_mail']);
$smarty->assign('rptActiveUsersPhone_User_Phone',$Lang[$lang_sesc]['rptActiveUsersPhone_User_Phone']);
$smarty->assign('rptActiveUsersPhone_Customers_Count',$Lang[$lang_sesc]['rptActiveUsersPhone_Customers_Count']);
$smarty->assign('rptActiveUsersPhone_Pending_Bills',$Lang[$lang_sesc]['rptActiveUsersPhone_Pending_Bills']);
$smarty->assign('rptActiveUsersPhone_Status',$Lang[$lang_sesc]['rptActiveUsersPhone_Status']);
$smarty->assign('rptActiveUsersPhone_Print_Report',$Lang[$lang_sesc]['rptActiveUsersPhone_Print_Report']);


//General Reports User Customers


$smarty->assign('rptUserCustomers_User_Customers_Report',$Lang[$lang_sesc]['rptUserCustomers_User_Customers_Report']);
$smarty->assign('rptUserCustomers_User_Name',$Lang[$lang_sesc]['rptUserCustomers_User_Name']);
$smarty->assign('rptUserCustomers_Report_Name_User_Customers',$Lang[$lang_sesc]['rptUserCustomers_Report_Name_User_Customers']);
$smarty->assign('rptUserCustomers_User_Name',$Lang[$lang_sesc]['rptUserCustomers_User_Name']);
$smarty->assign('rptUserCustomers_NO',$Lang[$lang_sesc]['rptUserCustomers_NO']);
$smarty->assign('rptUserCustomers_Customer_Name',$Lang[$lang_sesc]['rptUserCustomers_Customer_Name']);
$smarty->assign('rptUserCustomers_Shop_Name',$Lang[$lang_sesc]['rptUserCustomers_Shop_Name']);
$smarty->assign('rptUserCustomers_Customer_Phone',$Lang[$lang_sesc]['rptUserCustomers_Customer_Phone']);
$smarty->assign('rptUserCustomers_REG_Date',$Lang[$lang_sesc]['rptUserCustomers_REG_Date']);
$smarty->assign('rptUserCustomers_Print_Report',$Lang[$lang_sesc]['rptUserCustomers_Print_Report']);


//General Reports Product Packages & Price


$smarty->assign('rptProductsPackagesPrice_Product_Packages_Price_Report',$Lang[$lang_sesc]['rptProductsPackagesPrice_Product_Packages_Price_Report']);
$smarty->assign('rptProductsPackagesPrice_Product_Name',$Lang[$lang_sesc]['rptProductsPackagesPrice_Product_Name']);
$smarty->assign('rptProductsPackagesPrice_Report_Name_Product_Packages_Price',$Lang[$lang_sesc]['rptProductsPackagesPrice_Report_Name_Product_Packages_Price']);
$smarty->assign('rptProductsPackagesPrice_NO',$Lang[$lang_sesc]['rptProductsPackagesPrice_NO']);
$smarty->assign('rptProductsPackagesPrice_Product_Name',$Lang[$lang_sesc]['rptProductsPackagesPrice_Product_Name']);
$smarty->assign('rptProductsPackagesPrice_Package',$Lang[$lang_sesc]['rptProductsPackagesPrice_Package']);
$smarty->assign('rptProductsPackagesPrice_Product_Price',$Lang[$lang_sesc]['rptProductsPackagesPrice_Product_Price']);
$smarty->assign('rptProductsPackagesPrice_Product_Cost',$Lang[$lang_sesc]['rptProductsPackagesPrice_Product_Cost']);
$smarty->assign('rptProductsPackagesPrice_REG_Date',$Lang[$lang_sesc]['rptProductsPackagesPrice_REG_Date']);
$smarty->assign('rptProductsPackagesPrice_Print_Report',$Lang[$lang_sesc]['rptProductsPackagesPrice_Print_Report']);


//General Reports Trucks Shipmentments


$smarty->assign('rptTrucksShipmentment_Trucks_Shipmentments_Report',$Lang[$lang_sesc]['rptTrucksShipmentment_Trucks_Shipmentments_Report']);
$smarty->assign('rptTrucksShipmentment_User_Name',$Lang[$lang_sesc]['rptTrucksShipmentment_User_Name']);
$smarty->assign('rptTrucksShipmentment_Date_Range',$Lang[$lang_sesc]['rptTrucksShipmentment_Date_Range']);
$smarty->assign('rptTrucksShipmentment_To',$Lang[$lang_sesc]['rptTrucksShipmentment_To']);
$smarty->assign('rptTrucksShipmentment_Select_date_range',$Lang[$lang_sesc]['rptTrucksShipmentment_Select_date_range']);
$smarty->assign('rptTrucksShipmentment_Report_Name_Trucks_Shipmentments',$Lang[$lang_sesc]['rptTrucksShipmentment_Report_Name_Trucks_Shipmentments']);
$smarty->assign('rptTrucksShipmentment_NO',$Lang[$lang_sesc]['rptTrucksShipmentment_NO']);
$smarty->assign('rptTrucksShipmentment_Product_Name',$Lang[$lang_sesc]['rptTrucksShipmentment_Product_Name']);
$smarty->assign('rptTrucksShipmentment_Product_QTY',$Lang[$lang_sesc]['rptTrucksShipmentment_Product_QTY']);
$smarty->assign('rptTrucksShipmentment_Product_Package_Price',$Lang[$lang_sesc]['rptTrucksShipmentment_Product_Package_Price']);
$smarty->assign('rptTrucksShipmentment_Product_Total_Price',$Lang[$lang_sesc]['rptTrucksShipmentment_Product_Total_Price']);
$smarty->assign('rptTrucksShipmentment_Shipping_Date',$Lang[$lang_sesc]['rptTrucksShipmentment_Shipping_Date']);
$smarty->assign('rptTrucksShipmentment_Payment_Status',$Lang[$lang_sesc]['rptTrucksShipmentment_Payment_Status']);
$smarty->assign('rptTrucksShipmentment_Preview_Report',$Lang[$lang_sesc]['rptTrucksShipmentment_Preview_Report']);
$smarty->assign('rptTrucksShipmentment_Print_Report',$Lang[$lang_sesc]['rptTrucksShipmentment_Print_Report']);


//General Reports Receipts Payment


$smarty->assign('rptReceiptsPayment_Receipts_Payments_Report',$Lang[$lang_sesc]['rptReceiptsPayment_Receipts_Payments_Report']);
$smarty->assign('rptReceiptsPayment_User_Name',$Lang[$lang_sesc]['rptReceiptsPayment_User_Name']);
$smarty->assign('rptReceiptsPayment_Date_Range',$Lang[$lang_sesc]['rptReceiptsPayment_Date_Range']);
$smarty->assign('rptReceiptsPayment_To',$Lang[$lang_sesc]['rptReceiptsPayment_To']);
$smarty->assign('rptReceiptsPayment_Select_date_range',$Lang[$lang_sesc]['rptReceiptsPayment_Select_date_range']);
$smarty->assign('rptReceiptsPayment_Report_Name_Receipts_Payments',$Lang[$lang_sesc]['rptReceiptsPayment_Report_Name_Receipts_Payments']);
$smarty->assign('rptReceiptsPayment_NO',$Lang[$lang_sesc]['rptReceiptsPayment_NO']);
$smarty->assign('rptReceiptsPayment_Product_Name',$Lang[$lang_sesc]['rptReceiptsPayment_Product_Name']);
$smarty->assign('rptReceiptsPayment_Product_QTY',$Lang[$lang_sesc]['rptReceiptsPayment_Product_QTY']);
$smarty->assign('rptReceiptsPayment_Product_Package_Price',$Lang[$lang_sesc]['rptReceiptsPayment_Product_Package_Price']);
$smarty->assign('rptReceiptsPayment_Total_Amount',$Lang[$lang_sesc]['rptReceiptsPayment_Total_Amount']);
$smarty->assign('rptReceiptsPayment_Paid_Amount',$Lang[$lang_sesc]['rptReceiptsPayment_Paid_Amount']);
$smarty->assign('rptReceiptsPayment_Pending_Amount',$Lang[$lang_sesc]['rptReceiptsPayment_Pending_Amount']);
$smarty->assign('rptReceiptsPayment_Shipping_Date',$Lang[$lang_sesc]['rptReceiptsPayment_Shipping_Date']);
$smarty->assign('rptReceiptsPayment_Preview_Report',$Lang[$lang_sesc]['rptReceiptsPayment_Preview_Report']);
$smarty->assign('rptReceiptsPayment_Print_Report',$Lang[$lang_sesc]['rptReceiptsPayment_Print_Report']);


//Custome Reports Products 
$smarty->assign('rptUserCustomers_Performance',$Lang[$lang_sesc]['rptUserCustomers_Performance']);
 $smarty->assign('CrptProductsSalesGeneral_Customers_Performance',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Customers_Performance']);
$smarty->assign('CrptProductsSalesGeneral_ReportName',$Lang[$lang_sesc]['CrptProductsSalesGeneral_ReportName']);
$smarty->assign('CrptProductsSalesGeneral_Customers_Performers_Report',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Customers_Performers_Report']);
$smarty->assign('CrptProductsSalesGeneral_Products_Sales_General_Report',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Products_Sales_General_Report']);
$smarty->assign('CrptProductsSalesGeneral_Date_Range',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Date_Range']);
$smarty->assign('CrptProductsSalesGeneral_To',$Lang[$lang_sesc]['CrptProductsSalesGeneral_To']);
$smarty->assign('CrptProductsSalesGeneral_Select_date_range',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Select_date_range']);
$smarty->assign('CrptProductsSalesGeneral_Report_Name_Products_Sales_General',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Report_Name_Products_Sales_General']);
//$smarty->assign('CrptProductsSalesGeneral_Report_Date',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Sales_Date']);
$smarty->assign('CrptProductsSalesGeneral_NO',$Lang[$lang_sesc]['CrptProductsSalesGeneral_NO']);
$smarty->assign('CrptProductsSalesGeneral_Vendor',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Vendor']);
$smarty->assign('CrptProductsSalesGeneral_Product_Name',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Product_Name']);
$smarty->assign('CrptProductsSalesGeneral_Packages_Name',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Packages_Name']);
$smarty->assign('CrptProductsSalesGeneral_Sales_QTY',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Sales_QTY']);
$smarty->assign('CrptProductsSalesGeneral_Sales_Date',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Sales_Date']);
$smarty->assign('CrptProductsSalesGeneral_Preview_Report',$Lang[$lang_sesc]['CrptProductsSalesGeneral_Preview_Report']);
$smarty->assign('CrptProductsSalesPerProduc_Print_Report',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Print_Report']);


//Custome Reports Products Sales-Per Product


$smarty->assign('CrptProductsSalesPerProduc_Products_Sales_PerProduct_Report',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Products_Sales_PerProduct_Report']);
$smarty->assign('CrptProductsSalesPerProduc_Product_Name',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Product_Name']);
$smarty->assign('CrptProductsSalesPerProduc_Date_Range',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Date_Range']);
$smarty->assign('CrptProductsSalesPerProduc_To',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_To']);
$smarty->assign('CrptProductsSalesPerProduc_Select_date_range',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Select_date_range']);
$smarty->assign('CrptProductsSalesPerProduc_Report_Name_Products_Sales_PerProduc',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Report_Name_Products_Sales_PerProduc']);
$smarty->assign('CrptProductsSalesPerProduc_NO',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_NO']);
$smarty->assign('CrptProductsSalesPerProduc_Vendor',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Vendor']);
$smarty->assign('CrptProductsSalesPerProduc_Product_Name',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Product_Name']);
$smarty->assign('CrptProductsSalesPerProduc_Packages_Name',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Packages_Name']);
$smarty->assign('CrptProductsSalesPerProduc_Sales_QTY',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Sales_QTY']);
$smarty->assign('CrptProductsSalesPerProduc_Sales_Date',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Sales_Date']);
$smarty->assign('CrptProductsSalesPerProduc_Preview_Report',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Preview_Report']);
$smarty->assign('CrptProductsSalesPerProduc_Print_Report',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Print_Report']);


//Custome Reports Sales Revenue-General


$smarty->assign('CrptProductsSalesPerProduc_Sales_Date',$Lang[$lang_sesc]['CrptProductsSalesPerProduc_Sales_Date']);
$smarty->assign('CrptSalesRevenueGeneral_Date_Range',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Date_Range']);
$smarty->assign('CrptSalesRevenueGeneral_To',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_To']);
$smarty->assign('CrptSalesRevenueGeneral_Select_date_range',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Select_date_range']);
$smarty->assign('CrptSalesRevenueGeneral_Report_Name_Sales_Revenue_General',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Report_Name_Sales_Revenue_General']);
$smarty->assign('CrptSalesRevenueGeneral_NO',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_NO']);
$smarty->assign('CrptSalesRevenueGeneral_Vendor',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Vendor']);
$smarty->assign('CrptSalesRevenueGeneral_Product_Name',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Product_Name']);
$smarty->assign('CrptSalesRevenueGeneral_Packages_Name',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Packages_Name']);
$smarty->assign('CrptSalesRevenueGeneral_Sales_QTY',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Sales_QTY']);
$smarty->assign('CrptSalesRevenueGeneral_Product_Cost',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Product_Cost']);
$smarty->assign('CrptSalesRevenueGeneral_Product_Price',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Product_Price']);
$smarty->assign('CrptSalesRevenueGeneral_Cost_Revenue',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Cost_Revenue']);
$smarty->assign('CrptSalesRevenueGeneral_Sales_Revenue',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Sales_Revenue']);
$smarty->assign('CrptSalesRevenueGeneral_Sales_Date',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Sales_Date']);
$smarty->assign('CrptSalesRevenueGeneral_Total',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Total']);
$smarty->assign('CrptSalesRevenueGeneral_Preview_Report',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Preview_Report']);
$smarty->assign('CrptSalesRevenueGeneral_Print_Report',$Lang[$lang_sesc]['CrptSalesRevenueGeneral_Print_Report']);


//Custome Reports Sales Revenue-Per Product


$smarty->assign('CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Sales_Revenue_PerProduct_Report']);
$smarty->assign('CrptSalesRevenuePerProduct_Product_Name',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Product_Name']);
$smarty->assign('CrptSalesRevenuePerProduct_Date_Range',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Date_Range']);
$smarty->assign('CrptSalesRevenuePerProduct_To',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_To']);
$smarty->assign('CrptSalesRevenuePerProduct_Select_date_range',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Select_date_range']);$smarty->assign('CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Report_Name_Sales_Revenue_PerProduct']);
$smarty->assign('CrptSalesRevenuePerProduct_NO',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_NO']);
$smarty->assign('CrptSalesRevenuePerProduct_Vendor',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Vendor']);
$smarty->assign('CrptSalesRevenuePerProduct_Product_Name',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Product_Name']);
$smarty->assign('CrptSalesRevenuePerProduct_Packages_Name',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Packages_Name']);
$smarty->assign('CrptSalesRevenuePerProduct_Sales_QTY',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Sales_QTY']);
$smarty->assign('CrptSalesRevenuePerProduct_Product_Cost',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Product_Cost']);
$smarty->assign('CrptSalesRevenuePerProduct_Product_Price',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Product_Price']);
$smarty->assign('CrptSalesRevenuePerProduct_Cost_Revenue',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Cost_Revenue']);
$smarty->assign('CrptSalesRevenuePerProduct_Sales_Revenue',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Sales_Revenue']);
$smarty->assign('CrptSalesRevenuePerProduct_Sales_Date',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Sales_Date']);
$smarty->assign('CrptSalesRevenuePerProduct_Total',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Total']);
$smarty->assign('CrptSalesRevenuePerProduct_Preview_Report',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Preview_Report']);
$smarty->assign('CrptSalesRevenuePerProduct_Print_Report',$Lang[$lang_sesc]['CrptSalesRevenuePerProduct_Print_Report']);
$smarty->assign('AddNewCustomer_New_Customers',$Lang[$lang_sesc]['AddNewCustomer_New_Customers']);
$smarty->assign('Registration_number',$Lang[$lang_sesc]['Registration_number']);
$smarty->assign('Days_of_work',$Lang[$lang_sesc]['Days_of_work']);
$smarty->assign('Users',$Lang[$lang_sesc]['Users']);
$smarty->assign('Customer_phone',$Lang[$lang_sesc]['Customer_phone']);
$smarty->assign('Enter_Customer_phone',$Lang[$lang_sesc]['Enter_Customer_phone']);
$smarty->assign('Enter_Registration_number',$Lang[$lang_sesc]['Enter_Registration_number']);
$smarty->assign('Customer_name',$Lang[$lang_sesc]['Customer_name']);
$smarty->assign('Customer_shop_name',$Lang[$lang_sesc]['Customer_shop_name']);
$smarty->assign('Enter_Customer_shop_name',$Lang[$lang_sesc]['Enter_Customer_shop_name']);
$smarty->assign('Enter_Customer_name',$Lang[$lang_sesc]['Enter_Customer_name']);

///


$smarty->assign('AddNewCustomer_Customer_Name',$Lang[$lang_sesc]['AddNewCustomer_Customer_Name']);
$smarty->assign('AddNewCustomer_Phone',$Lang[$lang_sesc]['AddNewCustomer_Phone']);
$smarty->assign('AddNewCustomer_Shop_Name',$Lang[$lang_sesc]['AddNewCustomer_Shop_Name']);
$smarty->assign('AddNewCustomer_Date',$Lang[$lang_sesc]['AddNewCustomer_Date']);
$smarty->assign('AddNewCustomer_Users_List',$Lang[$lang_sesc]['AddNewCustomer_Users_List']);


//Customer Loaction in Map


$smarty->assign('google_maps_Map_with_Customer_Loaction_List',$Lang[$lang_sesc]['google_maps_Map_with_Customer_Loaction_List']);
$smarty->assign('google_maps_Select_User_Name',$Lang[$lang_sesc]['google_maps_Select_User_Name']);
$smarty->assign('session_lang',$_SESSION['lang_session']);
$smarty->assign('SelectLang',$SelectLang);
$smarty->assign('actual_link',$actual_link);
$smarty->assign('google_maps_Select_User_Name',$Lang[$lang_sesc]['google_maps_Select_User_Name']);




               


 


?>