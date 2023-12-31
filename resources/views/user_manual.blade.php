@extends('templates.master')

@section('title', 'User Manual')

@section('head')
<style>

  .sidebar {
    position: sticky;
    left: 0;
    top: 0;
    margin-bottom: -1000px;
    width: 300px;
    height: 1000px;
  }
  .sidebar a {
    display: block;
    font-size: 20px;
    font-weight:500;
    text-decoration: none;
    color: #2db490;
    padding-left: 30px;
  }

  .sidebar li {
    color:#1d8369
  }

  .ml-1 {
    margin-left: 300px;
    position: sticky;
    right: 0;
    left: 0;
    font-weight:200;
    background-color:#2db490;
    padding-left: 50px;
    padding-right: 50px;
    border-radius: 5px 0 0 0;
  }

  :root[data-bs-theme="dark"] .ml-1 {
    background-color: #238c70;
  }

  .title {
    padding-top: 40px;
    text-align: center;
    font-size: 30px;
    font-weight: 600;
  }
  
  .subtitle {
    font-size: 20px;
    font-weight: 400;
  }

  .para {
  }

  .picture {
    width: 750px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #3f3f3f;
    box-shadow: 20px 20px #3f3f3f;
  }

  .pictureSmaller {
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #3f3f3f;
    box-shadow: 20px 20px #3f3f3f;
  }

  .mobile {
    height: 500px;
    display: block;
    margin-left: auto;
    margin-right: auto;
    border: 1px solid #3f3f3f;
    box-shadow: 20px 20px #3f3f3f;
  }

  @media (max-width: 768px) {
    .ml-1 {
      margin-left: 0;
      padding-left: 20px;
      padding-right: 20px;
      position: fixed;
      overflow-y: scroll;
      max-height: 100%;
      overflow-x: hidden;
    }
    .picture {
      width: 500px;
    }
  }

  @media (max-width: 576px) {
    .picture {
      width: 300px;
    }
    .pictureSmaller {
      width: 250px;
    }
    .subtitle {
    text-align: center;
    }

    .para {
      padding-inline: 0px;
      padding-right: 0px;
      text-align: center;
    }

    .mobile {
      height: 400px;
    }
  }

  .bigger {
  font-size: 2em;
  font-weight: bold;
}


  .unknown_info {
    color:#1f553e
  }

</style>
@endsection

@section('content') 

<div style="height: 2vh;"></div>

