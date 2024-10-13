import './bootstrap';


window.showPreview = function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
        preview.src = e.target.result; // Set the preview to the selected image
        preview.classList.remove('hidden'); // Show the preview
        preview.classList.add('block'); // Add block display
    }

    if (file) {
        reader.readAsDataURL(file); // Convert the file to base64 URL
    } else {
        preview.src = ''; // Clear the preview
        preview.classList.add('hidden'); // Hide the preview
    }
}
window.onload = function() {
    const oldImage = "{{ old('image') }}";
    if (oldImage) {
        document.getElementById('preview').src = '{{ old("image") ? asset("storage/" . old("image")) : "" }}';
        document.getElementById('preview').classList.remove('hidden');
        document.getElementById('preview').classList.add('block');
    }
}

window.onload = function() {
    const successMessage = document.getElementById('success-message');
    if (successMessage) {
        // Set a timeout to hide the message after 3 seconds (3000 milliseconds)
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3000);
    }
};

function throttle(func, limit) {
    let lastFunc;
    let lastRan;
    return function() {
        const context = this;
        const args = arguments;
        if (!lastRan) {
            func.apply(context, args);
            lastRan = Date.now();
        } else {
            clearTimeout(lastFunc);
            lastFunc = setTimeout(function() {
                if ((Date.now() - lastRan) >= limit) {
                    func.apply(context, args);
                    lastRan = Date.now();
                }
            }, limit - (Date.now() - lastRan));
        }
    };
}

document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.draggable-container');
    let isDragging = false;
    let startX, scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isDragging = true;
        container.classList.add('dragging');
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
    });

    container.addEventListener('mouseleave', () => {
        isDragging = false;
        container.classList.remove('dragging');
    });

    container.addEventListener('mouseup', () => {
        isDragging = false;
        container.classList.remove('dragging');
    });

    container.addEventListener('mousemove', throttle((e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const scroll = (x - startX) * 2; // Adjust scroll multiplier as needed
        container.scrollLeft = scrollLeft - scroll;
    }, 16)); // Throttle to 60fps (16ms)
});





