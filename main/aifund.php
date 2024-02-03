<?php
include "main/session.php";
?>
<div class="modal-body p-0">
  <form class="row gy-2 gx-3 align-items-end" id="addfund">
    <div class="col-12">
      <label class="form-label" for="Quantity">What is the maximum capital from your fund that AI can use for trading?</label>
      <input type="number" data-bvalidator="required,number" class="form-control form-control-sm" id="" name="aifund" placeholder="₹">
    </div>

    <div class="col-md-12" id="resultid"></div>
    <h6>Profitability And Risk Analysis</h6>
    <select class="AI-percentage-dropdown" name="riskprct" id="dropdown" data-bvalidator="required">
      <option value="" disabled selected>Select Profit %</option>
      <option value="5">5-10%</option>
      <option value="15">10-20%</option>
      <option value="25">20-30%</option>
      <option value="35">30-40%</option>
      <option value="45">40-50%</option>
      <option value="55">50-60%</option>
      <option value="65">60-70%</option>
      <option value="75">70-80%</option>
      <option value="85">80-90%</option>
      <option value="100">90-100%</option>
    </select>
    <button class="btn btn-success" onclick="event.preventDefault();sendForm('', '', 'insertaifund', 'resultid', 'addfund')">Submit</button>
  </form>

  <div id="indicator">
    <div id="indicator-progress">%</div>
  </div>

  <style>
    .AI-percentage-dropdown {
      padding: 5px 7px;
      border-radius: 5px;
      border: 1px solid #ebebeb;
      color: #5c5b5b;
      margin-top: 3px;

    }

    #indicator {
      margin-top: 15px;
      width: 100%;
      height: 17px;
      background-color: #e8e8e8;
      border: 0px solid #ccc;
      position: relative;
      border-radius: 20px;
    }

    #indicator-progress {
      font-size: 10px;
      border-radius: 20px;
      height: 100%;
      background-color: #000;
      transition: width 0.3s ease;
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      padding-left: 10px;
      color: white;
      font-weight: bold;
    }
  </style>

  <script>
    const dropdown = document.getElementById('dropdown');
    const indicatorProgress = document.getElementById('indicator-progress');

    // Set the default color to #98FB98
    indicatorProgress.style.backgroundColor = '#98FB98';

    dropdown.addEventListener('change', function() {
      const percentage = dropdown.value;
      indicatorProgress.style.width = percentage + '%';
      indicatorProgress.style.backgroundColor = getColorForPercentage(percentage);
      updateIndicatorText(percentage);
    });

    function getColorForPercentage(percentage) {
      if (percentage < 10) {
        return '#98FB98';
      } else if (percentage < 20) {
        return '#0BDA51';
      } else if (percentage < 30) {
        return '#4CBB17';
      } else if (percentage < 40) {
        return '#00A36C';
      } else if (percentage < 50) {
        return '#dfff51';
      } else if (percentage < 60) {
        return 'rgb(248 231 60)';
      } else if (percentage < 70) {
        return '#E4D00A';
      } else if (percentage < 80) {
        return '#ff905f';
      } else if (percentage < 90) {
        return '#ff785c';
      } else {
        return '#ff5326';
      }
    }

    function updateIndicatorText(percentage) {
      if (percentage < 10) {
        indicatorProgress.textContent = 'Low';
      } else if (percentage < 20) {
        indicatorProgress.textContent = 'Low';
      } else if (percentage < 40) {
        indicatorProgress.textContent = 'Low Risk';
      } else if (percentage < 60) {
        indicatorProgress.textContent = 'Medium Risk';
      } else if (percentage < 70) {
        indicatorProgress.textContent = 'Medium Risk';
      } else if (percentage < 80) {
        indicatorProgress.textContent = 'High Risk';
      } else {
        indicatorProgress.textContent = 'Extremely High Risk';
      }
    }
  </script>


</div><!--end modal-body-->