{{--Sidebar--}}
<div id="sidebar" class="sidebar bg-body-secondary d-none d-md-block">
  <img src="{{ asset('assets/Full Logo/PNG/StokBox-Square-01.png') }}" style="display: block; width: 120px; position: 
  relative; margin-left: 85px; margin-right: auto;">
  <a><b style="position:relative; right: 10px; font-size:1.5em">Contents:</b></a>
  <a href="#intro">Introduction</a>
  <a href="#landing">Landing Page</a>
  <a href="#user_features">User Features</a>
  <div class="ms-4">
    <a href="#login" style="font-size: 1em">Logging You In</a>
    <a href="#dash" style="font-size: 1em">Dashboard Page</a>
    <a href="#forgotten" style="font-size: 1em">Forgotten Password</a>
    <a href="#brand" style="font-size: 1em">Brand Page</a>
    <a href="#nav" style="font-size: 1em">Navigation Bar</a>
    <a href="#dashboard" style="font-size: 1em">Dashboard</a>
    <a href="#persona" style="font-size: 1em">My Personas</a>
    <a href="#darkmode" style="font-size: 1em">Dark Mode</a>
  </div>
  <a href="#admin">Admin Features</a>
  <div class="ms-4">
    <a href="#update" style="font-size: 1em">Updating The Database</a>
    <a href="#addingNewUser" style="font-size: 1em">Adding a New User</a>
    <a href="#firstTimeLoggingIn" style="font-size: 1em">First Time Logging In</a>
    <a href="#viewImportedProductData" style="font-size: 1em">View Imported Product Data</a>
    <a href="#manageUsers" style="font-size: 1em">Managing Users</a>
    <a href="#generateUserSampleData" style="font-size: 1em">Generating Sample User Data</a>
  </div>
  <a href="#mobile">Mobile Version</a>
  <div class="ms-4">
    <a href="#mbnavbar" style="font-size: 1em">Collapsable Navigation Bar</a>
    <a href="#mbtopnav" style="font-size: 1em">Top Nav Bar</a>
    <a href="#mbhome" style="font-size: 1em">Home Screen</a>
    <a href="#mbcreateusers" style="font-size: 1em">Create Users</a>
    <a href="#mbmanageusers" style="font-size: 1em">Manager Users</a>
    <a href="#mbimportproduct" style="font-size: 1em">Import Product Data</a>
    <a href="#mbviewproduct" style="font-size: 1em">View Product Data</a>
    <a href="#mbuserdash" style="font-size: 1em">User Dashboard</a>
    <a href="#mbbranddetails" style="font-size: 1em">Brand Details</a>
    <a href="#mbbuyerpersonas" style="font-size: 1em">Buyer Personas</a>
  </div>

  </div>

  {{--Main Page--}}
  <div class="ml-1">
    <div class="main" style="color: #ececec; right: 0;">

    {{--Title--}}
    <h1 class='title' style="font-size: 50px;">Stokbox: User Manual</h1>

    {{--Introduction--}}
    <h2 id="intro" class="title">Introduction</h2>
    <div class="para">
    <p>
    Welcome to Stokbox Analytics. This is a platform that allows your company to view and generate  personas of customers. 
    From this, you can then be provided with information about the audience that are likely to purchase a given product.
    </p><p>
    Our platform allows you to query our database using filters and searches (narrowing it down to a specific product or
    group of products). Our database contains lots of information about thousands of products sold in UK supermarkets. 
    The database then queries another database containing user data which is used by our algorithm to generate your persona.
    All data can then be found on your user dashboard. 
    </p><p>
    We understand navigating a new platform can be daunting, 
    which is why we have created this simple interface that guides you through the process. Let us show you how to get
    started and get set up with our website...
    </p>
    </div>

    {{--Landing--}}
    <h2 id="landing" class="title">Landing Page</h2>
    <div class="para">
      <p>
      The landing page can be found by pressing “<b>Home</b>” from the top navigation bar by using the link: 
      <b class="unknown_info">http//www.stokbox.co.uk/landing</b>. Once you have navigated there, you should see the
      following page:
      </p>
      <br>
      <img class="picture" src="{{ asset('assets/User Manual Images/landing_page_image.png ') }}" alt="">
      <br><br>
      <p>
        This page serves as a gateway to allow users who are not logged in to access certain areas of our website.
        Specifically, this allows you to navigate to three areas:
        <ol>
          <li>"<b>Home</b>" - This will redirect you to the same page.</li>
          <li>"<b>Help</b>" - This is where you are currently viewing this help notice.</li>
          <li>"<b>Sign In</b>" - This take you to our login page, where you can sign in and access more areas of our
            website.</li>
    </div>

    {{--Login--}}
    <h2 id=user_features class="title bigger"> User Features</h2>
    <h2 id="login" class="title">Logging You In…</h2>
    <div class="para">
      <p>
        From the landing page, press sign in to navigate to the landing page…</p>
        <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/sign_in_page_button_image.png ') }}" alt="">
        <br><br>
        Enter your credentials into the box provided and press Log in…
        <br>  <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture4.jpg') }}" alt="">
        <br>
        <p>
          If you put the wrong credentials in, you’ll get a message telling you so…
        </p>
        <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture5.jpg') }}" alt="">
        <br><br>

        <h2 id="dash" class="title">Dashboard Page</h2>
        <p>Once logged in, you can see your dashboard…
        At a glance, you can see all analytics relevant to your company and queries…
        </p>

        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture7.jpg') }}" alt="">
        <br> <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture8.jpg') }}" alt="">
      </p>
      <br>
      <h2 id="forgotten" class="title">Forgotten Password</h2>      
      <p>
        If you forgot password, it’s no problem
        Simply click forgot password…
      </p>
      <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture9.jpg') }}" alt="">
      <br><br>
      <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture10.jpg') }}" alt="">
      <br>
      <p> …and you’ll be sent a recovery email </p>

      <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture11.jpg') }}" alt="">

      <br>

      <p> Follow the Reset Password link, and enter your new credentials. <p>

        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture12.jpg') }}" alt="">
      <br>
        <h1>
        <h2 id="brand" class="title">Brand Page</h2>
        </h1>
        <p>
          You can customize the data we present by adding categories to your brand page…
          Simply select and Submit a new category. It’ll be added and stored to your brand page.

        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture13.jpg') }}" alt="">
        <br>
        <br>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture14.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="nav" class="title">Navigation Bar</h2>
        </h1>
        <p>
          You can move around the various features of the webapp by using the navigation bar
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture15.jpg') }}" alt="">



        <h1>
          <h2 id="dashboard" class="title">Dashboard</h2>
        </h1>
        <p>
          The dashboard displays all kinds of information about your consumers such as, gender, age, city, income, number
          of dependants and dietary requirements:
        </p>

        <img class="picture" src="{{ asset('assets/User Manual Images/dashboard1.png ') }}" alt="">
        <img class="picture" src="{{ asset('assets/User Manual Images/dashboard2.png ') }}" alt="">
        <img class="picture" src="{{ asset('assets/User Manual Images/dashboard3.png ') }}" alt="">
        <br>
        <p>
        Use the filters tab at the top to filter the data in any way you want.
        </p>
        <img class="pictureSmaller" style="width: 700px" src="{{ asset('assets/User Manual Images/filter_dashboard.png') }}" alt="">

        <h1>
          <h2 id="persona" class="title">My Personas</h2>
        </h1>
        <p>
          You can view your personas on the personas page. This looks like so...
        </p>
        <img class="picture" src="{{ asset('assets/User Manual Images/personas.png ') }}" alt=""><br>
        <p>
          You can also view each personas individual profile.
        </p>
        <img class="pictureSmaller" style="width: 500px" src="{{ asset('assets/User Manual Images/personapro.png') }}" alt="">






        <br>
        {{--Admin Features--}}
        <h1>
          <h2 id="darkmode" class="title">Dark Mode</h2>
        </h1>
        <p> 
          The site has a dark mode feature, which can be toggled by using the icon on the top right of all the pages (excluding the login pages). 
        </p>
        <img class="picture" src="{{ asset('assets/User Manual Images/darkmode-1.jpg') }}" alt="">
        <br>
        <p> 
          Clicking the button results in the dark mode theme as seen below.
        </p>
        <img class="picture" src="{{ asset('assets/User Manual Images/darkmode-2.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="admin" class="title bigger">Admin Features</h2>
        </h1>
        <h2>
          <h2 id="update" class="title">Updating The Database</h2>
        </h2>
        <p>
          An admin can update the database by uploading a new CSV
          Simply choose a new file, in the relevant formats and in the correct
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture16.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="addingNewUser" class="title">Adding a New User</h2>
        </h1>
        <p>
          An admin can add a new user…
          Simply select and add what company they are part of and submit it…
          Then input your user details
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture17.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="firstTimeLoggingIn" class="title">First Time Logging In</h2>
        </h1>
        <p>
          The first time you log into StokBox Analytics, 
          you will be prompted to create your password…
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture18.jpg') }}" alt="">
        <br>
        <p>
          As shown, you have to validate your password by keeping it longer than 8 characters, 
          containing uppercase and lowercase letters and at least one number. You also have to
           input your password twice -  to ensure users don’t incorrectly spell it. The password is
           also hidden from view.
        </p>
        <p>
          If a user doesn’t follow the validation rules, the following validation will show:
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture19.jpg') }}" alt="">
        <h1>
          <h2 id="viewImportedProductData" class="title">View Imported Product Data</h2>
        </h1>
        <p>
          As a website admin, I want to be able to view currently imported product data, so 
          that I can check what data has been previously uploaded without having to query the 
          database manually.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture20.jpg') }}" alt="">
        <br>
        <p>
          The website admin can sort data by its value by clicking the name of the column, 
          an example is shown as the user sorts the data by price, ascending.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture21.jpg') }}" alt="">
        <br>
        <p>
          The website admin can search for specific date from the table, an example of this 
          is shown below, where sulphur is searched from the allergen information column.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture22.jpg') }}" alt="">
        <h2 id="manageUsers" class="title">Managing Users</h2>
        <p>
          An admin can view the current the current users in the database by navigating to the ‘Manage Users’ 
          page. From here, an admin can decide to edit a user’s data or delete it entirely from the database.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture23.jpg') }}" alt="">
        <br>
        <p>
          Clicking the Edit button redirects you to the ‘Edit User’ page for that specific user, 
          where you can edit the user’s details.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture24.jpg') }}" alt="">
        <br>
        <p>
          The form contains the user’s old information. The admin can redirect back to the ‘Manage Users’ 
          page by clicking the cancel button. No changes will be made. 
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture25.jpg') }}" alt="">
        <br>
        <p>
          Validation is applied to the form.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture26.jpg') }}" alt="">
        <br>
        <p>
          If the admin clicks the ‘Edit User’ button whilst no changes have been made, a warning 
          alert will appear notifying the admin of this.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture27.jpg') }}" alt="">
        <br>
        <p>
          Clicking the delete button completely deletes the user from the database. 
          When the user is successfully edited, the admin is redirected to the ‘Manage Users’ 
          page with a success alert, informing the admin of the successful action and which user it was applied to.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture28.jpg') }}" alt="">
        <br>
        <p>
          Clicking the delete button completely deletes the user from the database.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture29.jpg') }}" alt="">
        <br>
        <p>
          The user will no longer appear on the table and the admin will be notified of the action through a danger alert.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture30.jpg') }}" alt="">
        <br>
        <h2>
          <h2 id="generateUserSampleData" class="title">Generating Sample User Data </h2>
        </h2>
        <p>
          An admin can generate a sample user data CSV for demonstration purposes. <br> 
          The admin simply enters the number of consumers they want to generate (between 1 - 100) and the Admin then has to press the generate button.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/Picture31.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mobile" class="title bigger">Mobile Version</h2>
        </h1>
        <h1>
          <h2 id="mbnavbar" class="title">Collapsable Navigation Bar</h2>
        </h1>
        <p> 
          The content pages differ slightly from the desktop resolution. The functionality remains completely the same but appears slightly differently. The sidebar no longer exists on mobile screens as seen below.
        </p>
        <img class="mobile" src="{{ asset('assets/User Manual Images/mobile-navbar-1.jpg') }}" alt="">
        <br>
        <p> 
          Clicking on the hamburger icon (next to the toggle theme button) opens a collapsible navigation bar containing the same contents as the sidebar. Clicking again collapses it.
        </p>
        <img class="mobile" src="{{ asset('assets/User Manual Images/mobile-navbar-2.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbtopnav" class="title">Top Nav Bar</h2>
        </h1>
        <p>
          This is the top nav bar which shrinks down when on a mobile, but still had all options visible. The buttons are shrunken down.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/navbar_mobile.png') }}" alt="">
        <br>
        <h1>
          <h2 id="mbhome" class="title">Home Screen</h2>
        </h1>
        <p> 
          The home screen page for mobile devices will display everything the desktop version displays. You can navigate to all options and everything is fit onto the screen.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/home_screen_mobile.png') }}" alt="">
        <br>
        <h1>
          <h2 id="mbcreateusers" class="title">Create Users</h2>
        </h1>
        <p> 
          Creating users will be easily done on mobile, everything is shrunk down to fit the screen and the form is easily able to be filled in.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/manage_users_mobile.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbmanageusers" class="title">Manage Users</h2>
        </h1>
        <p> 
          Managing users will display all users on the page depending on the filter, similar to desktop version.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/manage_users_dash.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbimportproduct" class="title">Import Product Data</h2>
        </h1>
        <p> 
          The navbar is put into the hamburger icon and you can scroll down to view more of the page and access all the form options.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/import_product_mobile.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbviewproduct" class="title">View Product Data</h2>
        </h1>
        <p> 
          Managing users will display all product data on the page depending on the filter, similar to desktop version.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/view_product_mobile.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbuserdash" class="title">User Dashboard</h2>
        </h1>
        <p> 
          Similar to the desktop view the user dashboard for mobile will show all graphs and analytics. Navbar is moved to the toggle hamburger option. You are able to pinch the screen to zoom in and out.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/user_dash_mobile.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbbranddetails" class="title">Brand Details</h2>
        </h1>
        <p> 
          Shrunken down to fit in mobile view, all options are available. You can add a product here.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/brand_details_mobile.jpg') }}" alt="">
        <br>
        <h1>
          <h2 id="mbbuyerpersonas" class="title">Buyer Personas</h2>
        </h1>
        <p> 
          Buyer personas are all visible along with their images. You scroll down to view more instead of reading them left to right. Fake data used for the context of this screenshot and image removed for data protection and privacy. All the real data will be visible when you login to your account.
        </p>
        <img class="pictureSmaller" src="{{ asset('assets/User Manual Images/buyer_persona_mobile.jpg') }}" alt="">
        <br>

    
    </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

{{--
 w  c(..)o    (
  \__( -)    __)
      / \   (
     /(_ )___)
    w / |
     |  \
    m   m
--}}
@endsection