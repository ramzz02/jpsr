$(document).ready(function(){
		var state_arr = new Array("Andaman and Nicobar Islands","Andhra Pradesh","Arunachal Pradesh","Assam","Bihar","Chandigarh","Chhattisgarh","Dadra and Nagar Haveli","Daman and Diu","Delhi","Goa","Gujarat","Haryana","Himachal Pradesh","Jammu and Kashmir","Jharkhand","Karnataka","Kerala","Lakshadweep","Madhya Pradesh","Maharashtra","Manipur","Meghalaya","Mizoram","Nagaland","Orissa","Pondicherry","Punjab","Rajasthan","Sikkim","Tamil Nadu","Telangana","Tripura","Uttar Pradesh","Uttaranchal","West Bengal");

        $.each(state_arr, function (i, item) {
            $('#state').append($('<option>', {
                value: item,
                text : item,
            }, '</option>' ));
        });

       var c_a = new Array();
	    c_a['Andaman and Nicobar Islands']="";
		c_a['Andhra Pradesh']="Anantapur|Chittoor|East Godavari|Guntur|Krishna|Kurnool|Prakasam|Srikakulam|SriPotti Sri Ramulu Nellore|Vishakhapatnam|Vizianagaram|West Godavari|Cudappah";
		c_a['Arunachal Pradesh']="Anjaw|Changlang|Dibang Valley|East Siang|East Kameng|Kurung Kumey|Lohit|Longding|Lower Dibang Valley|Lower Subansiri|Papum Pare|Tawang|Tirap|Upper Siang|Upper Subansiri|West Kameng|West Siang";
		c_a['Assam']="Baksa|Barpeta|Bongaigaon|Cachar|Chirang|Darrang|Dhemaji|Dima Hasao|Dhubri|Dibrugarh|Goalpara|Golaghat|Hailakandi|Jorhat|Kamrup|Kamrup Metropolitan|Karbi Anglong|Karimganj|Kokrajhar|Lakhimpur|Morigaon|Nagaon|Nalbari|Sivasagar|Sonitpur|Tinsukia|Udalguri";
		c_a['Bihar']="Araria|Arwal|Aurangabad|Banka|Begusarai|Bhagalpur|Bhojpur|Buxar|Darbhanga|East Champaran|Gaya|Gopalganj|Jamui|Jehanabad|Kaimur|Katihar|Khagaria|Kishanganj|Lakhisarai|Madhepura|Madhubani|Munger|Muzaffarpur|Nalanda|Nawada|Patna|Purnia|Rohtas|Saharsa|Samastipur|Saran|Sheikhpura|Sheohar|Sitamarhi|Siwan|Supaul|Vaishali|West Champaran";
		c_a['Chhattisgarh']="Bastar|Bijapur|Bilaspur|Dantewada|Dhamtari|Durg|Jashpur|Janjgir-Champa|Korba|Koriya|Kanker|Kabirdham (formerly Kawardha)|Mahasamund|Narayanpur|Raigarh|Rajnandgaon|Raipur|Surajpur|Surguja";
		c_a['Chandigarh']="Chandigarh";
		c_a['Dadra and Nagar Haveli']="Amal|Silvassa";
		c_a['Daman and Diu']="Daman|Diu";
		c_a['Delhi']="Delhi|New Delhi|North Delhi|Noida|Patparganj|Sonabarsa|Tughlakabad";
        c_a['Goa']="Chapora|Dabolim|Madgaon|Marmugao (Marmagao)|Panaji Port|Panjim|Pellet Plant Jetty/Shiroda|Talpona|Vasco da Gama";
		c_a['Gujarat']="Ahmedabad|Amreli district|Anand|Aravalli|Banaskantha|Bharuch|Bhavnagar|Dahod|Dang|Gandhinagar|Jamnagar|Junagadh|Kutch|Kheda|Mehsana|Narmada|Navsari|Patan|Panchmahal|Porbandar|Rajkot|Sabarkantha|Surendranagar|Surat|Tapi|Vadodara|Valsad";
		c_a['Haryana']="Ambala|Bhiwani|Faridabad|Fatehabad|Gurgaon|Hissar|Jhajjar|Jind|Karnal|Kaithal|Kurukshetra|Mahendragarh|Mewat|Palwal|Panchkula|Panipat|Rewari|Rohtak|Sirsa|Sonipat|Yamuna Nagar";
		c_a['Himachal Pradesh']="Baddi|Baitalpur|Chamba|Dharamsala|Hamirpur|Kangra|Kinnaur|Kullu|Lahaul & Spiti|Mandi|Simla|Sirmaur|Solan|Una";
		c_a['Jammu and Kashmir']="Jammu|Leh|Rajouri|Srinagar";
		c_a['Jharkhand']="Bokaro|Chatra|Deoghar|Dhanbad|Dumka|East Singhbhum|Garhwa|Giridih|Godda|Gumla|Hazaribag|Jamtara|Khunti|Koderma|Latehar|Lohardaga|Pakur|Palamu|Ramgarh|Ranchi|Sahibganj|Seraikela Kharsawan|Simdega|West Singhbhum";
		c_a['Kerala']="Alappuzha|Ernakulam|Idukki|Kannur|Kasaragod|Kollam|Kottayam|Kozhikode|Malappuram|Palakkad|Pathanamthitta|Thrissur|Thiruvananthapuram|Wayanad";
        c_a['Karnataka']="Bagalkot|Bangalore|Bangalore Urban|Belgaum|Bellary|Bidar|Bijapur|Chamarajnagar|Chikkamagaluru|Chikkaballapur|Chitradurga|Davanagere|Dharwad|Dakshina Kannada|Gadag|Gulbarga|Hassan|Haveri district|Kodagu|Kolar|Koppal|Mandya|Mysore|Raichur|Shimoga|Tumkur|Udupi|Uttara Kannada|Ramanagara|Yadgir";
        c_a['Lakshadweep']="Kavaratti|Lakshadweep";
		c_a['Madhya Pradesh']="Alirajpur|Anuppur|Ashoknagar|Balaghat|Barwani|Betul|Bhilai|Bhind|Bhopal|Burhanpur|Chhatarpur|Chhindwara|Damoh|Dewas|Dhar|Guna|Gwalior|Hoshangabad|Indore|Itarsi|Jabalpur|Khajuraho|Khandwa|Khargone|Malanpur|Malanpuri (Gwalior)|Mandla|Mandsaur|Morena|Narsinghpur|Neemuch|Panna|Pithampur|Raipur|Raisen|Ratlam|Rewa|Sagar|Satna|Sehore|Seoni|Shahdol|Singrauli|Ujjain";
        c_a['Maharashtra']="Ahmednagar|Akola|Alibag|Amaravati|Arnala|Aurangabad|Aurangabad|Bandra|Bassain|Belapur|Bhiwandi|Bhusaval|Borliai-Mandla|Chandrapur|Dahanu|Daulatabad|Dighi (Pune)|Dombivali|Goa|Jaitapur|Jalgaon|Jawaharlal Nehru (Nhava Sheva)|Kalyan|Karanja|Kelwa|Khopoli|Kolhapur|Lonavale|Malegaon|Malwan|Manori|Mira Bhayandar|Miraj|Mumbai (ex Bombay)|Murad|Nagapur|Nagpur|Nalasopara|Nanded|Nandgaon|Nasik|Navi Mumbai|Nhave|Osmanabad|Palghar|Panvel|Pimpri|Pune|Ratnagiri|Sholapur|Shrirampur|Shriwardhan|Tarapur|Thana|Thane|Trombay|Varsova|Vengurla|Virar|Wada";
		c_a['Manipur']="Bishnupur|Churachandpur|Chandel|Imphal East|Senapati|Tamenglong|Thoubal|Ukhrul|Imphal West";
		c_a['Meghalaya']="Baghamara|Balet|Barsora|Bolanganj|Dalu|Dawki|Ghasuapara|Mahendraganj|Moreh|Ryngku|Shella Bazar|Shillong";
		c_a['Mizoram']="Aizawl|Champhai|Kolasib|Lawngtlai|Lunglei|Mamit|Saiha|Serchhip";
		c_a['Nagaland']="Dimapur|Kiphire|Kohima|Longleng|Mokokchung|Mon|Peren|Phek|Tuensang|Wokha|Zunheboto";
		c_a['Orissa']="Bahabal Pur|Bhubaneswar|Chandbali|Gopalpur|Jeypore|Paradip Garh|Puri|Rourkela";
		c_a['Pondicherry']="Karaikal|Mahe|Pondicherry|Yanam";
		c_a['Punjab']="Amritsar|Barnala|Bathinda|Firozpur|Faridkot|Fatehgarh Sahib|Fazilka|Gurdaspur|Hoshiarpur|Jalandhar|Kapurthala|Ludhiana|Mansa|Moga|Sri Muktsar Sahib|Pathankot|Patiala|Rupnagar|Ajitgarh (Mohali)|Sangrur|Shahid Bhagat Singh Nagar|Tarn Taran";
		c_a['Rajasthan']="Ajmer|Alwar|Banswara|Barmer|Barmer Rail Station|Basni|Beawar|Bharatpur|Bhilwara|Bhiwadi|Bikaner|Bongaigaon|Boranada, Jodhpur|Chittaurgarh|Fazilka|Ganganagar|Jaipur|Jaipur-Kanakpura|Jaipur-Sitapura|Jaisalmer|Jodhpur|Jodhpur-Bhagat Ki Kothi|Jodhpur-Thar|Kardhan|Kota|Munabao Rail Station|Nagaur|Rajsamand|Sawaimadhopur|Shahdol|Shimoga|Tonk|Udaipur";
		c_a['Sikkim']="Chamurci|Gangtok";
		c_a['Tamil Nadu']="Ariyalur|Chennai|Coimbatore|Cuddalore|Dharmapuri|Dindigul|Erode|Kanchipuram|Kanyakumari|Karur|Krishnagiri|Madurai|Mandapam|Nagapattinam|Nilgiris|Namakkal|Perambalur|Pudukkottai|Ramanathapuram|Salem|Sivaganga|Thanjavur|Thiruvallur|Tirupur|Tiruchirapalli|Theni|Tirunelveli|Thanjavur|Thoothukudi|Tiruvallur|Tiruvannamalai|Vellore|Villupuram|Viruthunagar";
        c_a['Telangana']="Adilabad|Hyderabad|Karimnagar|Khammam|Mahbubnagar|Medak|Nalgonda|Nizamabad|Ranga Reddy|Secunderabad|Warangal";
		c_a['Tripura']="Agartala|Dhalaighat|Kailashahar|Kamalpur|Kanchanpur|Kel Sahar Subdivision|Khowai|Khowaighat|Mahurighat|Old Raghna Bazar|Sabroom|Srimantapur";
		c_a['Uttar Pradesh']="Agra|Allahabad|Auraiya|Banbasa|Bareilly|Berhni|Bhadohi|Dadri|Dharchula|Gandhar|Gauriphanta|Ghaziabad|Gorakhpur|Gunji|Jarwa|Jhulaghat (Pithoragarh)|Kanpur|Katarniyaghat|Khunwa|Loni|Lucknow|Meerut|Moradabad|Muzaffarnagar|Nepalgunj Road|Pakwara (Moradabad)|Pantnagar|Saharanpur|Sonauli|Surajpur|Tikonia|Varanasi";
		c_a['Uttarakhand']="Almora|Badrinath|Bangla|Barkot|Bazpur|Chamoli|Chopra|Dehra Dun|Dwarahat|Garhwal|Haldwani|Hardwar|Haridwar|Jamal|Jwalapur|Kalsi|Kashipur|Mall|Mussoorie|Nahar|Naini|Pantnagar|Pauri|Pithoragarh|Rameshwar|Rishikesh|Rohni|Roorkee|Sama|Saur";
		c_a['West Bengal']="Alipurduar|Bankura|Bardhaman|Birbhum|Cooch Behar|Dakshin Dinajpur|Darjeeling|Hooghly|Howrah|Jalpaiguri|Kolkata|Maldah|Murshidabad|Nadia|North 24 Parganas|Paschim Medinipur|Purba Medinipur|Purulia|South 24 Parganas|Uttar Dinajpur";
        
        $('#state').change(function(){
            var s = $('#state').val();
            if(s=='Select State'){
                $('#city').empty();
                $('#city').append($('<option>', {
                    value: '0',
                    text: 'Select City',
                }, '</option>'));
            }
            var city_arr = c_a[s].split("|");
            $('#city').empty();

            $.each(city_arr, function (j, item_city) {
                $('#city').append($('<option>', {
                    value: item_city,
                    text: item_city,
                }, '</option>'));
            });
        });
    });