function changeImage(element) {
    // Get the main image element by ID
    const section = element.closest('.jet-desc');
    const mainImage = section.querySelector('.mainImage');
    // Update the main image source with the clicked image's source
    var tempImage = mainImage.src;
    mainImage.src = element.src;
    element.src = tempImage;
}

document.addEventListener('DOMContentLoaded', () => {
    function addStarToPremiumDivs() {
        
        const sections = document.querySelectorAll('section');
    
     
        sections.forEach(section => {
           
            if (section.classList.contains('premium')) {
                
                const canvas = document.createElement('canvas');
                canvas.width = 50; 
                canvas.height = 50;
                canvas.style.position = 'absolute';
                canvas.style.bottom = '10px'; 
                canvas.style.left = '10px'; 
    
                
                const ctx = canvas.getContext('2d');
                drawStar(ctx, 25, 25, 5, 20, 8); // Qendra, majat, rrezja e jashtme, rrezja e brendshme
    
                
                section.style.position = 'relative';
                section.appendChild(canvas);
            } else {
                
                const button = section.querySelector('.button1');
    
                if (button) {
                    button.style.display = 'none';
                }
            }
        });
    }
    
    // Funksion që vizaton një yll në canvas
    function drawStar(ctx, cx, cy, spikes, outerRadius, innerRadius) {
        let rot = Math.PI / 2 * 3; // Rrotullimi fillestar i yllit
        let x = cx; // Koordinata X e qendrës
        let y = cy; // Koordinata Y e qendrës
        let step = Math.PI / spikes; // Hapi për majat
    
        ctx.beginPath();
        ctx.moveTo(cx, cy - outerRadius); // Lëvizim në fillim të yllit
        for (let i = 0; i < spikes; i++) {
            // Vizatoni vijën për rrezen e jashtme
            x = cx + Math.cos(rot) * outerRadius;
            y = cy + Math.sin(rot) * outerRadius;
            ctx.lineTo(x, y);
            rot += step;
    
            // Vizatoni vijën për rrezen e brendshme
            x = cx + Math.cos(rot) * innerRadius;
            y = cy + Math.sin(rot) * innerRadius;
            ctx.lineTo(x, y);
            rot += step;
        }
        ctx.lineTo(cx, cy - outerRadius); // Mbyllim yllin
        ctx.closePath();
        ctx.fillStyle = 'gold'; 
        ctx.fill();
        ctx.strokeStyle = 'black';
        ctx.stroke();
    }
    

    addStarToPremiumDivs();
    
});
document.addEventListener('DOMContentLoaded', () => {
    const modals = document.querySelectorAll('.modal');  // Get all modals
    const closeModalButtons = document.querySelectorAll('.close');  // Get all close buttons
    const openModalButtons = document.querySelectorAll('.openModalBtn');  // Get all open modal buttons

    // Function to open the modal associated with the button
    function openModal(event) {
        const button = event.currentTarget;
        const index = Array.from(openModalButtons).indexOf(button);  // Get the index of the clicked button
        const modal = modals[index];  // Get the corresponding modal using the same index
        modal.style.display = 'flex';  // Show the modal
    }

    // Add event listeners to open modal when button is clicked
    openModalButtons.forEach(button => {
        button.addEventListener('click', openModal);
    });
    
    // Close modal when clicking outside the modal content
    window.addEventListener('click', (event) => {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
});





