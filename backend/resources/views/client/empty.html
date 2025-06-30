<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Selection Modal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }
        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
            transition: opacity 200ms, transform 200ms;
        }
        .modal-exit {
            opacity: 1;
            transform: scale(1);
        }
        .modal-exit-active {
            opacity: 0;
            transform: scale(0.95);
            transition: opacity 200ms, transform 200ms;
        }
        .class-option:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .class-option {
            transition: all 0.2s ease;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">School Class Selector</h1>
        <button 
            id="openModalBtn" 
            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
        >
            <i class="fas fa-graduation-cap mr-2"></i> Select Your Class
        </button>
    </div>

    <!-- Modal Backdrop -->
    <div 
        id="modalBackdrop" 
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 hidden"
    >
        <!-- Modal Container -->
        <div 
            id="modalContainer" 
            class="bg-white rounded-xl shadow-2xl overflow-hidden w-full max-w-md modal-enter"
        >
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-5 text-white">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">Select Your Class</h2>
                    <button 
                        id="closeModalBtn" 
                        class="text-white hover:text-gray-200 focus:outline-none"
                    >
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                <p class="text-blue-100 mt-1">Choose your current class from the options below</p>
            </div>
            
            <!-- Modal Content -->
            <div class="p-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                    <!-- Generate class options from 1 to 11 -->
                    <script>
                        for (let i = 1; i <= 11; i++) {
                            document.write(`
                                <div 
                                    class="class-option bg-white border border-gray-200 rounded-lg p-4 text-center cursor-pointer hover:bg-blue-50 hover:border-blue-300"
                                    onclick="selectClass(${i})"
                                >
                                    <div class="text-blue-600 mb-2">
                                        <i class="fas fa-chalkboard-teacher text-3xl"></i>
                                    </div>
                                    <h3 class="font-semibold text-gray-800">Class ${i}</h3>
                                    <p class="text-sm text-gray-500 mt-1">Grade ${i > 10 ? '11+' : i}</p>
                                </div>
                            `);
                        }
                    </script>
                </div>
            </div>
            
            <!-- Modal Footer -->
            <div class="bg-gray-50 px-5 py-4 flex justify-between">
                <button 
                    id="cancelBtn" 
                    class="text-gray-600 hover:text-gray-800 font-medium px-4 py-2 rounded-lg hover:bg-gray-200 transition"
                >
                    Cancel
                </button>
                <div class="text-gray-500 italic" id="selectedClassDisplay">
                    No class selected
                </div>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const modalBackdrop = document.getElementById('modalBackdrop');
        const modalContainer = document.getElementById('modalContainer');
        const selectedClassDisplay = document.getElementById('selectedClassDisplay');
        
        // Current selected class
        let selectedClass = null;
        
        // Open modal
        openModalBtn.addEventListener('click', () => {
            modalBackdrop.classList.remove('hidden');
            modalContainer.classList.add('modal-enter');
            
            // Add animation class
            setTimeout(() => {
                modalContainer.classList.remove('modal-enter');
            }, 200);
        });
        
        // Close modal
        function closeModal() {
            modalContainer.classList.add('modal-exit');
            
            setTimeout(() => {
                modalBackdrop.classList.add('hidden');
                modalContainer.classList.remove('modal-exit');
            }, 200);
        }
        
        // Close modal when clicking X, cancel, or backdrop
        closeModalBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        modalBackdrop.addEventListener('click', (e) => {
            if (e.target === modalBackdrop) {
                closeModal();
            }
        });
        
        // Select class function
        function selectClass(classNumber) {
            selectedClass = classNumber;
            selectedClassDisplay.textContent = `Selected: Class ${classNumber}`;
            selectedClassDisplay.classList.remove('text-gray-500', 'italic');
            selectedClassDisplay.classList.add('text-blue-600', 'font-semibold');
            
            // Highlight selected class
            document.querySelectorAll('.class-option').forEach(option => {
                option.classList.remove('bg-blue-100', 'border-blue-400');
                if (option.textContent.includes(`Class ${classNumber}`)) {
                    option.classList.add('bg-blue-100', 'border-blue-400');
                }
            });
            
            // Close modal after 1 second (simulate form submission)
            setTimeout(() => {
                closeModal();
                alert(`You have selected Class ${classNumber}!`);
            }, 1000);
        }
        
        // Close modal when pressing Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modalBackdrop.classList.contains('hidden')) {
                closeModal();
            }
        });
    </script>
</body>
</html>