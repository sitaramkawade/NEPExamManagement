<?php

namespace Database\Seeders;

use App\Models\College;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   


        College::create([
            'college_name'=>'Sangamner Nagarpalika Arts, D.J. Malpani Commerce and B.N. Sarda Science College.(Autonomous)',
            'college_name_marathi'=>'संगमनेर नगरपालिका कला, दा.ज.मालपाणी वाणिज्य आणि ब.ना.सारडा विज्ञान महाविद्यालय ( स्वायत्त ), संगमनेर, जि.अहमदनगर',
            'college_address'=>'At post- Ghulewadi, Nashik Pune Highway, Sangamner , Ahmednagar,Maharashtra -422605',
            'principal_name'=>'I/C Principal Dr. Gaikwad Arun Hari\r\n',
            'college_website_url'=>'https://sangamnercollege.edu.in/',
            'college_contact_no'=>'02425 225893',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48',
            'is_default'=>1,
            'sanstha_id'=>1,
            'status'=>1

        ]);

        College::create([
            'college_name'=>'KJ Somaiya College of Arts Commerce and Science',
            'college_address'=>' Mohanirajnagar Tal. Kopargaon, Ahmednagar, Maharashtra, India.',
            'college_website_url'=>'www.kjscollege.edu.in',
            'college_email'=>'info@kjscollege.edu.in',
            'college_contact_no'=>'02425225893',
            'college_logo_path'=>'',
            'university_id'=>1,
            'status'=>'1',          
            'is_default'=>0, 
            'sanstha_id'=>1,         

        ]);

        College::create([
            'college_name'=>'Padmashri Vikhe Patil College of Arts Science and Commerce',
            'college_address'=>'Pravaranagar Tal-Rahata District, Ahmednagar, Maharashtra.',
            'college_website_url'=>'www.pvpcollege.edu.in',
            'college_email'=>'info@pvpcollege.edu.in',
            'college_contact_no'=>'02425225893',
            'college_logo_path'=>'',
            'university_id'=>1,
            'status'=>'1',          
            'is_default'=>0, 
            'sanstha_id'=>1,              
        ]);


            College::create( [
            
            'college_name'=>' Agasti Arts, Commerce And Dadasaheb Rupwate Science College Tal - Akole, Dist - Ahmednagar,',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Adv. M.N. Deshmukh Arts, Com. And Science  College, Rajur',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Agasti Arts Commerce And Dadasaheb Rupwate Science College Akole',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Ahmednagar College,  Ahmednagar ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Annasaheb Waghire Arts, Science & Commerce College, Otur-412409',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Arts, Commerce & Science College Satral  Tal- Rahata',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Arts, Commerce and Science College Kalwan (Manur)',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Arts, Science & Commerce College, Rajur-422604',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Arts,Commerce& Science College, Narayangaon',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Asso. Prof. Department of English, G.T. Patil College, Nandurbar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'B.R. Gholap College, Sangvi, Pune. ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Bhartiya Mahavidyala,Amravati',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Bytco College , Nashik ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'C. D. Jain College of Commerce, Shrirampur ,Dist.Ahmednagar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'C.A.S.S., S.P.P.U. Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'CMCS College, Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'College of Agriculture Business Management,Gunjalwadi Pathar,Sangamner',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'College of Agriculture Sonai, Sonai-Rahuri Road, Prashantnagar, Sonai, Maharashtra, 414105. ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'College of Agriculture, Loni,Tal-Rahata Dist-Ahmednagar,413736',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'College of Agriculture,Maldad,Tal Sangamner, Dist Ahmednagar,422608',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'D.B. N. P. Arts, S.S.S.G. Commerce and S.S. A. M. Science College, Lonaval, Dist - Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'D.B.F. Dayanand College of Arts & Science, Solapur',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Dang Seva Mandal\'s Arts College, Abhone, Tal - Kalwan, Dist - Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Deogiri College Aurangabad',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Department of English, Davangere University, Davangere, Karnataka',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Department of Zoology, Ahmednagar College, Ahmednagar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Global Institute of Management, Sangamner.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'GMD Arts, BW Commerce and Science College, Sinnar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Hon. B.J.Arts, Commerce and Science college, Ale, Tal.Junnar Dist. Pune 412411',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Hotel Suyog Dhandarphal Bk. Sangamner',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'HPT Arts and RYK Science College Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Indira College Of Commerce And Science,Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Jede College,Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'K.A.A.N.M.S.Arts, Commerce and Science College , Satana, Tal:-Baglan Dist:Nashik ,',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'K.J.Somaiya College Kopergoan, Tal.Kopergoan ,Dist - Ahmednagar,',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Karmaveer Shantarambapu Kondaji Wavare Arts, Science & Commerce College, CIDCO, Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Kohinoor College of Arts, Commerce & Science, Khultabad, Aurangabad, MH',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'KTHM College Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'L.V.H. College, Panchvati, Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Late Abasaheb Kakade Arts College, Bodhegaon, Tal-Shevgaon, Dist-Ahmednagar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Late BRD Arts and Commerce Mahila Mahavidyalaya, Nashik Road, Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Livestock Management and Dairy Production, Gunjalwadi, Pathar, Sangamner',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Loknete Ramdas Patil Dhumal Arts, Science and Commerce College, Rahuri.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'M.S.G. Arts, Science & Commerce College, Malegaon, Dist. Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Maharaja Sayajrao Gaikwad College,Malegaon',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Mahatma Phule Mahavidyalaya Pimpri, Pune. ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'MGV Arts, Science and Commerce College, Manmad, Dist- Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Modern college\nShivajinagar,Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Modern College,Parvati,Pune9',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Modern College,Shivajinagar,Pune-5',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'MVP\'s Art, Commerce and Scence College, Vadner Bhairav.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'MVP\'s G.M.D. Arts, B.W. Commerce and Science College, Sinnar-422103',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'N.V.P. Mandal\'s Art\'s, Commerce and Science College, Lasalgaon.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Ness Wadiya College Pune ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'New Art\'s Commerce and Science College, Shegaon',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'New Arts, Comm. & Science College, Parner Tal. Parner Dist. Ahmednagar.  ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'New Arts, Commerce & Science College, Ahmednagar.  ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'New Arts, Commerce and Science College, Ahmednagar ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'New Arts, Commerce and Science College, Ahmednagar ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Nutan Vidya Prakas Mandal\'s Art Commerce and Science College Lasalgaon Tal Niphad Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'P.D.E. A. Annasaheb Waghire Arts, Commerce & Science College, Otur, Tal. Jaunnar Dist. Pune ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'P.V.P. COLLEGE OF ARTS SCIENCE & COMMERCE PRAVARANAGAR',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Parner College, Parner ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'PDEA\'S Anantrao awar College, Pirangut,Dist.Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Pemraj Sarda College, Ahmednagar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'PG Research Centre, M.J.College, Jalgaon',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'PIRENS Institute of Business Management and Administration, Loni Bk.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Pratap College, Amalner ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Pratishthan Mahavidyalaya,  Paithan\n',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Prof. Ramakrishna More Art\'s, Commerce and Science College, Akurdi .',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Professor, Department of English, Dr Babasaheb Ambedkar Marathwada University',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'R.B.N.B College Shrirampur ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'R.N.Chandak Arts,  J.D. Bytco Comm. & N.S. Chandak Science College, Nashik. ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Rajarshi Shahu Mahavidyalaya., Deolali Pravara ,Tal.Rahuri ,Dist.Ahmednagar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Ramkrushna More College Akurdi, Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Ramnarain Ruia Arts and Science Autonomous College, Matunga, Mumbai',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'S.M.B.S.T College of Arts, Science and Commerce, Sangamner',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'S.N.G.Institute of Management & Research',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'S.P. College ,Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'S.P.Sansthas College Of Education',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Samarth college of computer science, Belhe',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Savitribai Phule Pune University, Pune ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Sayyad Foods Pvt.Ltd Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Shirdi Sai Rural Institute\'s ARTS, SCIENCE AND COMMERCE COLLEGE',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Shivaji University, Kolhapur',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Sir Parshurambhau College,pune ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Smt S. K. Gandhi Arts, Amolak Sciecne & P. H. Gandhi Commerce College Kada',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'SNJB\'s K.K.H.A. Arts, S.M.G.L. Commerce & S.P.H.J. Science College, Neminagar, Chandwad.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Sonopant Dandekar Arts, V. S. Apte Commerce and M. H. Mehta Science College, Palghar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'SSGM College Kopargaon',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Sunrise Trips Pvt. Ltd, Sangamner ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'T. C. College, Baramati',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Waghire College,Saswad.',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Women\'s College of Home Science and BCA, Loni',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>' Arts Commerce and Science college, Ashwi kd Sangamner ',
            'college_address'=>NULL,
            'principal_name'=>NULL,
            'college_website_url'=>NULL,
            'college_contact_no'=>NULL,
            'created_at'=>NULL,
            'updated_at'=>NULL
            ] );

            College::create( [
            
            'college_name'=>'S.M. Joshi College, Hadapsar, Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'TUMKUR UNIVERSITY',
            'college_address'=>'TUMKUR UNIVERSITY.TUMKURU',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Amritvahini College of Engineering, Sangamner',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Mula Education Society\'s Shri Dnyaneshwar College, Sonai',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Mahafeed Speciality Fertilizers, Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Shiv Chhatrapati College, Junnar, Tal. Junnar, Dist. Pune ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Annasaheb Waghire College, Otur, Tal Junnar, Dist. Pune ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Lal Bahadur Shastri college of Arts, Science and Commerce, Satara ',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'MES Abasaheb Garware College, Pune',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Nutan Art\'s, Com. & Sci. College Rajapur, Tal - Sangamner',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Karmveer Kakasaheb Wagh Arts, Science and Commerce College, Pimpalgaon B.Tal.Niphad.Dist. Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'K. K. Wagh Institute of Engineering Education & Research, Nashik.\r\nHirabai Haridas Vidyanagari, Amrutdham, Panchavati, Nashik – 422003',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Akole Taluka Education Society\'s Technical Campus,  Akole',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Abhinav Education Society\'s Institute of Management and Busines Administration,  Akole',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Ashoka Center for Business and Computer Studies, Nashik',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Ramesh Firodiya College of Arts, Commerce and Science, Sakur, Tal: Sangamner, Dist: Ahmednagar',
            'college_address'=>'',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Institute of Industrial Computer Management and Research Centre, Nigdi, Pune',
            'college_address'=>'Nigdi, Pune',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );

            College::create( [
            
            'college_name'=>'Arts, Science and Commerce College Kolhar, Taluka- Rahata, Ahmednagar',
            'college_address'=>'Kolhar, Taluka- Rahata, Ahmednagar',
            'principal_name'=>'',
            'college_website_url'=>'',
            'college_contact_no'=>'',
            'created_at'=>'2021-12-24 12:56:24',
            'updated_at'=>'2021-12-27 14:47:48'
            ] );
    }
}
