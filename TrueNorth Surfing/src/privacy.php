<?php
//ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
session_start();
include("scripts/functions.php");
echo headSetup("TNSC - Privacy Policy","../css/privacy-cookies.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart(null);
?>
<div id="content">
  <h1>True North Surf Club Privacy Policy</h1>
  <p>
    True North Surf Club (collectively “Merchant Store Name”, “we” and “us”, “data controller”) respect your privacy. We ensure that your privacy is protected when using our website or when placing online orders with us.
  </p>
  <p>
    True North Surf Club provides you with goods and services and is the data controller of the personal data that you provide when you order goods. The Data Protection Officer for True North Surf Club can be contacted via contact form that can be found at the bottom of this page.
  </p>
  <p>
    This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from true-north-surf-club.sumupstore.com (the “Site”).
  </p>
  <h2>Personal data we collect</h2>
  <p>
    When you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers), email address, and phone number. We refer to this information as “Order Information”.
  </p>
  <p>
    When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what and which websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically-collected information as “Device Information”.
  </p>
  <p>
    We collect Device Information using the following technologies:
  </p>
  <ul>
    <li>“Cookies” are data files that are placed on your device or computer and often include an anonymous unique identifier. For more information about cookies, and how to disable cookies, visit <a href="http://www.allaboutcookies.org">http://www.allaboutcookies.org</a>.</li>
    <li>“Log files” track actions occurring on the Site, and collect data including your IP address, browser type, Internet service provider, referring/exit pages, and date/time stamps.</li>
    <li>“Web beacons”, “tags”, and “pixels” are electronic files used to record information about how you browse the Site.</li>
  </ul>
  <h2>How do we use your personal information?</h2>
  <p>
    We use the Order Information that we collect generally to fulfill any orders placed through and with the Site (including processing your payment information, arrangements for shipping, and providing you with invoices and/or order confirmations). Additionally, we use this Order Information to:
  </p>
  <ul>
    <li>Communicate with you;</li>
    <li>Screen orders for potential risk or fraud; and</li>
    <li>When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</li>
  </ul>
  <p>
    We are processing your information in order to fulfill contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above.
  </p>
  <p>We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site (for example, by generating analytics about how our customers browse and interact with the Site, and to assess the success of our marketing and advertising campaigns).</p>
  <h2>Sharing your personal Information</h2>
  <p>We share your Personal Information with third parties to allow us to use your Personal Information, as described above. For example, we use SumUp to power our online store. We also use Google Analytics to help us understand how our customers use the Site -- you can read more about how Google uses your Personal Information here: <a href="https://www.google.com/intl/en/policies/privacy/">https://www.google.com/intl/en/policies/privacy/</a>. You can also opt-out of Google Analytics here: <a href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout</a>.</p>
  <p>We may share information with service providers under contract who help with parts of our business operations. Our contracts dictate that these service providers only use your information in connection with the services they perform for us and not for their own or any additional benefit.</p>
  <p>Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant and/or other lawful request for information we receive, or to otherwise protect our rights.</p>
  <h2>Transferring Information Internationally</h2>
  <p>We may transfer information collected about you to third parties acting on our behalf that may be located in countries outside of the European Economic Area (“EEA”) or countries deemed by the European Commission to have satisfactory data protection. These other countries may not offer the same level of protection for the information collected about you, although we will at all times continue to collect, store and use your information in accordance with this Privacy Policy and the applicable data protection legislation. We will ensure we share data only with those organizations that satisfy an adequate level of data protection in line with applicable data protection legislation and that satisfactory contractual agreements are in place with any such parties.</p>
  <h2>Your rights</h2>
  <p>If GDPR is applicable to you, you have the right to access personal information we hold about you and to ask that your personal information be amended, updated, or deleted, you have the right to ask for the ceasing of processing of your data, object to profiling activities and solely automated processing, request that we restrict the processing of your personal data, and/or request that your data be transferred to a third party (data portability) under certain circumstances. If you would like to exercise this right, please contact us through the contact information below.</p>
  <p>You have the right to withdraw your consent to the processing of your data at any time if the processing is based on your consent, and can do so by contacting the DPO at the address provided.</p>
  <p>If you would like to exercise any of your rights set out above, you can contact us using the contact form that can be found at the bottom of this page.</p>
  <p>You also have a right to lodge a complaint with the relevant data protection authority. The relevant authority for each country can be found on the European Commission <a href="http://ec.europa.eu/newsroom/article29/item-detail.cfm?item_id=612080">website</a></p>
    <h2>Data retention</h2>
  <p>When you place an order through the Site, we will maintain your Order Information for as long as necessary to carry out our services to you or for as long as we are required by relevant laws. After this period, your personal data will be deleted.</p>
  <h2>Changes</h2>
  <p>We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.</p>
  <h2>Contact us</h2>
  <p>For more information about our privacy practices, if you have questions, or if you would like to make a complaint, please contact us via contact form that can be found at the bottom of this page.</p>
  </div>
<?php
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>
