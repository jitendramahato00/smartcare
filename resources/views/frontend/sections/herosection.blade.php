		<!-- /Header -->
<!-- Search -->

<style>
.hero-section {
  position: relative;
  padding-top: 120px;
  padding-bottom: 100px;
}

.hero-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background-color: rgba(0, 0, 0, 0.6); /* dark overlay */
  z-index: 1;
}

.hero-section .container {
  position: relative;
  z-index: 2;
}
</style>

<!-- Hero Section Start -->
<section class="hero-section text-white d-flex align-items-center" style="background: url('{{ asset('frontend/img/herosection.jpg') }}') center center/cover no-repeat; height: 100vh; position: relative;">
  <div class="container text-center" style="z-index: 2;">
    <h1 class="display-4 fw-bold mb-3">Find the Best Hospitals & Clinics</h1>
    <p class="lead mb-5">Search by location, specialization or hospital name</p>

    <div class="row justify-content-center">
      <div class="col-md-3 mb-2">
        <input type="text" class="form-control" id="locationInput" placeholder="Search Location">
      </div>
      <div class="col-md-4 mb-2">
        <input type="text" class="form-control" id="diseaseInput" placeholder="Search Disease / Specialization ">
      </div>
      <div class="col-md-3 mb-2">
        <select class="form-control" id="resultList">
          <option>Select Hospital</option>
        </select>
      </div>
      <div class="col-md-1 mb-2">
        <button class="btn btn-light w-100"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>

  <!-- Dark overlay for text readability -->
  <div style="position:absolute; top:0; left:0; right:0; bottom:0; background-color:rgba(0,0,0,0.5); z-index:1;"></div>
</section>
<!-- Hero Section End -->

<!-- Hero Section End -->

<!-- /Search -->

<script>
  const hospitalsData = [
    { name: "Birgunj Chest Clinic", location: "birgunj", specialization: "chest" },
    { name: "Birgunj Dental Care", location: "birgunj", specialization: "dental" },
    { name: "Birgunj Heart Center", location: "birgunj", specialization: "cardiology" },
    { name: "Kathmandu Diabetes Center", location: "kathmandu", specialization: "diabetes" },
    { name: "Birgunj Sugar Clinic", location: "birgunj", specialization: "diabetes" },
    { name: "Kathmandu Eye Hospital", location: "kathmandu", specialization: "eye" },
    { name: "Lalitpur Heart Institute", location: "lalitpur", specialization: "cardiology" }
    // aur bhi add karo
  ];

  const locationInput = document.getElementById("locationInput");
  const diseaseInput = document.getElementById("diseaseInput");
  const resultList = document.getElementById("resultList");

  function filterHospitals() {
    const location = locationInput.value.toLowerCase().trim();
    const diseaseOrName = diseaseInput.value.toLowerCase().trim();

    const filtered = hospitalsData.filter(hospital => {
      const matchLocation = hospital.location.includes(location);
      const matchDisease = hospital.specialization.includes(diseaseOrName);
      const matchName = hospital.name.toLowerCase().includes(diseaseOrName);
      return matchLocation && (matchDisease || matchName);
    });

    resultList.innerHTML = "";

    if (filtered.length === 0) {
      resultList.innerHTML = `<option>No results found</option>`;
    } else {
      filtered.forEach(hospital => {
        const option = document.createElement("option");
        option.textContent = hospital.name;
        resultList.appendChild(option);
      });
    }
  }

  locationInput.addEventListener("input", filterHospitals);
  diseaseInput.addEventListener("input", filterHospitals);
</script>