<!DOCTYPE html>
<html>
  <head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=800, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div class="parent">
      <div class="left"></div>
      <div class="container center">
        <div class="row first">
          <div class="col-2 logo">
            <img src="./media/logo.png" alt="logo" width="100%" height="100%" />
          </div>
          <div class="col-8 title">
            <div class="col-12 english-title">
              <h1>Western Offshore Mumbai Finance</h1>
            </div>
            <div class="col-12 hindi-title" style="margin-top: 25px">
              <h1>पश्चिमी अपतट मुंबई वित्त</h1>
            </div>
          </div>
        </div>
        <div class="row images">
          <div class="col-12 photos">
             <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner pics">
                <div class="carousel-item active" data-bs-interval="3000">
                  <img src="./media/bombayhigh.jpeg" class="d-block w-100" height="350vh" alt="Bombay High" />
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="./media/nbp.jpeg" class="d-block w-100" height="350vh" alt="NBP Green Heights" />
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="./media/crew.jpeg" class="d-block w-100" height="350vh" alt="G 20" />
                </div>
                <div class="carousel-item" data-bs-interval="3000">
                  <img src="./media/offshore.jpeg" class="d-block w-100" height="350vh" alt="Offshore" />
                </div>                
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
        <div class="row navigation">  
          <nav class="navbar navbar-expand-lg" style="background-color:darkorchid;">
            <div class="container-fluid">
              <a class="navbar-brand" href="./index.php" style="color: beige;">
                <img src="./media/home.png" alt="Home" width="25" height="25" class="d-inline-block align-text-top">
                Home
              </a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 menu">
                  <li class="nav-item dropdown dropdown-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="color: beige;">
                      Information
                    </a>
                    <ul class="dropdown-menu dropdown_menu-1">
                      <li class="dropdown_item-1"><a class="dropdown-item" href="./view.php?heading=Cost Data&directory=./admin/uploads/information/cost_data/">Cost Data</a></li>
                      <li class="dropdown_item-2"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-3"><a class="dropdown-item" href="./view.php?heading=Financial Data&directory=./admin/uploads/information/financial_data/">Financial Data</a></li>
                      <li class="dropdown_item-4"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-5"><a class="dropdown-item" href="./view.php?heading=Asset Data&directory=./admin/uploads/information/asset_data/">Asset Data</a></li>
                      <li class="dropdown_item-6"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-7"><a class="dropdown-item" href="./view.php?heading=Inventory Data&directory=./admin/uploads/information/inventory_data/">Inventory Data</a></li>
                      <li class="dropdown_item-8"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-9"><a class="dropdown-item" href="./view.php?heading=Sales and GST Data&directory=./admin/uploads/information/sales_and_gst_data/">Sales and GST Data</a></li>
                      <li class="dropdown_item-10"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-11"><a class="dropdown-item" href="./view.php?heading=Forex Data&directory=./admin/uploads/information/forex_data/">Forex Data</a></li>
                      <li class="dropdown_item-12"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-13"><a class="dropdown-item" href="./view.php?heading=NELP/JV/DSF&directory=./admin/uploads/information/nelp_jv_dsf/">NELP/JV/DSF</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown dropdown-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="color: beige;">
                      RFC & Account Nodal Officer Meeting
                    </a>
                    <ul class="dropdown-menu dropdown_menu-1">
                      <li class="dropdown_item-1"><a class="dropdown-item" href="./view.php?heading=RFC Meeting Agenda and PPT&directory=./admin/uploads/rfc/rfc_meeting_agenda/">RFC Meeting Agenda & PPT</a></li>
                      <li class="dropdown_item-2"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-3"><a class="dropdown-item" href="./view.php?heading=Account Nodal Officer Meeting Agenda and PPT&directory=./admin/uploads/rfc/account_nodal_officer_meeting/">Account Nodal Officer Meeting Agenda & PPT</a></li>
                      <li class="dropdown_item-4"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-5"><a class="dropdown-item" href="./view.php?heading=Other PPT&directory=./admin/uploads/rfc/other_ppt/">Other PPT</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown dropdown-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="color: beige;">
                      Circulars & IOMs
                    </a>
                    <ul class="dropdown-menu dropdown_menu-1">
                      <li class="dropdown_item-1"><a class="dropdown-item" href="./view.php?heading=Accounts&directory=./admin/uploads/circulars/accounts/">Accounts</a></li>
                      <li class="dropdown_item-2"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-3"><a class="dropdown-item" href="./view.php?heading=Direct and Indirect Tax&directory=./admin/uploads/circulars/direct_and_indirect_tax/">Direct & Indirect Tax</a></li>
                      <li class="dropdown_item-4"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-5"><a class="dropdown-item" href="./view.php?heading=Sales&directory=./admin/uploads/circulars/sales/">Sales</a></li>
                      <li class="dropdown_item-6"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-7"><a class="dropdown-item" href="./view.php?heading=Pre-audit and PCS&directory=./admin/uploads/circulars/preaudit_and_pcs/">Pre-audit & PCS</a></li>
                      <li class="dropdown_item-8"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-9"><a class="dropdown-item" href="./view.php?heading=Annual Reports&directory=./admin/uploads/circulars/annual_report/">Annual Reports</a></li>
                    </ul>
                  </li>
                  <li class="nav-item dropdown dropdown-1">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="color: beige;">
                      Useful Links
                    </a>
                    <ul class="dropdown-menu dropdown_menu-1">
                      <li class="dropdown_item-1"><a class="dropdown-item" href="./admin/links.php?name=MM%20Portal">MM Portal</a></li>
                      <li class="dropdown_item-2"><hr class="dropdown-divider"></li>
                      <li class="dropdown_item-3"><a class="dropdown-item" href="./admin/links.php?name=ONGC%20Money">ONGC Money</a></li>
                    </ul>
                  </li>
                </ul>
                <a href="./admin/login.php" class="white_link"><button class="btn ms-auto">
                <img src="./media/user.png" alt="user" height="20px"; width="20px";></a>
              </div>
            </div>
          </nav>
          <hr />
        </div>          
        <div class="row bottom-half">
          <div class="col-3">
            <div class="card mb-3" style="max-width: 18rem; background-color:lemonchiffon; text-align: left;">
              <div class="card-header" style="color:white; background-color:goldenrod;">
                <h5 class="card-title">Educational Material</h5>
              </div>
              <div class="card-body">
                <a href="./view.php?heading=Finance Manual&directory=./admin/uploads/education/finance_manual/" class="green_link">
                  <button type="button" class="btn btn-outline-success education">Finance Manual</button></a><br>
                <a href="./view.php?heading=Accounting Standard&directory=./admin/uploads/education/accounting_standard/" class="green_link">
                  <button type="button" class="btn btn-outline-success education">Accounting Standard</button></a><br>
                <a href="./view.php?heading=Indian Accounting Standard&directory=./admin/uploads/education/indian_accounting_standard/"class="green_link">
                  <button type="button" class="btn btn-outline-success education"><font styel="text-align:left;">Indian Accounting Standard</font></button></a><br>
                <a href="./view.php?heading=Guidance Notes&directory=./admin/uploads/education/guidance_notes/" class="green_link">
                  <button type="button" class="btn btn-outline-success education">Guidance Notes</button></a><br>
                <a href="./view.php?heading=Companies Act and Rules&directory=./admin/uploads/education/companies_act_and_rules/" class="green_link">
                  <button type="button" class="btn btn-outline-success education">Companies Act & Rules</button></a><br>
                <a href="./view.php?heading=GST Act and Rules&directory=./admin/uploads/education/gst_act_and_rules/" class="green_link">
                  <button type="button" class="btn btn-outline-success education">GST Act & Rules</button></a><br>
                <a href="./view.php?heading=EAC Opinions&directory=./admin/uploads/education/eac_opinions/" class="green_link">
                  <button type="button" class="btn btn-outline-success education">EAC Opinions</button></a>
              </div>
            </div><br>
            <div class="card mb-3" style="max-width: 18rem; background-color: #f5e1e1">
              <div class="card-header" style="color: white; background-color: #ff6863">
                <h5 class="card-title">Queries & Expert Opinion</h5>
              </div>
              <div class="card-body">
                <a href="./query.php?section=accounts&heading=Accounts" class="blue_link">
                  <button type="button" class="btn btn-outline-primary opinion">Accounts</button></a><br />
                <a href="./query.php?section=taxation&heading=Taxation" class="blue_link">
                  <button type="button" class="btn btn-outline-primary opinion">Taxation</button></a><br />
                <a href="./query.php?section=other&heading=Other Matters" class="blue_link">
                  <button type="button" class="btn btn-outline-primary opinion">Other matters</button></a>
              </div>
            </div>
          </div>
          <div class="col-8 middle">