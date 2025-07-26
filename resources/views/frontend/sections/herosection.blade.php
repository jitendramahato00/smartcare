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


<script>
  const locationInput = document.getElementById("locationInput");
  const diseaseInput = document.getElementById("diseaseInput");
  const resultList = document.getElementById("resultList");
  const searchButton = document.getElementById("searchButton");

  const allHospitals = @json($hospitals);

  function filterHospitals() {
    const locationSearch = locationInput.value.toLowerCase().trim();
    const diseaseOrNameSearch = diseaseInput.value.toLowerCase().trim();

    resultList.innerHTML = `<option value="">Select Hospital</option>`;

    const filtered = allHospitals.filter(hospital => {
      const hospitalLocationName = hospital.location ? hospital.location.name.toLowerCase() : '';
      const hospitalName = hospital.name.toLowerCase();
      const hospitalSpecialization = hospital.specialization ? hospital.specialization.toLowerCase() : '';

      const matchLocation = locationSearch === '' || hospitalLocationName.includes(locationSearch);
      const matchDiseaseOrName =
        diseaseOrNameSearch === '' ||
        hospitalSpecialization.includes(diseaseOrNameSearch) ||
        hospitalName.includes(diseaseOrNameSearch);

      return matchLocation && matchDiseaseOrName;
    });

    if (filtered.length === 0) {
      resultList.innerHTML = `<option value="">No results found</option>`;
    } else {
      filtered.forEach(hospital => {
        const option = document.createElement("option");
        option.value = hospital.id;
        option.textContent = hospital.name;
        resultList.appendChild(option);
      });
    }
  }

  // Filter as the user types
  locationInput.addEventListener("input", filterHospitals);
  diseaseInput.addEventListener("input", filterHospitals);
  document.addEventListener('DOMContentLoaded', filterHospitals);

  // Redirect to static hospital listing page on any hospital selection
  resultList.addEventListener('change', function () {
    const selectedId = this.value;
    if (selectedId) {
      window.location.href = "{{ route('frontend.hospitals.index') }}";
    }
  });

  // Optional search button behavior (re-applies filters)
  searchButton.addEventListener('click', () => {
    filterHospitals();
  });
</script>
