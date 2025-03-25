let currentSlide = 0;
const slides = document.querySelectorAll('.slideshow-image');


function showNextSlide() {
    slides[currentSlide].classList.remove('active'); 
    currentSlide = (currentSlide + 1) % slides.length; 
    slides[currentSlide].classList.add('active');
}


slides[currentSlide].classList.add('active'); 


setInterval(showNextSlide, 3500);


setInterval(showNextSlide, 2000);

function openTab(event, tabId) {
    const tabs = document.querySelectorAll('.tab-content');
    const buttons = document.querySelectorAll('.tab-button');

    tabs.forEach(tab => (tab.style.display = 'none'));
    buttons.forEach(button => button.classList.remove('active'));

    document.getElementById(tabId).style.display = 'block';
    event.currentTarget.classList.add('active');
}


const headers = document.querySelectorAll(".accordion-header");

headers.forEach(header => {
  header.addEventListener("click", () => {
    const content = header.nextElementSibling;
    const allContents = document.querySelectorAll(".accordion-content");

  
    allContents.forEach(c => {
      if (c !== content) {
        c.style.maxHeight = null;
      }
    });

    
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  });
});

document.querySelectorAll('.resource-tab-button').forEach(button => {
  button.addEventListener('click', () => {
   
    document.querySelectorAll('.resource-tab-button').forEach(btn => btn.classList.remove('active'));
    document.querySelectorAll('.resource-tab-content').forEach(content => content.classList.remove('active'));

 
    button.classList.add('active');
    const tabId = button.getAttribute('data-tab');
    document.getElementById(tabId).classList.add('active');
  });
});

const data = new Date();

const formattedDate = `${data.getDate().toString().padStart(2, '0')}/${(data.getMonth() + 1).toString().padStart(2, '0')}/${data.getFullYear()}`;

const flightStatusElements = document.getElementsByClassName('flight-status');

for (let i = 0; i < flightStatusElements.length; i++) {
    const h1 = flightStatusElements[i].querySelector('h1');
    
    if (h1) {
        h1.textContent = "Live Rented Flight Status - " + formattedDate;
    }
}