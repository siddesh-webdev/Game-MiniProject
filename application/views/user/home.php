<div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 overflow-hidden">

        <div class="d-flex align-items-center justify-content-between mb-4">
          <h3>DASHBOARD</h3>
        </div>
       
        <div class="row mb-4">
          <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none">
              <div class="card text-center text-success p-3">
                <h6>Total Player</h6>
                <h1 class="mt-2 mb-0"><?= $player_dtl?></h1>
              </div>
            </a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="#.php" class="text-decoration-none">
              <div class="card text-center text-warning p-3">
                <h6>Total Teams</h6>
                <h1 class="mt-2 mb-0"><?= $team_dtl?></h1>
              </div>
            </a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="#.php" class="text-decoration-none">
              <div class="card text-center text-info p-3">
                <h6>Total Games</h6>
                <h1 class="mt-2 mb-0"><?= $game_dtl?></h1>
              </div>
            </a>
          </div>
          <div class="col-md-3 mb-4">
            <a href="#.php" class="text-decoration-none">
              <div class="card text-center text-primary p-3">
                <h6>Total Payment</h6>
                <h1 class="mt-2 mb-0">₹<?= $total_fee?></h1>
              </div>
            </a>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-3">
          <h5>Game Analytics</h5>
         
        </div>

        <div class="row mb-3">
          <div class="col-md-3 mb-4">
              <div class="card text-center text-primary p-3">
                <h6>Total Game</h6>
                <h1 class="mt-2 mb-0" id="total_bookings"><?= $game_dtl?></h1>
                <!-- <h4 class="mt-2 mb-0"  id="total_amt">₹0</h4> -->
              </div>
          </div>
          <div class="col-md-3 mb-4">
              <div class="card text-center text-success p-3">
                <h6>Total Tournaments</h6>
                <h1 class="mt-2 mb-0" id="active_bookings"><?= $game_dtl?></h1>
                <!-- <h4 class="mt-2 mb-0" id="active_amt">₹0</h4> -->
              </div>
          </div>
          <div class="col-md-3 mb-4">
              <div class="card text-center text-danger p-3">
                <h6>Winning Price</h6>
                <h1 class="mt-2 mb-0" id="cancelled_bookings">₹<?=$total_price?></h1>
                <!-- <h4 class="mt-2 mb-0" id="cancelled_amt">₹0</h4> -->
              </div>
          </div>
        </div>

        <h5>Players</h5>
        <div class="row mb-3">
          <div class="col-md-3 mb-4">
              <div class="card text-center text-info p-3">
                <h6>Total</h6>
                <h1 class="mt-2 mb-0">234</h1>
              </div>
          </div>
          <div class="col-md-3 mb-4">
              <div class="card text-center text-success p-3">
                <h6>Active</h6>
                <h1 class="mt-2 mb-0">232</h1>
              </div>
          </div>
          <div class="col-md-3 mb-4">
              <div class="card text-center text-warning p-3">
                <h6>Inactive</h6>
                <h1 class="mt-2 mb-0">354</h1>             
              </div>
          </div>
          <div class="col-md-3 mb-4">
              <div class="card text-center text-danger p-3">
                <h6>Unverified</h6>
                <h1 class="mt-2 mb-0">34</h1>             
              </div>
          </div>
        </div>

      </div>
    </div>
  </div>