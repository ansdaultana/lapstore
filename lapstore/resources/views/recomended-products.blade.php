
<div class="flex flex-col md:flex-row justify-center items-center space-x-3 md:space-x-10 mt-8 mb-10">
  <div class="slider-container">
    <div class="slider">
      @foreach($recommended_products as $product)
      <div class="slider-item w-56 md:w-72">
     @include('product-container',['product'=>$product]) 
      </div>
    
      @endforeach
    </div>
  </div>
</div>

<style>
  .slider-container {
    overflow: hidden;
    width: 80%;
    max-width: 100%;
  }

  .slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }


  @media (min-width: 768px) {
    .slider-item {
      flex: 0 0 auto;
    width: calc(100% / 2); 
    padding: 0 0.5rem;
    box-sizing: border-box;
    }
  }

  @media (min-width: 1024px) {
    .slider-item {
      flex: 0 0 auto;
    padding: 0 0.5rem;
    box-sizing: border-box;
      width: calc(100% / 3); 
    }
  }
  @media (max-width: 767px) {
    .slider-item {
      margin-left: 10px; /* Adjust the margin as needed */
    }}
  
</style>


<script>
  let sliderInterval;

  function setupSlider() {
    const slider = document.querySelector('.slider');
    const items = document.querySelectorAll('.slider-item');
    let itemsPerSlide = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : items.length;
    let currentIndex = 0;

    function updateSliderPosition() {
      if (itemsPerSlide === items.length) {
        slider.style.transition = 'none';
        slider.style.transform = 'none';
      } else {
        const itemWidth = slider.clientWidth / itemsPerSlide;
        slider.style.transition = 'transform 0.5s ease-in-out';
        slider.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
      }
    }

    function slideNext() {
      currentIndex = (currentIndex + 1) % (items.length - itemsPerSlide + 1);
      updateSliderPosition();
    }

    clearInterval(sliderInterval);
    if (itemsPerSlide < items.length) {
      sliderInterval = setInterval(slideNext, 3000); // Slide every 3 seconds
    }

    updateSliderPosition();
  }

  function applyFlexCol() {
    const slider = document.querySelector('.slider');
    const items = document.querySelectorAll('.slider-item');
    if (window.innerWidth < 768) {
      slider.style.display = 'flex';
      slider.style.flexDirection = 'column';
      slider.style.alignItems = 'center';
      slider.style.justifyContent = 'center';
      items.forEach(item => {
        item.style.width = '100%';
        item.style.padding = '0';
        item.style.display = 'flex'; // Fix the typo here
        item.style.justifyContent = 'center'; // Add this line to center content horizontally
      });
    } else {
      slider.style.display = 'flex';
      slider.style.flexDirection = 'row';
      slider.style.alignItems = 'center';
      slider.style.justifyContent = 'flex-start';
      items.forEach(item => {
        item.style.width = '';
        item.style.padding = '';
        item.style.display = ''; // Reset the display property
        item.style.justifyContent = ''; // Reset the justify-content property
      });
    }
  }

  // Run the setupSlider and applyFlexCol functions initially and whenever the screen size changes
  setupSlider();
  applyFlexCol();
  window.addEventListener('resize', () => {
    setupSlider();
    applyFlexCol();
  });
</script>


