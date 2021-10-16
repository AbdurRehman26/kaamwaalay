<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Data\Models\CityArea;

class CityAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $inputArray = [
        "100 Quarters",
        "Abdullah Ahmed Road",
        "Abdullah Haroon Road",
        "Abid Town",
        "Abu Zar Ghaffari",
        "Abul Hassan Isphani Road",
        "Agra Taj Colony",
        "Ahsan Grand City",
        "Ahsanabad",
        "Airport",
        "Akhtar Colony",
        "Al Falah Society",
        "Al-Jadeed Residency",
        "Al-Manzar Society",
        "Alamgir Society",
        "Ali Garh Society",
        "Allama Iqbal Colony",
        "Allama Iqbal Town",
        "Altaf Hussain Road",
        "Amil Colony",
        "Amir Khusro",
        "Ancholi",
        "Anda Mor Road",
        "ASF Airport Residencia",
        "ASF Housing Scheme",
        "Ashraf Nagar",
        "Askari i",
        "Askari ii",
        "Askari iii",
        "Askari iv",
        "Askari v",
        "Awami Colony",
        "Azam Basti",
        "Azam Town",
        "Azeemabad",
        "Azizabad",
        "Baba Bhit",
        "Bagh-e-Korangi",
        "Baghdadi",
        "Bahadurabad",
        "Bahria Town Karachi",
        "Baldia Town",
        "Baloch Colony",
        "Baloch Goth",
        "Banaras Colony",
        "Bandhani Colony",
        "Bangladesh Colony",
        "Bath Island",
        "Beaumont Road",
        "Behar Colony",
        "Bhains Colony",
        "Bhiroo Goth",
        "Bhutta Village",
        "Bhutto Nagar",
        "Bilal Colony",
        "Bilal Town",
        "Bin Qasim Town",
        "Blue Bell Residency",
        "BMCHS",
        "Bolton Market",
        "Britto Road",
        "Buffer Zone 1",
        "Buffer Zone 2",
        "Burmi Colony",
        "Burns Road",
        "Cantt",
        "Catholic Colony",
        "Central Jacob Lines",
        "Chakiwara",
        "Chakra Goth",
        "Chanesar Goth",
        "Chapal Courtyard",
        "Chapal Uptown",
        "Chishti Nagar",
        "Circular Road",
        "City Court",
        "City Railway Station",
        "Civic Centre",
        "Civil Lines",
        "Clifton",
        "Club Road",
        "Comissioner Coop Housing Society",
        "Cosmopolitan Society",
        "Cotton Export Cooperative Housing Society",
        "Cutchi Memon Cooperative Housing Society",
        "Dak Khana",
        "Dalmia Cement Factory Road",
        "Darsano Chana",
        "Darussalam Coop Society",
        "Darya Abad",
        "Dastgir Colony",
        "Data Nagar",
        "Daud Colony",
        "Defence Garden",
        "Defence View Society",
        "Delhi Colony",
        "Delhi Mercentile Society",
        "Denso Hall",
        "DHA City Karachi",
        "DHA Phase 1",
        "DHA Phase 2",
        "DHA Phase 4",
        "DHA Phase 5",
        "DHA Phase 5",
        "DHA Phase 6",
        "DHA Phase 7",
        "DHA Phase 8",
        "Dhabeji",
        "Diamond City",
        "Dr Daud Pota Road",
        "Drigh Colony",
        "Dural Aman Society",
        "Erum Villas",
        "Essa Nagri",
        "Etawa Society",
        "Faisal Cantonment",
        "Falaknaz Dreams",
        "Falaknaz Dynasty",
        "Falaknaz Presidency",
        "Falcon Complex Faisal",
        "Falcon Complex New Malir",
        "Farhan Dream Land",
        "Farooq-e-Azam",
        "Fatima Jinnah Colony",
        "Fazaia Housing Scheme",
        "Federal B Area",
        "Firdos Colony",
        "Frere Town",
        "Friends Royal City",
        "Frontier Colony",
        "Gadap Town",
        "Gaghar",
        "Garden City",
        "Garden East",
        "Garden West",
        "Gazdarabad",
        "Ghani Chowrangi",
        "Gharibabad",
        "Gharo",
        "Ghazi Brohi Goth",
        "Ghaziabad",
        "Gillani Railway Station",
        "Gizri",
        "Gizri Road",
        "Gobal Town",
        "Godhra",
        "Goth Ibrahim Haidri",
        "Government Teachers Society",
        "Gujjar Chowk",
        "Gulbai",
        "Gulberg Town",
        "Gulistan-e-Jauhar Block 1",
        "Gulistan-e-Jauhar Block 10",
        "Gulistan-e-Jauhar Block 11",
        "Gulistan-e-Jauhar Block 12",
        "Gulistan-e-Jauhar Block 13",
        "Gulistan-e-Jauhar Block 14",
        "Gulistan-e-Jauhar Block 15",
        "Gulistan-e-Jauhar Block 16",
        "Gulistan-e-Jauhar Block 17",
        "Gulistan-e-Jauhar Block 18",
        "Gulistan-e-Jauhar Block 19",
        "Gulistan-e-Jauhar Block 2",
        "Gulistan-e-Jauhar Block 20",
        "Gulistan-e-Jauhar Block 3",
        "Gulistan-e-Jauhar Block 4",
        "Gulistan-e-Jauhar Block 5",
        "Gulistan-e-Jauhar Block 6",
        "Gulistan-e-Jauhar Block 7",
        "Gulistan-e-Jauhar Block 8",
        "Gulistan-e-Jauhar Block 9",
        "Gulshan_e_Ghazian",
        "Gulshan-e-Aisha",
        "Gulshan-e-Azeem",
        "Gulshan-E-Ghazi",
        "Gulshan-E-Hadeed",
        "Gulshan-E-Iqbal Block 1",
        "Gulshan-E-Iqbal Block 10",
        "Gulshan-E-Iqbal Block 11",
        "Gulshan-E-Iqbal Block 13",
        "Gulshan-E-Iqbal Block 2",
        "Gulshan-E-Iqbal Block 3",
        "Gulshan-E-Iqbal Block 4",
        "Gulshan-E-Iqbal Block 5",
        "Gulshan-E-Iqbal Block 6",
        "Gulshan-E-Iqbal Block 7",
        "Gulshan-E-Iqbal Block 8",
        "Gulshan-E-Iqbal Block 9",
        "Gulshan-e-Kaneez Fatima",
        "Gulshan-e-Malir",
        "Gulshan-e-Maymar",
        "Gulshan-e-Mehmood ul Haq",
        "Gulshan-e-Mehran",
        "Gulshan-e-Millat",
        "Gulshan-e-Rabia",
        "Gulshan-e-Saeed",
        "Gulshan-e-Shameem",
        "Gulshan-e-Tauheed",
        "Gulshan-e-Usman Housing Society",
        "Gulzar Colony",
        "Gulzar-E-Hijri",
        "Haidery",
        "Hamza Residency",
        "Hanifabad",
        "Haryana Colony",
        "Hasrat Mohani Colony",
        "Hawks Bay Scheme 42",
        "Hazara Colony",
        "Hill Park",
        "Hoshang Road",
        "Hub River Road",
        "Hussainabad",
        "I.I. Chundrigar Road",
        "Intelligence Colony",
        "Iqbal Baloch Colony",
        "Islam Nagar",
        "Islamia Colony",
        "Itahad Town",
        "Jafar-E-Tayyar",
        "Jahanabad",
        "Jamaluddin Afghani Road",
        "Jamshed Quarter",
        "Jamshed Quarters",
        "Jamshed Road",
        "Jamshed Town",
        "Javed Bahria Coopretive Housing Society",
        "Jinnah Avenue",
        "Jinnah Garden",
        "Jodhpur Society",
        "Jut Line",
        "Kala Board",
        "Kalyana",
        "Karachi Administration Employees Society",
        "Karachi Golf City",
        "Karachi Motorway",
        "Karimabad",
        "Kashmir Colony",
        "Kashmir Road",
        "KDA Employees Society - Korangi",
        "KDA Scheme 1",
        "Kehkashan",
        "Kemari Town",
        "Khada Memon Society",
        "Khalid Bin Walid Road",
        "Khaliq-uz-Zaman Road",
        "Khameeso Goth",
        "Khando Goth",
        "Kharadar",
        "Khawaja Ajmeer Nagri",
        "Khayaban-e-Ittehad Road",
        "Khokarapar",
        "Khudadad Colony",
        "Korangi",
        "Korangi Creek Cantonment",
        "Korangi Industrial Area",
        "Korangi Sector 33",
        "KPT Officers Society",
        "Lakhani Fantasia",
        "Lalukhet",
        "Landhi 1",
        "Landhi 2",
        "Landhi Colony",
        "Laraib Garden",
        "Liaquat Avenue",
        "Liaquatabad",
        "Light House",
        "Lucknow Society",
        "Lyari Expressway",
        "Lyari Town",
        "M.A. Jinnah Road",
        "Machar Colony",
        "Madina City Housing Scheme",
        "Madina Colony",
        "Madina Colony",
        "Mai Kolachi Bypass",
        "Malir",
        "Malir Cantonment",
        "Malir Halt",
        "Malir Housing Scheme 1",
        "Malir Link To Super Highway",
        "Mangopir",
        "Manzoor Colony",
        "Maqboolabad Society",
        "Maripur",
        "Maskan Chowrangi",
        "Mauripur Road",
        "Maymarabad",
        "Mehmoodabad",
        "Metrovil",
        "Metroville",
        "Millat Nagar/Islam Pura",
        "Mithadar",
        "Model Colony",
        "Model Colony - Malir",
        "Mohammad Nagar",
        "Moinabad",
        "Mominabad",
        "Moria Goth",
        "MT Khan Road",
        "Muhajir Camp",
        "Muhammad Bin Qasim Co-operative Housing Society",
        "Mujahid Colony",
        "Mujahidabad",
        "Murad Memon Goth",
        "Muslim Mujahid Colony",
        "Muslimabad",
        "Mustafa Taj Colony",
        "Mustufa Colony",
        "Muzaffarabad Colony",
        "Nanak Wara",
        "Nasir Colony",
        "Nasirabad",
        "Natha Khan Goth",
        "National Highway",
        "Naval Housing Scheme",
        "Navy Housing Scheme Karsaz",
        "Navy Housing Scheme Zamzama",
        "Nawabad",
        "Naya Nazimabad",
        "Nazimabad",
        "Neelam Colony",
        "New Karachi",
        "Nishtar Road (Lawrence Road)",
        "Nooriabad Industrial Area",
        "North Karachi",
        "North Karachi Buffer Zone",
        "North Nazimabad",
        "Northern Bypass",
        "Nusrat Bhutto Colony",
        "Old Clifton",
        "Old Golimar",
        "Old Haji Camp",
        "Old Queens Road",
        "Old Ravians Co-Operative Housing Society",
        "Orangi Town",
        "Others",
        "P & T Colony",
        "P.I.B. Colony",
        "PAF Housing Scheme",
        "Pahar Ganj",
        "Pak Colony",
        "Pak Ideal Cooperative Housing Society",
        "Pak Sadat Colony",
        "Pakistan Chowk",
        "Pakistan Quarters",
        "Paposh Nagar",
        "Park View Tower",
        "Parsi Colony",
        "Patel Para",
        "Pathan Colony",
        "PECHS",
        "Pechs I",
        "Pechs II",
        "Pehlwan Goth",
        "PIDC",
        "PTV Society",
        "Punjab Chowrangi",
        "Punjab Colony",
        "Qasba Colony",
        "Qasiambad",
        "Qayyumabad",
        "Quaidabad",
        "Rabia City",
        "Ragiwara",
        "Ranchore Line Bazar",
        "Rasheedabad",
        "Rashid Minhas Road",
        "Rehri",
        "Reta Plot",
        "Rifah Aam",
        "Rizvia Society",
        "Royal 8 Icon",
        "Royal Tower",
        "Rufi Lake Drive Apartments",
        "Rufi Rose Petals",
        "S.I.T.E",
        "Saadi Road",
        "Saadi Town",
        "Saddar",
        "Saddar Town",
        "Saeedabad",
        "Safoora Goth",
        "Saharanpur Cooperative Housing Society",
        "Saima Arabian Villas",
        "Saima Luxury Homes",
        "Sakhi Hasan",
        "Saudabad",
        "Scheme 33",
        "Scheme 45",
        "Sea View Apartments",
        "Seven Wonders City",
        "Shadman Town",
        "Shafeeque Mill Colony",
        "Shah Baig Line",
        "Shah Faisal Town",
        "Shah Latif Town",
        "Shah Nawaz Bhutto Colony",
        "Shah Rasool Colony",
        "Shah Town",
        "Shaheed-e-Millat Expressway",
        "Shahra-e-Faisal",
        "Shahra-e-Jahangir",
        "Shahra-e-Liaquat",
        "Shahra-e-Qaideen",
        "Shahra-e-Usman",
        "Shanti Nagar",
        "Sharifabad",
        "Sher Shah Suri Road",
        "Sherabad",
        "Shershah",
        "Shirafi Goth",
        "Sindh Industrial Trading Estate",
        "Singo Line",
        "Sir Syed",
        "SMCHS - Sindhi Muslim Society",
        "Soldier Bazar",
        "Stadium Road",
        "State Bank of Pakistan Staff Co-Operative Housing Society",
        "Steel Town",
        "Sultanabad",
        "Suparco Road",
        "Super Highway",
        "Surjani Town",
        "Tahir Villa",
        "Taiser Town",
        "Tariq Road",
        "Teachers Society",
        "Techno City",
        "Tipu Sultan Road",
        "University Road",
        "Yaseenabad",
        "Yousuf Goth",
        "Zaman Town",
        "Zamzama"
      ];

      foreach ($inputArray as $value) {
        CityArea::insertOnDuplicateKey(array (
            array (
                'name' => $value,
                'slug' => str_replace(" ", "-", strtolower($value)),
                'city_id' => 1
            )
        ));

      }

    }
}
