<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti - Contact Us</title>
    <link rel="stylesheet" href="../assets/css/output.css">
   </head>
<body class="font-sans">
    <?php include '../includes/usernavbar.php'; ?>
    
    <!-- Notification Messages -->
    <?php if(isset($message)): ?>
        <div class="fixed top-4 right-4 z-50 max-w-sm w-full sm:w-auto px-4 sm:px-0">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($message); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if(isset($error)): ?>
        <div class="fixed top-4 right-4 z-50 max-w-sm w-full sm:w-auto px-4 sm:px-0">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span><?php echo htmlspecialchars($error); ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <!-- Header -->
    <div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
        <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold px-4">Contact Us</h1>
    </div>
    
    <!-- Main Content -->
    <div class="mx-4 sm:mx-6 lg:mx-8 p-4 sm:p-6">
        <!-- Contact Form -->
        <div class="max-w-4xl mx-auto">
            <form action="contact.php" method="POST" class="bg-white rounded-xl shadow-sm p-4 sm:p-6 md:p-8">
                <h2 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4 text-center uppercase">Leave Us Your Info</h2>
                <p class="text-center mb-4 sm:mb-6 text-sm sm:text-base">And we will get back to you</p>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                    <div>
                        <label for="name" class="block text-gray-700 font-medium text-sm sm:text-base mb-1">Your Name (required)</label>
                        <input name="name" type="text" id="name" 
                               class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-[#ec8623] rounded-lg focus:ring-2 focus:ring-[#ec8623] outline-none text-sm sm:text-base"
                               value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" 
                               required>
                    </div>
                    
                    <div>
                        <label for="email" class="block text-gray-700 font-medium text-sm sm:text-base mb-1">Your Email (required)</label>
                        <input name="email" type="email" id="email" 
                               class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-[#ec8623] rounded-lg focus:ring-2 focus:ring-[#ec8623] outline-none text-sm sm:text-base"
                               value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" 
                               required>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                    <div>
                        <label for="phone" class="block text-gray-700 font-medium text-sm sm:text-base mb-1">Your Phone Number</label>
                        <input name="phone" type="tel" id="phone" 
                               class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-[#ec8623] rounded-lg focus:ring-2 focus:ring-[#ec8623] outline-none text-sm sm:text-base"
                               value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-gray-700 font-medium text-sm sm:text-base mb-1">Subject</label>
                        <input name="subject" type="text" id="subject" 
                               class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-[#ec8623] rounded-lg focus:ring-2 focus:ring-[#ec8623] outline-none text-sm sm:text-base"
                               value="<?php echo isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : ''; ?>">
                    </div>
                </div>
                
                <div class="mb-6 sm:mb-8">
                    <label for="message" class="block text-gray-700 font-medium text-sm sm:text-base mb-1">Your Message (required)</label>
                    <textarea name="message" id="message" rows="4" 
                              class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-[#ec8623] rounded-lg focus:ring-2 focus:ring-[#ec8623] outline-none text-sm sm:text-base"
                              required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                </div>
                
                <!-- Hidden honeypot field for spam protection -->
                <div class="hidden">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website">
                </div>
                
                <div class="flex justify-center">
                    <button type="submit" name="submit" 
                            class="px-6 sm:px-8 md:px-[45px] bg-[#ec8623] text-white py-2.5 sm:py-3 rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center text-sm sm:text-base w-full sm:w-auto">
                        <i class="fas fa-paper-plane mr-2"></i> Send Message
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Office Locations -->
        <div class="mt-12 sm:mt-16 mb-8 sm:mb-10 px-0 sm:px-4 lg:px-8">
            <h2 class="text-center text-xl sm:text-2xl md:text-3xl font-bold text-gray-800 mb-6 sm:mb-8 uppercase">Office Locations</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8">
                <!-- Sangli -->
                <div class="bg-white p-4 sm:p-5 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                    <div>
                        <div class="w-full h-32 sm:h-36 md:h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg overflow-hidden">
                            <img src="../assets/images/Sangli.png" alt="Sangli Office" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-3 sm:mt-4">
                            <h3 class="text-base sm:text-lg font-bold text-gray-800">Sangli</h3>
                            <p class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2">F14, 3rd Floor, Shri Kapila, MSEB Road, Vishrambagh, Sangli</p>
                        </div>
                    </div>
                    <a href="https://www.google.com/maps?q=F14, 3rd Floor, Shri Kapila, MSEB Road, Vishrambagh, Sangli" 
                       target="_blank" rel="noopener noreferrer" 
                       class="mt-3 sm:mt-4 px-4 py-2 bg-[#ec8623] text-white rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center text-sm sm:text-base">
                        <i class="fas fa-map-marker-alt mr-2"></i> View Map
                    </a>
                </div>
                
                <!-- Karad -->
                <div class="bg-white p-4 sm:p-5 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                    <div>
                        <div class="w-full h-32 sm:h-36 md:h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg overflow-hidden">
                            <img src="../assets/images/Karad.png" alt="Karad Office" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-3 sm:mt-4">
                            <h3 class="text-base sm:text-lg font-bold text-gray-800">Karad</h3>
                            <p class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2">Flat No. 2, Suman Appt, Near Hotel Deviprasad, Opposite to Gov Pharmacy College, Vidyanagar, Karad</p>
                        </div>
                    </div>
                    <a href="https://www.google.com/maps?q=Flat No. 2, Suman Appt, Near Hotel Deviprasad, Opposite to Gov Pharmacy College, Vidyanagar, Karad" 
                       target="_blank" rel="noopener noreferrer" 
                       class="mt-3 sm:mt-4 px-4 py-2 bg-[#ec8623] text-white rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center text-sm sm:text-base">
                        <i class="fas fa-map-marker-alt mr-2"></i> View Map
                    </a>
                </div>
                
                <!-- Kolhapur -->
                <div class="bg-white p-4 sm:p-5 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                    <div>
                        <div class="w-full h-32 sm:h-36 md:h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg overflow-hidden">
                            <img src="../assets/images/Kolhapur.png" alt="Kolhapur Office" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-3 sm:mt-4">
                            <h3 class="text-base sm:text-lg font-bold text-gray-800">Kolhapur</h3>
                            <p class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2">RS No.2107/K 6th Lane, Rajarampuri, Kolhapur</p>
                        </div>
                    </div>
                    <a href="https://www.google.com/maps?q=RS No.2107/K 6th Lane, Rajarampuri, Kolhapur" 
                       target="_blank" rel="noopener noreferrer" 
                       class="mt-3 sm:mt-4 px-4 py-2 bg-[#ec8623] text-white rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center text-sm sm:text-base">
                        <i class="fas fa-map-marker-alt mr-2"></i> View Map
                    </a>
                </div>
                
                <!-- Satara -->
                <div class="bg-white p-4 sm:p-5 rounded-lg shadow-md flex flex-col justify-between hover:shadow-lg transition duration-300">
                    <div>
                        <div class="w-full h-32 sm:h-36 md:h-40 bg-gradient-to-r from-orange-100 to-pink-100 rounded-lg overflow-hidden">
                            <img src="../assets/images/Satara.png" alt="Satara Office" 
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="mt-3 sm:mt-4">
                            <h3 class="text-base sm:text-lg font-bold text-gray-800">Satara</h3>
                            <p class="text-gray-500 text-xs sm:text-sm mt-1 sm:mt-2">Satara</p>
                        </div>
                        </div>
                    <a href="https://maps.app.goo.gl/mqkcdHXGzWYQrnEh9?g_st=ipc" target="_blank" rel="noopener noreferrer" class="mt-3 sm:mt-4 px-4 py-2 bg-[#ec8623] text-white rounded-lg hover:bg-[#f79739] transition duration-300 flex items-center justify-center text-sm sm:text-base">
                        <i class="fas fa-map-marker-alt mr-2"></i> View Map
                    </a>
                </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
</body>
</html>