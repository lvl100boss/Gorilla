import './bootstrap';

function toggleDropdown() {
    const dropDownElem = document.getElementById("nav-drop-down");
    if (dropDownElem.classList.contains('hidden')) {
        dropDownElem.classList.remove("hidden");
        dropDownElem.classList.add("block");
    } else {
        dropDownElem.classList.remove("block");
        dropDownElem.classList.add("hidden");
    }
}

// Function to hide dropdown
function hideDropdown() {
    const dropDownElem = document.getElementById("nav-drop-down");
    dropDownElem.classList.remove("block");
    dropDownElem.classList.add("hidden");
}

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', () => {
    // Find the element that should trigger the dropdown
    const dropdownTrigger = document.querySelector('.relative.group');
    const dropDownElem = document.getElementById("nav-drop-down");
    
    // Add click event listener to the trigger element
    if (dropdownTrigger) {
        dropdownTrigger.addEventListener('click', (event) => {
            event.stopPropagation(); // Prevent this click from being caught by the document listener
            toggleDropdown();
        });
    }

    // Add click event listener to the document
    document.addEventListener('click', (event) => {
        // Check if the click is outside the dropdown and its trigger
        if (!dropdownTrigger.contains(event.target) && !dropDownElem.contains(event.target)) {
            hideDropdown();
        }
    });

    // Prevent clicks inside the dropdown from closing it
    dropDownElem.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});


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





