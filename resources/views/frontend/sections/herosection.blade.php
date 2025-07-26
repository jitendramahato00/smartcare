{{-- ... (Your existing HTML and CSS for hero section) ... --}}

<section class="hero-section text-white d-flex align-items-center" style="background: url('{{ asset('frontend/img/herosection.jpg') }}') center center/cover no-repeat; height: 100vh; position: relative;">
  <div class="container text-center" style="z-index: 2;">
    <h1 class="display-4 fw-bold mb-3">Find the Best Hospitals & Clinics</h1>
    <p class="lead mb-5">Search by location, specialization or hospital name</p>

    <div class="row justify-content-center">
      <div class="col-md-3 mb-2">
        {{-- Location input with datalist for suggestions --}}
        <input type="text" class="form-control" id="locationInput" placeholder="Search Location" list="locationOptions">
        <datalist id="locationOptions">
          {{-- Locations ko database se dynamically load kiya --}}
          @foreach($locations as $location)
            <option value="{{ $location->name }}">{{ $location->name }}</option>
          @endforeach
        </datalist>
      </div>
      <div class="col-md-4 mb-2">
        <input type="text" class="form-control" id="diseaseInput" placeholder="Search Disease / Specialization ">
      </div>
      <div class="col-md-3 mb-2">
        {{-- Hospital select dropdown populated dynamically --}}
        <select class="form-control" id="resultList">
          <option value="">Select Hospital</option>
          {{-- Hospitals ko database se dynamically load kiya --}}
          @foreach($hospitals as $hospital)
            <option value="{{ $hospital->id }}">{{ $hospital->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-1 mb-2">
        <button class="btn btn-light w-100" id="searchButton"><i class="fas fa-search"></i></button>
      </div>
    </div>
  </div>

  <div style="position:absolute; top:0; left:0; right:0; bottom:0; background-color:rgba(0,0,0,0.5); z-index:1;"></div>
</section>
<script>
  const locationInput = document.getElementById("locationInput");
  const diseaseInput = document.getElementById("diseaseInput");
  const resultList = document.getElementById("resultList");
  const searchButton = document.getElementById("searchButton");

  // Laravel se saara hospital data JavaScript array mein convert ho jayega
  // Ab 'hospitals' variable mein locations bhi eager loaded honge
  const allHospitals = @json($hospitals);

  function filterHospitals() {
    const locationSearch = locationInput.value.toLowerCase().trim();
    const diseaseOrNameSearch = diseaseInput.value.toLowerCase().trim();

    // Previous results ko clear karo
    resultList.innerHTML = `<option value="">Select Hospital</option>`;

    let filtered = allHospitals.filter(hospital => {
      // Hospital ki location name ko safe tarike se access karein
      const hospitalLocationName = hospital.location ? hospital.location.name.toLowerCase() : '';
      const hospitalName = hospital.name.toLowerCase();
      // Hospital ki specialization (jo naya column add kiya hai)
      const hospitalSpecialization = hospital.specialization ? hospital.specialization.toLowerCase() : '';

      const matchLocation = locationSearch === '' || hospitalLocationName.includes(locationSearch);
      const matchDiseaseOrName = diseaseOrNameSearch === '' ||
                                 hospitalSpecialization.includes(diseaseOrNameSearch) ||
                                 hospitalName.includes(diseaseOrNameSearch);

      return matchLocation && matchDiseaseOrName;
    });

    if (filtered.length === 0) {
      resultList.innerHTML = `<option value="">No results found</option>`;
    } else {
      filtered.forEach(hospital => {
        const option = document.createElement("option");
        option.value = hospital.id; // Hospital ID ko value banayenge
        option.textContent = hospital.name;
        resultList.appendChild(option);
      });
    }
  }

  // Input changes par filterHospitals function ko call karo
  locationInput.addEventListener("input", filterHospitals);
  diseaseInput.addEventListener("input", filterHospitals);

  // Page load hone par bhi filter karo (agar pehle se input mein values hain)
  document.addEventListener('DOMContentLoaded', filterHospitals);

  searchButton.addEventListener('click', () => {
      filterHospitals();
      // Optional: Agar search results page par redirect karna hai
      // const locationParam = locationInput.value;
      // const diseaseParam = diseaseInput.value;
      // const hospitalParam = resultList.value;
      // window.location.href = `/search?location=${locationParam}&disease=${diseaseParam}&hospital=${hospitalParam}`;
  });

  // **AJAX Filtering (Optional, bade datasets ke liye behtar)**
  // Agar aapko bade data set par performance chahiye, toh yeh uncomment kar sakte ho.
  // Function ko 'HomeController' mein 'filterHospitals' method se link kiya gaya hai
  /*
  function fetchHospitalsDynamically() {
      const location = locationInput.value;
      const disease = diseaseInput.value;

      fetch(`{{ route('api.hospitals.filter') }}?location=${location}&disease=${disease}`)
          .then(response => response.json())
          .then(data => {
              resultList.innerHTML = `<option value="">Select Hospital</option>`;
              if (data.length === 0) {
                  resultList.innerHTML = `<option value="">No results found</option>`;
              } else {
                  data.forEach(hospital => {
                      const option = document.createElement("option");
                      option.value = hospital.id;
                      option.textContent = hospital.name;
                      resultList.appendChild(option);
                  });
              }
          })
          .catch(error => console.error('Error fetching hospitals:', error));
  }

  // Agar AJAX use karna hai, toh upar ke event listeners ko isse replace kar do
  // locationInput.addEventListener("input", fetchHospitalsDynamically);
  // diseaseInput.addEventListener("input", fetchHospitalsDynamically);

  // // Initial load bhi AJAX se
  // document.addEventListener('DOMContentLoaded', fetchHospitalsDynamically);
  */
</script>