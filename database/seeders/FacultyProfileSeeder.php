<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\College;
use App\Models\Faculty;
use App\Models\Department;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Gendermaster;
use App\Models\Banknamemaster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacultyProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::create( [
            'id'=>1,
            'faculty_name'=>'Principal Dr. Gaikwad Arun Hari',
            'email'=>'ahgaikwad@sangamnercollege.edu.in',
            'mobile_no'=>'9822811761',
            'email_verified_at'=>'2024-02-06 11:08:47',
            'password'=>'$2y$12$J03ADkjHmivADda5tiQ2KOKhGNosurfNX4GpHMMYvohesk6JaYwwy',
            'remember_token'=>'wV8rSJqLWPKlR8iahPUznhTQ9imq2N0dygSLINSVeo5PC7zElIRy49anV118',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196505923',
            'qualification'=>'M.Com., D.C.F.A., M.Phil., Ph.D.',
            'role_id'=>7,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 07:35:48',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 07:35:48'
            ] );

            Faculty::create( [
            'id'=>2,
            'faculty_name'=>'Ms. Malusare Lalita Babulal',
            'email'=>'malusare@sangamnercollege.edu.in',
            'mobile_no'=>'9766220929',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$9APoBJMTWE0qupu4A8.FMuZqb/tNEbhfQgBtaWNi19qv1AJzZay52',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198306954',
            'qualification'=>'M.Com., NET, SET, GDC&A',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 07:28:31',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 07:28:31'
            ] );

            Faculty::create( [
            'id'=>3,
            'faculty_name'=>'Dr. Panjabi Harjeet Brijmohan',
            'email'=>'hbpanjabi@sangamnercollege.edu.in',
            'mobile_no'=>'7972622253',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$c9LuPm5VmGmm5LfWpg.8l.3QF2a2uxlMBbdV7nHSckaXxVZLd1bzm',
            'remember_token'=>'w1hGxzA3ifWri5BOIRZwkBCGMvMT3pIuvlB1ArpjrH7MY70hEzAx2lx3gTmT',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690434',
            'qualification'=>'M.Com., M.Phil., NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 07:39:41',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 07:39:41'
            ] );

            Faculty::create( [
            'id'=>4,
            'faculty_name'=>'Mr. Wadghule Sandip Ganpat',
            'email'=>'sandipwadghule@sangamnercollege.edu.in',
            'mobile_no'=>'7208235882',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$HOccuDhaiHPhbAcbUj3PzOtVgh2BVmuUhoLpSHiLqcJU4fOQVay2G',
            'remember_token'=>'A4860uI9kaT7cOtBrLVtZbw9kGkhS9s5cyRK31qM8VCEVbShHkr9XdfL5mto',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201898532',
            'qualification'=>'M.Com., ICWA (CMA), SET, NET',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-19 07:48:44',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-19 07:48:44'
            ] );

            Faculty::create( [
            'id'=>5,
            'faculty_name'=>'Dr. Mendhkar Valmik Ashok',
            'email'=>'vamendhkar@sangamnercollege.edu.in',
            'mobile_no'=>'9822038727',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$YaEXuAntckG3.5N1IOjpGO7Ry0LcegGzXTNe0U5xZKHjT6foTDKva',
            'remember_token'=>'kbtisdWgidvc2S0zoFEPaJxO4Wk0gwWufCeNr9AodZkwPamBTM2OmmgClL8P',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201482484',
            'qualification'=>'M.Com., M.Phil., Ph.D., GDC&A',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-11-30 14:49:26',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-11-30 14:49:26'
            ] );

            Faculty::create( [
            'id'=>6,
            'faculty_name'=>'Ms. Tare Hemlata Ashok',
            'email'=>'tare@sangamnercollege.edu.in',
            'mobile_no'=>'8605699887',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$GlerTEeiEeDY7phLwz1MPOz189f0lDwEm69hMFBU9uk7amLOk4u1C',
            'remember_token'=>'2oFWDmVaJEbw62pnS49fPmC3A8MPxZadCvE0ECCHDAjLEQ4LRlXiDAGQvmUT',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690415',
            'qualification'=>'M.Com., SET',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-29 07:16:43',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-29 07:16:43'
            ] );

            Faculty::create( [
            'id'=>7,
            'faculty_name'=>'Ms. Perane Sarika Balasaheb',
            'email'=>'sbperane@sangamnercollege.edu.in',
            'mobile_no'=>'9970191971',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Im/G4P4wRRlsdLxxb1ae2eXvZ1YXEahhati5WwYJJxHUzzCSxUcjO',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690374',
            'qualification'=>'M.Com., SET',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-07-30 10:52:52',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-07-30 10:52:52'
            ] );

            Faculty::create( [
            'id'=>8,
            'faculty_name'=>'Mr. Gosavi Anil Gorakshanath',
            'email'=>'anilgosavi@sangamnercollege.edu.in',
            'mobile_no'=>'9623900635',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4ij.7xGRVnk8Gg16fu4vCO8M.7w3vGVtVqix9L3/xGhz6luHQcBEq',
            'remember_token'=>'7g1NZBpAVw11ZK6GAjFQGHcNCmHekpc5mIOxTisAJskwWVsB7LHanUVdBLYR',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795350',
            'qualification'=>'M.Com., M.Phil., SET, NET',
            'role_id'=>8,
            'department_id'=>26,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 10:31:28',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 10:31:28'
            ] );

            Faculty::create( [
            'id'=>9,
            'faculty_name'=>'Mr. Shinde Ganesh Dattu',
            'email'=>'gdshinde@sangamnercollege.edu.in',
            'mobile_no'=>'8380840830',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$vLO1C7OUH1gLEpuRk78PseNI8MTdcYdWe3UtC21uVD9mOss44rMrG',
            'remember_token'=>'eR3VRMT4ttAJJ4Fx96TKYv7W2U6zMILNBOgZAhiRxEuux1Yj2q2RBypcAyIc',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795726',
            'qualification'=>'M.Com., SET',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-20 13:20:12',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-20 13:20:12'
            ] );

            Faculty::create( [
            'id'=>10,
            'faculty_name'=>'Mr. Sahane Gokul Balchand',
            'email'=>'gbsahane@sangamnercollege.edu.in',
            'mobile_no'=>'9921024641',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$pOCls/HZB0EzMlml8ucXn.ooMR7x81W6qpLTZXxc39nP4VJhBxRgm',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800703',
            'qualification'=>'M.Com., SET',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-08-08 06:15:12',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-08-08 06:15:12'
            ] );

            Faculty::create( [
            'id'=>11,
            'faculty_name'=>'Mr. Lende Sahaji Shantaram',
            'email'=>'sslende@sangamnercollege.edu.in',
            'mobile_no'=>'7057514809',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Bf6LGIbur0nH2wwgFs1HEe5p4MmWWy7XRqnRjjZ4/KosxqA3r8EP6',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690590',
            'qualification'=>'M.Com., SET',
            'role_id'=>8,
            'department_id'=>26,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-26 09:41:05',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-26 09:41:05'
            ] );

            Faculty::create( [
            'id'=>12,
            'faculty_name'=>'Mrs. Navale Dhanvantari Vishvasrao',
            'email'=>'dhanvantari@sangamnercollege.edu.in',
            'mobile_no'=>'7218267203',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$wBbfM3MfmKEzQx0xpAYIkOeaH9fDYjIxHbJ86erkkMH9UGQSsQyWi',
            'remember_token'=>'4Hfncqpuh1wacAGgPrDh28M6jcfFlUHJTjnXeWvIf7Ubm4whYAFJE9qE8OZ1',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52112000016',
            'qualification'=>'M.Com., SET, GDC&A',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 08:48:51',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 08:48:51'
            ] );

            Faculty::create( [
            'id'=>13,
            'faculty_name'=>'Mr. Nagare Ramesh Bhaupatil',
            'email'=>'rbnagare@sangamnercollege.edu.in',
            'mobile_no'=>'7387782088',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Pu53X00VF78D/JCIpnEozOOFd427HEW89HgHnzTEQCNUwYH.aUdIm',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795182',
            'qualification'=>'M.Com., MCM, M.Phil, GDC&A, NET,SET ',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 15:36:47',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 15:36:47'
            ] );

            Faculty::create( [
            'id'=>14,
            'faculty_name'=>'Mr. Tribhuwan Raju Bhimraj',
            'email'=>'tribhuvan@sangamnercollege.edu.in',
            'mobile_no'=>'9890424181',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$nbTIBmgCb4NRF88THs5z5OstUOVKmHBn8rrXgMTua4x8PkI9yMt0u',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201691174',
            'qualification'=>'M.Com. M.Phil, GDC& A',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-17 04:22:25',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-17 04:22:25'
            ] );

            Faculty::create( [
            'id'=>15,
            'faculty_name'=>'Mr. Ratne Ravindra Kailas',
            'email'=>'ratne@sangamnercollege.edu.in',
            'mobile_no'=>'9765282834',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$TZbXSWCijPwKRYstkF5ktuWS7aUGs/nk1lumLX1baoqGORaQpGZSu',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201585797',
            'qualification'=>'M.Com. M.Phil, GDC& A',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 10:38:33',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 10:38:33'
            ] );

            Faculty::create( [
            'id'=>16,
            'faculty_name'=>'Ms. Kadale Nirmala Mohan',
            'email'=>'nirmala@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Com., GDC&A, Diploma in Air ',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>17,
            'faculty_name'=>'Mr. Kanawade Sachin Bhaskar',
            'email'=>'kanawadesachin@sangamnercollege.edu.in',
            'mobile_no'=>'8806597567',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$SZgF6AFI3nxEjkFwhCeJruQfAnw39XAwwg.xWQFOaqevydrqRt5W2',
            'remember_token'=>'JDK0HcZqyJcfO8iOkXxOJ98tTx70buqnnS8KYGtL7DQUWcNanlDdUb1X8UgI',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Com',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-29 06:46:41',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-29 06:46:41'
            ] );

            Faculty::create( [
            'id'=>18,
            'faculty_name'=>'Mrs. Unawane Tejal Mangesh',
            'email'=>'unawane@sangamnercollege.edu.in',
            'mobile_no'=>'8793014672',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$RIW4/iF2OHPxx.7G3iYxYedPFL.5ufsbhMV2lteFyKHVWRB/1IRIy',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801317',
            'qualification'=>'B.E.(Computers), MBA (HR)',
            'role_id'=>8,
            'department_id'=>11,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 06:39:48',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 06:39:48'
            ] );

            Faculty::create( [
            'id'=>19,
            'faculty_name'=>'Mr. Pawar Sandip Tarachand',
            'email'=>'sandippawar@sangamnercollege.edu.in',
            'mobile_no'=>'9604090977',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$MvJL5nGI2QWp3SGn3zo5xuHKcF3QZZvEW2Xm9RGb53wJKFtFApSvW',
            'remember_token'=>'cqVDYN6f6BCRLTD1V3EPgDGkpPbUfxoAmJN34zDeNf7DBR0lNobKKJJ3W236',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801224',
            'qualification'=>'M.Com. NET, SET',
            'role_id'=>8,
            'department_id'=>26,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-24 15:55:53',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-24 15:55:53'
            ] );

            Faculty::create( [
            'id'=>20,
            'faculty_name'=>'Mr. Kasar Amol Rewalnath',
            'email'=>'amolkasar@sangamnercollege.edu.in',
            'mobile_no'=>'9623258613',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$bpdMsB9HGWkyOYazkTk7Au6wQpCzDp/ufpORvmnP0rLZ2uMmE77zS',
            'remember_token'=>'0cYVyuQLducv5ijBXUpcKur3CoR4mZoaiXhnahCKud58Ie6qJweiJSfjiKak',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201899823',
            'qualification'=>'M.Com.NET, SET. ',
            'role_id'=>8,
            'department_id'=>26,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-13 06:27:18',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-13 06:27:18'
            ] );

            Faculty::create( [
            'id'=>21,
            'faculty_name'=>'Dr. Limbekar Ashok Shankarrao',
            'email'=>'limbekar@sangamnercollege.edu.in',
            'mobile_no'=>'9326891567',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$6rtFAgy.DFSDxMUUvAHXb.t1L5637Y1j2xUwfECokatfk9iSa.El6',
            'remember_token'=>'LqPkgAg0PBH83UI43PkFQfveiG9K8gScGWeYouEHlaFor6YNMl4VfwipyD0J',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197305949',
            'qualification'=>'M.A., NET, Ph.D.',
            'role_id'=>14,
            'department_id'=>12,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 09:00:21',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 09:00:21'
            ] );

            Faculty::create( [
            'id'=>22,
            'faculty_name'=>'Dr. Hande Rahul Rajaram',
            'email'=>'hande@sangamnercollege.edu.in',
            'mobile_no'=>'9423785097',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$dfnQOdrjYAFneyuymWnlVONUPtW8Q.qrLcQ3C4Ym2USMyTk8NsArO',
            'remember_token'=>'3Wszy3SGtjPxZRr4uLUzga0u0v7PvaYT4gExhQ81aS4oqsudelEPX2JOFRhQ',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197705930',
            'qualification'=>'M.A., NET, Ph.D.',
            'role_id'=>13,
            'department_id'=>12,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-27 05:34:16',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-27 05:34:16'
            ] );

            Faculty::create( [
            'id'=>23,
            'faculty_name'=>'Dr. Gharule Balaji Babruvan',
            'email'=>'gharule@sangamnercollege.edu.in',
            'mobile_no'=>'7588062701',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$wYYHVAnz/7mxfbKMineXZ.vTIW9G8D2Y8zZxf4jUFkD637Z1NDfU6',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197605928',
            'qualification'=>'M.A., SET, NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>12,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-16 02:21:33',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-16 02:21:33'
            ] );

            Faculty::create( [
            'id'=>24,
            'faculty_name'=>'Dr. Thorat Sharad Nagnath',
            'email'=>'sharadthorat@sangamnercollege.edu.in',
            'mobile_no'=>'7757885476',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$bNp4MdG0J7agXjvV5pCTGuYX/9OpujPBnxm4/sRGUcx8uOA0lHdvy',
            'remember_token'=>'XeojTslxzRflDEitwu52XbEgNLGdj8dPBhv0EGTDzJyYgZFbWhtiYaYwg9ps',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690155',
            'qualification'=>'M.A., M.Phil., Ph.D., NET',
            'role_id'=>8,
            'department_id'=>12,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 13:21:21',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 13:21:21'
            ] );

            Faculty::create( [
            'id'=>25,
            'faculty_name'=>'Dr. Chavan Sunil Dashrath',
            'email'=>'sdchavan@sangamnercollege.edu.in',
            'mobile_no'=>'9881644682',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$TcMgcktnKrJKguHFlkK2M.yvlOacbX8WrZmOWBkbxAoqEtt5iwSZ2',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197102238',
            'qualification'=>'M.A., Ph.D.',
            'role_id'=>9,
            'department_id'=>13,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 05:52:11',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 05:52:11'
            ] );

            Faculty::create( [
            'id'=>26,
            'faculty_name'=>'Dr. Patil Jitendra Pitambar',
            'email'=>'jppatil@sangamnercollege.edu.in',
            'mobile_no'=>'9860286123',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n.KxE71eo2BAfdnxvEHAgePbDtOCoYNm3p7Hq0rwnKIeHUZbq1lLS',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197405992',
            'qualification'=>'M.A., M.Ed., Ph.D.',
            'role_id'=>8,
            'department_id'=>13,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-27 10:23:28',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-27 10:23:28'
            ] );

            Faculty::create( [
            'id'=>27,
            'faculty_name'=>'Dr. Kadam Sachin Sudam',
            'email'=>'sskadam@sangamnercollege.edu.in',
            'mobile_no'=>'9404051942',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ANDP6MKvm77roFamcWlJO.WyciQgw6FEEI.p/.yj3TdgVJzYDoyE2',
            'remember_token'=>'Bs0sbiZRbOmYuveyAGJaGCOEjog1a1sM8bRHQJpWEDG7XeetCPzmhuqKcdcO',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198105982',
            'qualification'=>'M.A., M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>13,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-21 12:47:50',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-21 12:47:50'
            ] );

            Faculty::create( [
            'id'=>28,
            'faculty_name'=>'Dr.  Shirole Sharad Kacheshwar',
            'email'=>'skshirole@sangamnercollege.edu.in',
            'mobile_no'=>'9011544472',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$bHh6vj174rxncDBwCdNgXuUXRFRo7N6y8AD/RP96QHY5seP4D91ri',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800711',
            'qualification'=>'M.A., SET, NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>13,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 05:35:45',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 05:35:45'
            ] );

            Faculty::create( [
            'id'=>29,
            'faculty_name'=>'Dr.  Kendre Pravin Manmath',
            'email'=>'pmkendre@sangamnercollege.edu.in',
            'mobile_no'=>'9822254004',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$1sKfTEmTNqLJnce00xJtaeaxOc2pzSRXV48Q4k9Qz5n9EjUZJq2ci',
            'remember_token'=>'fTe0yZ2ax3TX37ori348E83dWEik9j3pZHx8oKMLgssW1IAT91AJKxtUc16X',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201691046',
            'qualification'=>'M.A.,B.Ed., Ph.D., NET',
            'role_id'=>8,
            'department_id'=>13,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-19 02:47:04',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-19 02:47:04'
            ] );

            Faculty::create( [
            'id'=>30,
            'faculty_name'=>'Vice Principal Dr. Tasildar Ravindra Baburao',
            'email'=>'tasildar@sangamnercollege.edu.in',
            'mobile_no'=>'9850264499',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$tm/SU9fRL3HwHxxcmpuTJeNNB1WCxKFJGn8HrsYqkHNIVJvdzja1O',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197305947',
            'qualification'=>'M.A., SET, Ph.D.',
            'role_id'=>14,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-03 04:40:49',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-03 04:40:49'
            ] );

            Faculty::create( [
            'id'=>31,
            'faculty_name'=>'Mr. Lele Arun Narayan',
            'email'=>'lele@sangamnercollege.edu.in',
            'mobile_no'=>'9850216151',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ccXG13fd1rTPHxvxG7Gn5ulxmza1w.bEILXPfIWVgOK8sbqwUiIN.',
            'remember_token'=>'yAYquIeI4EX2pKQYznG6Yx6RX3uDpVVGNHQrozWqN1kPQIrSyKpaCA7m10HI',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196405948',
            'qualification'=>'M.A.',
            'role_id'=>11,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-23 07:16:16',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-23 07:16:16'
            ] );

            Faculty::create( [
            'id'=>32,
            'faculty_name'=>'Dr. Jagadale Umesh Shivaram',
            'email'=>'jagadale@sangamnercollege.edu.in',
            'mobile_no'=>'9689299812',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$y2XCe1elFKNMoR81PKugaOkXVTGRU/duDqNwv65f0Ejzc9QPxteEG',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197105932',
            'qualification'=>'M.A., SET., Ph.D.',
            'role_id'=>13,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-20 16:27:16',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-20 16:27:16'
            ] );

            Faculty::create( [
            'id'=>33,
            'faculty_name'=>'Dr. Ghodke Digambar Maruti',
            'email'=>'dmghodke@sangamnercollege.edu.in',
            'mobile_no'=>'9028981407',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$jdDzgf/zXZtuw0XihTv40OTvP8XhW3a2ylrU6Xs3ADCYToeEvcAlO',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197805986',
            'qualification'=>'M.A. (English), SET, MA (Linguistics), NET, B.Ed., Ph.D.',
            'role_id'=>8,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 08:32:16',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 08:32:16'
            ] );

            Faculty::create( [
            'id'=>34,
            'faculty_name'=>'Ms. Chitalkar Muktabai Dagadu',
            'email'=>'mdchitalkar@gmail.com',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584494',
            'qualification'=>'M.A., SET',
            'role_id'=>8,
            'department_id'=>14,
            'college_id'=>97,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>35,
            'faculty_name'=>'Mr. Jadhav Rajendra Dnyandeo',
            'email'=>'rdjadhav@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52111900184',
            'qualification'=>'M.A., B.Ed.',
            'role_id'=>8,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>36,
            'faculty_name'=>'Mr. Varpe Nitin Annasaheb',
            'email'=>'navarpe@sangamnercollege.edu.in',
            'mobile_no'=>'9604945908',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4mdyHSsFO8cz7j1mtU0jJOBvqoTAthh44up9MkuK.LQdiUFPFBDfW',
            'remember_token'=>'YRym91i87M4K5O65JJlpio8z8HV1samqcgP28cG56xkV57YWWo3TDinFLdnk',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52111900203',
            'qualification'=>'M.A.',
            'role_id'=>8,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 04:53:00',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 04:53:00'
            ] );

            Faculty::create( [
            'id'=>37,
            'faculty_name'=>'Ms. Shaikh Parvin Mahammad',
            'email'=>'parvinshaikh@sangamnercollege.edu.in',
            'mobile_no'=>'8379980015',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$OTSJlLjzRgcb66c6pZWk8Ok.FxHHKKTt.RqNhA0/.m00RN95Qm8ny',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52042100155',
            'qualification'=>'M.A., B.Ed.',
            'role_id'=>8,
            'department_id'=>14,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-18 13:10:30',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-18 13:10:30'
            ] );

            Faculty::create( [
            'id'=>38,
            'faculty_name'=>'Dr. Mandlik Aniruddha Ashokrao',
            'email'=>'aamandlik@sangamnercollege.edu.in',
            'mobile_no'=>'9422740189',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$6ZJGAZrWqcczp.oSU5DSR.w/rBwguc4p0OvSImkqmXpfAHid7pb6C',
            'remember_token'=>'JyPYJkLpIzv72uz1NhCtE1nDpK7y7g2poGttUhGUj32CXegQO1vSpRhJtmZ0',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584162',
            'qualification'=>'M.A., SET., Ph.D.',
            'role_id'=>9,
            'department_id'=>20,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 09:57:22',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 09:57:22'
            ] );

            Faculty::create( [
            'id'=>39,
            'faculty_name'=>'Mr. Bhagat Roshan Khandu',
            'email'=>'roshanbhagat@sangamnercollege.edu.in',
            'mobile_no'=>'8855931737',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$xKHXHmT3cArN0Hs2egPOGuue8dVTMe8gxK13npfsBXpFDZBTXLBma',
            'remember_token'=>'u89AieSh2AGBtpTyA214mQq72y8IksThHoaokDOhmnQJmx8OF40S22xE0opH',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52011900029',
            'qualification'=>'M.A.(Sanskrit, Indology), B.Ed., SET,NET-JRF ',
            'role_id'=>8,
            'department_id'=>20,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 08:39:36',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 08:39:36'
            ] );

            Faculty::create( [
            'id'=>40,
            'faculty_name'=>'Dr. Bangar Shashikant Navnath',
            'email'=>'snbangar@sangamnercollege.edu.in',
            'mobile_no'=>'7774851176',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$lVkR6LBD4tm84Gfh1FzaW.9rI7j/M.7bqKDBAn09ECummH1D7gnZG',
            'remember_token'=>'XM0p7f0k84baeEHaAOhcAIrRT5KzTtZlKhAsc11DPPOgni9ndxZCuKh9jW69',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690573',
            'qualification'=>'M.A., SET., Ph.D.',
            'role_id'=>8,
            'department_id'=>20,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-09 04:18:52',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-09 04:18:52'
            ] );

            Faculty::create( [
            'id'=>41,
            'faculty_name'=>'Mr. Bhor Vijay Rohidas',
            'email'=>'vrbhor@sangamnercollege.edu.in',
            'mobile_no'=>'9423600003',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Y1slXrH8R8T6vMlNaLhICe6/apF32TXQFJI/2bKgAq8SUh6kTOSvW',
            'remember_token'=>'Svc4KMBXO0X75fa2XnvyYdgyJX5ZgJC3myklH4j42JNpg63xdJEAFl7tQ7OG',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801222',
            'qualification'=>'M.A. (Sanskrit, Marathi)',
            'role_id'=>8,
            'department_id'=>20,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-03 05:51:03',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-03 05:51:03'
            ] );

            Faculty::create( [
            'id'=>42,
            'faculty_name'=>'Dr. Sabale Namdeo Sonu',
            'email'=>'sabale@sangamnercollege.edu.in',
            'mobile_no'=>'9307855488',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$xuDldpumnN6TDTeO1JiWD.BnBUtZBVtZOi0ehRj0/QvF3fLLc/hNO',
            'remember_token'=>'J12klppgSbKuaPCyI9VPOoh33ZCbCKfGOfoxpGvtYezx2K4MTyUzXBuMYA47',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196305945',
            'qualification'=>'M.A., B.Ed., M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-05-18 04:57:41',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-05-18 04:57:41'
            ] );

            Faculty::create( [
            'id'=>43,
            'faculty_name'=>'Dr. Sanap Gorakshnath Kacharu',
            'email'=>'gksanap@sangamnercollege.edu.in',
            'mobile_no'=>'9881748880',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ilIcYa0mtqx.bOn/5zKnQeoHMw4TZjtXlLMte.ayQKRmAGMLJz0mC',
            'remember_token'=>'rjlItwmGWLW3hyGo1Kmyn1PAwWZePRCWzYGdSekaZEn1NEhoIisHGzj7Tvaz',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197301855',
            'qualification'=>'M.A., B.Ed., SET, Ph.D.',
            'role_id'=>12,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-26 03:51:17',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-26 03:51:17'
            ] );

            Faculty::create( [
            'id'=>44,
            'faculty_name'=>'Dr. Shingade Bapusaheb Nivrutti',
            'email'=>'shingade@sangamnercollege.edu.in',
            'mobile_no'=>'9552916479',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$J0HzD5vJtXuxVFVrTJo7d.O7DL5WoxGxKYLpRu0kZGZDwcyikWr9O',
            'remember_token'=>'0S7UsgzjiuHmJqPjDoMSJ5ab6wR3NiLvWaYIZEt81qCwHvyEhBOF2UIBfWb5',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197903447',
            'qualification'=>'M.A., SET., Ph.D.',
            'role_id'=>11,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-12 08:27:40',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-12 08:27:40'
            ] );

            Faculty::create( [
            'id'=>45,
            'faculty_name'=>'Dr. Jadhav Kailas Dilip',
            'email'=>'kdjadhav@sangamnercollege.edu.in',
            'mobile_no'=>'9689436870',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$aikTuLKkEd5EdV7RCNUxhezSunPL0LMyndF635utevq51b9GB/REy',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198505995',
            'qualification'=>'M.A., B.Ed., NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-20 11:32:08',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-20 11:32:08'
            ] );

            Faculty::create( [
            'id'=>46,
            'faculty_name'=>'Dr. Phalphale Pratap Jagannath',
            'email'=>'phalphale@sangamnercollege.edu.in',
            'mobile_no'=>'9422326349',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4WGbtq2Ao9srqbZ0ua4g.ufTplyFaXzi2Maq4fzg0TAa2ZE6pulOO',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197605918',
            'qualification'=>'M.A., B.Ed., NET, M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-17 04:09:37',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-17 04:09:37'
            ] );

            Faculty::create( [
            'id'=>47,
            'faculty_name'=>'Dr. Jaitmal Ganesh Raghunath',
            'email'=>'jaitmal@sangamnercollege.edu.in',
            'mobile_no'=>'8888778557',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$T4MOL1Sd/jbfys48TvQ7n.SCGhbw..LuDxQ5g7Voj1wCOm9gS3JZG',
            'remember_token'=>'URGP9l7vn9Mk2QtQDaqHrOYWfzhpZFjOMA9vcSS01YxJc1rUXbIWQHzZrs1v',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690588',
            'qualification'=>'M.A., NET, M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 07:52:16',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 07:52:16'
            ] );

            Faculty::create( [
            'id'=>48,
            'faculty_name'=>'Dr. Hase Archana Bhausaheb',
            'email'=>'abhase@sangamnercollege.edu.in',
            'mobile_no'=>'9975307996',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$EjOPTnDxG6JHBkYyb5PwHOIzEL0VcVesx2sqj1YPuuKozMYgD0/0y',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690622',
            'qualification'=>'M.A., Ph.D.',
            'role_id'=>8,
            'department_id'=>16,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-05 06:18:53',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-05 06:18:53'
            ] );

            Faculty::create( [
            'id'=>49,
            'faculty_name'=>'Dr. Mrs.Benke Suvarna Ashok',
            'email'=>'benke@sangamnercollege.edu.in',
            'mobile_no'=>'9850603070',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$f9gejHewxVo92raEo8eRyeLSh4JWJQj5MDVArVRIrg/44z5w3f0w6',
            'remember_token'=>'qPixvU2qBVf9XPFaM65fcYpsB3HaH83ZcEtIOECnHZlDeg0gAnhPIZAd0FIz',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197201865',
            'qualification'=>'M.A., SET, M.Phil., Ph.D.',
            'role_id'=>14,
            'department_id'=>17,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-28 04:18:03',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-28 04:18:03'
            ] );

            Faculty::create( [
            'id'=>50,
            'faculty_name'=>'Dr. Bhong Shriniwas Ashok',
            'email'=>'sabhong@sangamnercollege.edu.in',
            'mobile_no'=>'9423783235',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$eCFKPCHYbvYMPc1KDZ4TfOgk/SWXNTdEzQlQ.Nue.de.agOZPTLOa',
            'remember_token'=>'Xyhlwgd48hSiiIS0qjASoVBw8eopZIM6bYeqnHuNXqGiL9MN6Vg13Gh8dpzG',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197805920',
            'qualification'=>'M.A., NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>17,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-07-25 03:11:42',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-07-25 03:11:42'
            ] );

            Faculty::create( [
            'id'=>51,
            'faculty_name'=>'Dr. Kharat Vasant Abasaheb',
            'email'=>'vakharat@sangamnercollege.edu.in',
            'mobile_no'=>'9850060645',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$zNooLYsT37eVhuIcdGYh0OHS5NBvScxxxwUHBlchhXGzTaeWKFHfC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197373941',
            'qualification'=>'M.A., Ph.D.',
            'role_id'=>8,
            'department_id'=>17,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-22 14:03:08',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-22 14:03:08'
            ] );

            Faculty::create( [
            'id'=>52,
            'faculty_name'=>'Ms. Shirode Sujata Balwant',
            'email'=>'shirode@sangamnercollege.edu.in',
            'mobile_no'=>'9822974123',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$5jma9HGPmja59WjQ10btp.OxxI35uhjfbWQ5gDWhswsoDaR3NBjLq',
            'remember_token'=>'IQ9nEpJVQHvQcfjqAzZ0mf0ILOfIXM1SjMzS24nuTmYLnHDHe02MW2yjDtIA',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198506236',
            'qualification'=>'M.A., NET',
            'role_id'=>8,
            'department_id'=>17,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-08 06:32:09',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-08 06:32:09'
            ] );

            Faculty::create( [
            'id'=>53,
            'faculty_name'=>'Dr.Kurkute Hanumant Tulshidas',
            'email'=>'htkurkute@sangamnercollege.edu.in',
            'mobile_no'=>'9766441715',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4omYgyS/fxqtQ08zupUWIuekbdGu.IEbYKfkK7sJrB5VOQUGRHO6m',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198306095',
            'qualification'=>'M.A., M.Phil., NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>17,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-09 13:44:30',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-09 13:44:30'
            ] );

            Faculty::create( [
            'id'=>54,
            'faculty_name'=>'Mr. Chattar Onkar Bhausaheb',
            'email'=>'hodphilosophy@sangamnercollege.edu.in',
            'mobile_no'=>'9823465198',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$3XaIBgQvVusU0voqFmcHK.bEwJrY7L4oVK.5tOtFLQnhJe2c2UFuy',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.A., NET',
            'role_id'=>8,
            'department_id'=>21,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-08 02:41:33',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-08 02:41:33'
            ] );

            Faculty::create( [
            'id'=>55,
            'faculty_name'=>'Dr. Gaikwad Ravindra Dashrath',
            'email'=>'gaikwad@sangamnercollege.edu.in',
            'mobile_no'=>'9850448093',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$sbCf0mZ/wZt0fyJRXLKUROK2Sg11VEpucv.E9MBu9UwRqcXPbaiRe',
            'remember_token'=>'5bsJn0WBWc8SoreqKYqpswOtxP4yXZla76sgWKDwDQpIWpKGyNhUnMV480bV',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197401848',
            'qualification'=>'M.A.',
            'role_id'=>9,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-23 11:46:36',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-23 11:46:36'
            ] );

            Faculty::create( [
            'id'=>56,
            'faculty_name'=>'Mr. Bairagi Shashikant Ishwardas',
            'email'=>'bairagi@sangamnercollege.edu.in',
            'mobile_no'=>'9822678270',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4Zk6fk3blmRRTIFhlAP.re.WUZwM8F1higM0EUeYzsZaINfZEDinm',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196401864',
            'qualification'=>'M.A., M.Phil.',
            'role_id'=>11,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-05 06:17:35',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-05 06:17:35'
            ] );

            Faculty::create( [
            'id'=>57,
            'faculty_name'=>'Mr. Navale Sanjay Bapusaheb',
            'email'=>'sbnawale@sangamnercollege.edu.in',
            'mobile_no'=>'9881346114',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$TJ2M59X3zGBpRfWNj7zI/ueRaRCwhuMM379.zCkYO8cELUMxxk5K.',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197805951',
            'qualification'=>'M.A., NET',
            'role_id'=>8,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-19 04:25:39',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-19 04:25:39'
            ] );

            Faculty::create( [
            'id'=>58,
            'faculty_name'=>'Mr. Deshmukh Sandip Nanasaheb',
            'email'=>'sndeshmukh@sangamnercollege.edu.in',
            'mobile_no'=>'9270012710',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$wZjPr9kpVKxrOF50KvhRjudK2Arcgejoc377bMVj2IROlazDwZO2G',
            'remember_token'=>'BlAbs1ovEkL2CFt0WaYjr887Qv91vo8i20jvs66bEj0jddquhABk8xfOYob5',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584129',
            'qualification'=>'M.A. , B.Ed., NET',
            'role_id'=>8,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-11-21 07:27:12',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-11-21 07:27:12'
            ] );

            Faculty::create( [
            'id'=>59,
            'faculty_name'=>'Dr. Aher Sainath Parasram',
            'email'=>'aher@sangamnercollege.edu.in',
            'mobile_no'=>'7028938293',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$uGRuPnM6VxW9ar0Wlipx9uGIUT6JkcQLpe.TTLkcLVLSmvXYqet1.',
            'remember_token'=>'IQNUnDnufwrOPrpigTcN9PT7QuwrHGBvEvyLJPwrCExIWFt9DJT5jtvG27d0',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690572',
            'qualification'=>'M.A., SET, Ph.D.',
            'role_id'=>8,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-05-15 14:23:08',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-05-15 14:23:08'
            ] );

            Faculty::create( [
            'id'=>60,
            'faculty_name'=>'Ms. Singh Komal Sangram Bahadur',
            'email'=>'komalsingh@sangamnercollege.edu.in',
            'mobile_no'=>'9175576819',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$2MpIkYqO0pq/euwisxrN0uYSmKYLgfmZwFq.fNo1yWReqDMttGhA.',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800704',
            'qualification'=>'M.A., NET',
            'role_id'=>8,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-03-31 07:52:31',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-03-31 07:52:31'
            ] );

            Faculty::create( [
            'id'=>61,
            'faculty_name'=>'Mr. Sonawane Vijay Rajendra',
            'email'=>'vrsonawane@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201482120',
            'qualification'=>'M.A., M.Sc., NET',
            'role_id'=>8,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>62,
            'faculty_name'=>'Mr. Gaikwad Vinod Prabhakar',
            'email'=>'vpgaikwad@sangamnercollege.edu.in',
            'mobile_no'=>'9689057274',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$u8rlFlNgndUo4O/rTanfmO9CQkX.yE7tB4P.maFzYrDk48gRh33LG',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52112000017',
            'qualification'=>'M.A., M.Sc., SET',
            'role_id'=>8,
            'department_id'=>15,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-26 06:59:59',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-26 06:59:59'
            ] );

            Faculty::create( [
            'id'=>63,
            'faculty_name'=>'Mr. Tiwari Chinmay Durgaprasad',
            'email'=>'chinmaytiwari@sangamnercollege.edu.in',
            'mobile_no'=>'9405907397',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$T2vENrhhewwGxe5zXHjzP.7xlroBuvMIPi7bI5VfnrLzPXw4vvz/u',
            'remember_token'=>'e7f2QkTxGjJGRnFL2H3kjR509Sht03FU0h11PkmAwxxEFW7xZRU8SuRoArT4',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795960',
            'qualification'=>'MTA, UGC NET-JRF, PGDHRM',
            'role_id'=>8,
            'department_id'=>23,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-16 15:49:20',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-16 15:49:20'
            ] );

            Faculty::create( [
            'id'=>64,
            'faculty_name'=>'Mr. Gaikwad Rahul Bhagwanrao',
            'email'=>'rahulbgaikwad@sangamnercollege.edu.in',
            'mobile_no'=>'7276641712',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ZKI8SNPaBtnjXkoIP//rhOkfXrcmG7MUUxbTD199i87R/KIPIB8WW',
            'remember_token'=>'iNsPoJBbQzndEMOWJIf1kw2jd3ogbMHbrGkFLLheScLqmFp9LRvo52kyfFF1',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801251',
            'qualification'=>'MTA, B.Sc.(HS)',
            'role_id'=>8,
            'department_id'=>23,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 10:54:46',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 10:54:46'
            ] );

            Faculty::create( [
            'id'=>65,
            'faculty_name'=>'Mr. Kapadi Bhavabhuti Hemant',
            'email'=>'bhkapadi@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801323',
            'qualification'=>'BHMCT',
            'role_id'=>8,
            'department_id'=>23,
            'college_id'=>1,
            'active'=>0,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>66,
            'faculty_name'=>'Mr. Wakchaure Prasad Rangnath',
            'email'=>'prwakchaure@sangamnercollege.edu.in',
            'mobile_no'=>'9890840695',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$A9rU9dU0zDaFWEV2NosH5.BifvYATYq.D.zDg12bzxXrVUMn7jFEG',
            'remember_token'=>'zo8F8PXY1V4TFcvUuISZfA5bLmmpB6EenIgLvwwaktOSnZP1XyTEKcyOA8dr',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'BHMCT, Dual MBA(HT & Marketing)',
            'role_id'=>8,
            'department_id'=>23,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-11 09:53:44',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-11 09:53:44'
            ] );

            Faculty::create( [
            'id'=>67,
            'faculty_name'=>'Ms. Singh Rashmi Abhiram',
            'email'=>'rashmisingh@sangamnercollege.edu.in',
            'mobile_no'=>'8275899297',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$kztesduA8JGhzC5l7OqJ9.rhs.vOW1Z/e83bRwCfEPqTvBDKKNN6.',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'MBA (Finance)',
            'role_id'=>8,
            'department_id'=>23,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-03-21 03:49:38',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-03-21 03:49:38'
            ] );

            Faculty::create( [
            'id'=>68,
            'faculty_name'=>'Dr. Waman Rajendra Ramchandra',
            'email'=>'rajendrawaman@sangamnercollege.edu.in',
            'mobile_no'=>'9822450768',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Un1z3ly9H/1JoehkZewL1.oaD0oaWM7jXwDQBTykBxWd.guHTnLDW',
            'remember_token'=>'mVdsXQ2WO7H0pTMz6ivv2wilUwYg3x6VBCjVQCS1JscUsBPLRmoac0bee3xD',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52195705942',
            'qualification'=>'M.P.Ed., MA, M.Phil., Ph.D.',
            'role_id'=>9,
            'department_id'=>19,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-17 02:28:15',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-17 02:28:15'
            ] );

            Faculty::create( [
            'id'=>69,
            'faculty_name'=>'Mr. Bandre Amol Ashok',
            'email'=>'amolbandre@sangamnercollege.edu.in',
            'mobile_no'=>'9604087293',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$.5C7tIDhdZ4g471LxhrBOui9n5YgC8WhgMIga26jtcCZ6n8w5v.qm',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101900468',
            'qualification'=>'M.A. SET ',
            'role_id'=>8,
            'department_id'=>18,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 04:45:53',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 04:45:53'
            ] );

            Faculty::create( [
            'id'=>70,
            'faculty_name'=>'Dr. More Mohan Sajan',
            'email'=>'more@sangamnercollege.edu.in',
            'mobile_no'=>'9860941132',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$cCEO/es28GAQlcApErj7GugziAB7kI2edMBr0esGcVfv4JsbY.N6O',
            'remember_token'=>'cDS4BScGGZH8lhFfWRduqqBIcsBweGFs0YUMFh3EDozpYsU8PultPBjZa2dS',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196205926',
            'qualification'=>'M.Sc., B.Ed., Ph.D.',
            'role_id'=>10,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-05-28 16:32:09',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-05-28 16:32:09'
            ] );

            Faculty::create( [
            'id'=>71,
            'faculty_name'=>'Mr. Tryambake Pravin Tatyaram',
            'email'=>'tryambake@sangamnercollege.edu.in',
            'mobile_no'=>'9096298607',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$11PT0unS8hGZc3f1k/Xpp.k3eXL7oVhVY4yTHZCqVyC53oDqwY8pK',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198000232',
            'qualification'=>'M.Sc., SET',
            'role_id'=>11,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-24 13:55:00',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-24 13:55:00'
            ] );

            Faculty::create( [
            'id'=>72,
            'faculty_name'=>'Mr. Bhoye Manish Ramesh',
            'email'=>'bhoye@sangamnercollege.edu.in',
            'mobile_no'=>'7387663810',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$PgdDnyYmiB76nrMFGYA/quoXsp.vpxmYFJcvuPUlpPVQ/m8sQ1Y.6',
            'remember_token'=>'K0MDfNWxKUP3TKOKInEDYmqdctzuSNquJgtzVI1rRo4TH4hr588sHPZHrEf3',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198701832',
            'qualification'=>'M.Sc., NET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 05:05:27',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 05:05:27'
            ] );

            Faculty::create( [
            'id'=>73,
            'faculty_name'=>'Mr. Shrimandilkar Sagar Ramdas',
            'email'=>'srshrimandilkar@sangamnercollege.edu.in',
            'mobile_no'=>'9766883173',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$T69EhXANutEj4HqHgNWPbebuSCeJK8sCatfiOjgmCtY60oi.dTvgC',
            'remember_token'=>'w7WyTIv5Oez5KkeBHUD8YaQikM5orhYpJxqbQs6o1zTI6bT24AglbSMJugXQ',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198601839',
            'qualification'=>'M.Sc., SET, NET, GATE',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-21 12:49:43',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-21 12:49:43'
            ] );

            Faculty::create( [
            'id'=>74,
            'faculty_name'=>'Mr.  Kadlag Amol Gulabrao',
            'email'=>'agkadlag@sangamnercollege.edu.in',
            'mobile_no'=>'9503913294',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$zdF/QCwepoSQI6Crq.Kr9.xCpC2x4UBeVsisUxhx34tK12kbaOz6q',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198601831',
            'qualification'=>'M.Sc., NET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-22 14:21:15',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-22 14:21:15'
            ] );

            Faculty::create( [
            'id'=>75,
            'faculty_name'=>'Dr. Phatangare Narendra Dattatraya',
            'email'=>'phatangare@sangamnercollege.edu.in',
            'mobile_no'=>'9689300495',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Kfb6Ei76Jm/v7cHCKDa3Tuhhr90lm3cXHSAceh1PjJANZz9rgSEiq',
            'remember_token'=>'66kvZpyJzW1ftyMPBSF4duD8QPxQEbWTeynoLom7ZIRUFPFGbrgw37Z4BSkj',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690375',
            'qualification'=>'M.Sc., SET, NET, Ph.D.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-11-01 09:32:14',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-11-01 09:32:14'
            ] );

            Faculty::create( [
            'id'=>76,
            'faculty_name'=>'Ms. Dengale Sujata Gangadhar',
            'email'=>'dengale@sangamnercollege.edu.in',
            'mobile_no'=>'9922390714',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$fvshhIQmJmeYe/4B1PAxO.ZVyv2fgedMi72dDAnZicmcxut.rhxIy',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584143',
            'qualification'=>'M.Sc., NET.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-23 09:15:11',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-23 09:15:11'
            ] );

            Faculty::create( [
            'id'=>77,
            'faculty_name'=>'Dr. Bhise Sagar Chintu',
            'email'=>'sagarbhise@sangamnercollege.edu.in',
            'mobile_no'=>'9766002387',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ssZAyT/8WqUduXyd0XfWtefOfIYgjJvdyrmBxnKtZ8YV320sJx9fm',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52071900119',
            'qualification'=>'M.Sc., Ph.D.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-04 10:53:12',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-04 10:53:12'
            ] );

            Faculty::create( [
            'id'=>78,
            'faculty_name'=>'Dr. Saraswat (Oza) Rajeshwari Khinyaram',
            'email'=>'oza@sangamnercollege.edu.in',
            'mobile_no'=>'9371092684',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4Gmnv7lKkpwmuyowwcRNj.nT68eo6rQnxXnTHCCrRZrOv1RCEI./6',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584131',
            'qualification'=>'M.Sc. Ph.D.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-26 09:08:33',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-26 09:08:33'
            ] );

            Faculty::create( [
            'id'=>79,
            'faculty_name'=>'Mr. Gaje Tukaram Ramdas',
            'email'=>'tukaramgaje@sangamnercollege.edu.in',
            'mobile_no'=>'9922740797',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$mgcQ4STnukv86mIVWuNqKe1e.fqQKbrV58K5JSevSpoRN5WkFgHz.',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690600',
            'qualification'=>'M.Sc., SET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-07-12 12:11:30',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-07-12 12:11:30'
            ] );

            Faculty::create( [
            'id'=>80,
            'faculty_name'=>'Mr. Bamble Pravin Namdeo',
            'email'=>'pravinbamble@sangamnercollege.edu.in',
            'mobile_no'=>'9503890970',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$iinZfaSWDVxNqWwxG1EVFeTJbdsm8EgFLNZ.CxMs60Q1oGYW5h2Jy',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800697',
            'qualification'=>'M.Sc. NET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-01-25 07:25:14',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-01-25 07:25:14'
            ] );

            Faculty::create( [
            'id'=>81,
            'faculty_name'=>'Mrs. Wakchaure Nirmala Ramnath',
            'email'=>'nirmalawakchaure@sangamnercollege.edu.in',
            'mobile_no'=>'9518520683',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$NlDYBJ/08qizTgcgMlI/uO/HzGFIoIxHmCPATdZQwPEbaJj2XHYOa',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800712',
            'qualification'=>'M.Sc., B.Ed. SET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-05-17 07:24:45',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-05-17 07:24:45'
            ] );

            Faculty::create( [
            'id'=>82,
            'faculty_name'=>'Dr. Hase Goraksha Jijaba',
            'email'=>'hase@sangamnercollege.edu.in',
            'mobile_no'=>'9850144585',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ApNC.GrBb7deWai8vxW9keOvSU7SJuK5zFWxKDjQT93gCXrqHrx7K',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690420',
            'qualification'=>'M.Sc., NET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-06-27 09:43:53',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-06-27 09:43:53'
            ] );

            Faculty::create( [
            'id'=>83,
            'faculty_name'=>'Ms. Muntode Asha Baban',
            'email'=>'ashamuntode@sangamnercollege.edu.in',
            'mobile_no'=>'9673168762',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$SXDxlLCOM8JynB4a/gJ17u9QaR5SlOiLnkoGqtDmsUVT8IPmCoTa6',
            'remember_token'=>'6XOSjxLnZJAZ309YsNz4P6aFGC5QfHGgoIuHlcaxSDicdBCWosp9HnbciOXC',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800587',
            'qualification'=>'M.Sc., SET',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-29 08:45:42',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-29 08:45:42'
            ] );

            Faculty::create( [
            'id'=>84,
            'faculty_name'=>'Mr. Bharati Kiran Tukaram',
            'email'=>'bharati@sangamnercollege.edu.in',
            'mobile_no'=>'9561805064',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$pNcrntutTuEGP703iVlCg.C9vYGLkpRXVxXgYx8FPhCoKt3zXfRv6',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801246',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-24 08:17:37',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-24 08:17:37'
            ] );

            Faculty::create( [
            'id'=>85,
            'faculty_name'=>'Mr. Gosavi Anil Bhagwan',
            'email'=>'abgosavi@sangamnercollege.edu.in',
            'mobile_no'=>'9922190880',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Lw75FI2fcoOPzhDpBqZcpOipN2LM9N2t6nojIAWuN/sOZ089pFoxW',
            'remember_token'=>'LRcqIybgF0jah9EfamxLZsj0sj7FDpkF8kp9WyZnpEGWwLxoONBrKX79ojVW',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'53101800062',
            'qualification'=>'M.Sc., M.Phil',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-07 07:23:35',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-07 07:23:35'
            ] );

            Faculty::create( [
            'id'=>86,
            'faculty_name'=>'Mrs. Deshmukh Sulakshana Jankiram',
            'email'=>'sulakshanadeshmukh@sangamnercollege.edu.in',
            'mobile_no'=>'8208727076',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$96gtAcbgk.LwAZJfYeGuP.cBgpdwv2Sq8O9bBO5e91VcTR18H9HIS',
            'remember_token'=>'3f1KDqNzQjcCW61dJPRgEPaCkc0PfVFYCJlKCN5qupdFuIvNVYtp6Duqvncy',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201692717',
            'qualification'=>'M.Sc. B.Ed.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-23 09:14:22',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-23 09:14:22'
            ] );

            Faculty::create( [
            'id'=>87,
            'faculty_name'=>'Mrs. Dichayal Sonali Shrinivas',
            'email'=>'dichayal@sangamnercollege.edu.in',
            'mobile_no'=>'9730141407',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$QK7aKnM5jxd6/OOwKDk.4uO6oIZXAWMjrn59ruHZng9GBmyddHJIq',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801265',
            'qualification'=>'M.Sc., B.Ed., M.Phil.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-07-04 10:46:15',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-07-04 10:46:15'
            ] );

            Faculty::create( [
            'id'=>88,
            'faculty_name'=>'Ms. Patil Shweta Sanjay',
            'email'=>'shwetapatil@sangamnercollege.edu.in',
            'mobile_no'=>'8657546581',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$W9voOI7XcYtBjcUggBpWOeq66Y7fmfnDIEWsrAXObhEDgDGXQmHNG',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801422',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-05-11 02:46:37',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-05-11 02:46:37'
            ] );

            Faculty::create( [
            'id'=>89,
            'faculty_name'=>'Mr. Wagh Akshay Punjaram',
            'email'=>'akshaywagh@sangamnercollege.edu.in',
            'mobile_no'=>'7219120416',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$fTXqxSW5/xceMSB4N2JIhODy7n48pBR.W.jmCT0Q1UZpZ4yfA8.HG',
            'remember_token'=>'Q4zWlZMZfnqEnJjb8XIzuSd3q4uZf0lTosa8IpnuWLvJ6YdsFhMWQu5OszEm',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52042100417',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>6,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-07-12 07:15:55',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-07-12 07:15:55'
            ] );

            Faculty::create( [
            'id'=>90,
            'faculty_name'=>'Dr. Kadu Jayshri Balkrishna',
            'email'=>'jayshrikadu@sangamnercollege.edu.in',
            'mobile_no'=>'9422287839',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$//ek0S4ZS/vVZdfzv12OhOkThco/HR8v9UuxuDeLGqyK4drk3LQS6',
            'remember_token'=>'Y1RNSI7hFnlTCigm9KrP6UKSI6QfUcsA3cgBSwuUcnQxbBXGFzPjNGGhGEJ6',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800705',
            'qualification'=>'M.Sc. Agri., Ph.D. (Soil Science &  Agricultural Chemistry)',
            'role_id'=>8,
            'department_id'=>25,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-11-02 14:44:57',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-11-02 14:44:57'
            ] );

            Faculty::create( [
            'id'=>91,
            'faculty_name'=>'Ms. Tambe Ashwini Jaywant',
            'email'=>'ashwinijtambe@sangamnercollege.edu.in',
            'mobile_no'=>'9890787910',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$SwYqKOgAx57vGEMlQHQR3.gmpv0A/ZrCG7z0/8bKxapsFl.HrdKR.',
            'remember_token'=>'HibCBI6fO0clW8bqbmvF9o2tfRxW0Tf1bXN2gkVXQmiW8L6IQCnX71rqSCzE',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc. Agri., Ph.D. (Soil Science &  Agricultural Chemistry)',
            'role_id'=>8,
            'department_id'=>25,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-11 17:38:10',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-11 17:38:10'
            ] );

            Faculty::create( [
            'id'=>92,
            'faculty_name'=>'Ms. Gunjal Poonam Balasaheb',
            'email'=>'poonambgunjal@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc. Agri. (Agronomy)',
            'role_id'=>8,
            'department_id'=>25,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>93,
            'faculty_name'=>'Mr. Varpe Ashutosh Kailas',
            'email'=>'ashutoshvarpe@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc. Agri. (Animal Husbandry & Dairy Science) ',
            'role_id'=>8,
            'department_id'=>25,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>94,
            'faculty_name'=>'Ms. Pawar Madhavi Vitthal',
            'email'=>'madhavipawar@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc., Agri.',
            'role_id'=>8,
            'department_id'=>24,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>95,
            'faculty_name'=>'Mr. Antre Gorakshanath Raosaheb',
            'email'=>'grantre@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc., Agri. ',
            'role_id'=>8,
            'department_id'=>24,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>96,
            'faculty_name'=>'Dr. Dalvi Sanjaykumar Nanasaheb',
            'email'=>'dalvi@sangamnercollege.edu.in',
            'mobile_no'=>'9850014466',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$fmMJgOiH.noul5ECoMFGVezy.oKwR8A.B8/aRC.Jks5LZPbcoZWLG',
            'remember_token'=>'oCzN5yY4GezAHPiVMudiCR1yUEap9lAKpf5QGO4jZ3JlGLNJEZGAWA4BSj9X',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196902482',
            'qualification'=>'M.Sc., B.Ed., Ph.D.',
            'role_id'=>10,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-28 07:30:14',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-28 07:30:14'
            ] );

            Faculty::create( [
            'id'=>97,
            'faculty_name'=>'Dr. Arote Sandeep Annasaheb',
            'email'=>'sandeeparote@gmail.com',
            'mobile_no'=>'8767075675',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$il5tPLUTgdrOHPKc1qITkul1BuP39clwEL7ZRhh.OrAEcDlAZUz7q',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198201863',
            'qualification'=>'M.Sc., SET, Ph.D.',
            'role_id'=>11,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-11-21 12:59:37',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-11-21 12:59:37'
            ] );

            Faculty::create( [
            'id'=>98,
            'faculty_name'=>'Mr. Gapale Dipak Lahanu',
            'email'=>'gapale@sangamnercollege.edu.in',
            'mobile_no'=>'9960472797',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$V././IzgfR4.svKCz7GMr.4v.5NaDiNsB.xATjpAmt7VEM2dV7Fq2',
            'remember_token'=>'wibpg7gNE7qmb318NqxZTya4NLyuPv0wFNuJeBtC8rB2CsvNW1YG4peQiJiw',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198005924',
            'qualification'=>'M.Sc., B.Ed., M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-20 12:32:38',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-20 12:32:38'
            ] );

            Faculty::create( [
            'id'=>99,
            'faculty_name'=>'Dr. Bardapurkar Pranav Pramodrao',
            'email'=>'bardapurkar@sangamnercollege.edu.in',
            'mobile_no'=>'9011769616',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$fs0/GtD1rgg85YeNtfddluK42evd/qBs3k6DrPK/Es2GKHEaLV0ci',
            'remember_token'=>'HgeFc7M6UMZJdHUazhkvgI8iuM2scqsb1Phw3CGO2UjYUuSKCxM4lCMABw09',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197605980',
            'qualification'=>'M.Sc., B.Ed., Ph.D.',
            'role_id'=>11,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-11-24 01:10:57',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-11-24 01:10:57'
            ] );

            Faculty::create( [
            'id'=>100,
            'faculty_name'=>'Dr. Palve Balasaheb Manik',
            'email'=>'arjunpalve@gmail.com',
            'mobile_no'=>'9307099102',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Y8YPWP3IOwE0rfieTQdXGeqMoBRffI94IWLNjMVzeK2WyMCpYlp0i',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198505981',
            'qualification'=>'M.Sc., SET, GATE, Ph.D.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-21 16:46:24',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-21 16:46:24'
            ] );

            Faculty::create( [
            'id'=>101,
            'faculty_name'=>'Dr. Navale Sainath Ramnath',
            'email'=>'sainathnavale09@gmail.com',
            'mobile_no'=>'8600140614',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$0JB3EyzCQxX9DRV6AJyqluLsj9pvIsq/xCpkfr8c2WfZ5T/77n3xS',
            'remember_token'=>'QUvlLyoJZhiepmBMwCCBMTAbLrrEY4CTWZW1db21q5KK09iqjy0bOAUDP631',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795953',
            'qualification'=>'M.Sc., M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-16 04:33:23',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-16 04:33:23'
            ] );

            Faculty::create( [
            'id'=>102,
            'faculty_name'=>'Dr. Baviskar Prashant Kishor',
            'email'=>'pkbaviskar@sangamnercollege.edu.in',
            'mobile_no'=>'8055691199',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$9SrQg7AxMdXTAymLPrfQHe0A83VDXbKmaRyH4wa/AmXO.BWd68DoK',
            'remember_token'=>'ukH87l5JZDxt5v7AZzYddRzXcxTGWLfjIWG5JIpttSYoCHyXXRTv5Jq4quSN',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52071900125',
            'qualification'=>'M.Sc., Ph.D.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-20 12:47:15',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-20 12:47:15'
            ] );

            Faculty::create( [
            'id'=>103,
            'faculty_name'=>'Ms. Pokharkar Shraddha Sambhaji',
            'email'=>'sspokharkar@sangamnercollege.edu.in',
            'mobile_no'=>'9552936217',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$xNC2OkRY0uoVxnn.y6PksuKEdw1PVyOYTMN.ZqJTwaMCJHgJSfCii',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795959',
            'qualification'=>'M.Sc., SET, NET',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-05 06:33:09',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-05 06:33:09'
            ] );

            Faculty::create( [
            'id'=>104,
            'faculty_name'=>'Mrs. Jadhav Swati Navnath',
            'email'=>'snjadhav@sangamnercollege.edu.in',
            'mobile_no'=>'7020164496',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$5hRRlZMyc9117.qM3Hl2QOCUrdY6k4m4V4ZBXK0j0EKujYkwIyHcG',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800710',
            'qualification'=>'M.Sc., SET, Gate',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-03-31 09:31:29',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-03-31 09:31:29'
            ] );

            Faculty::create( [
            'id'=>105,
            'faculty_name'=>'Dr. Waykar Ravindra Gavram',
            'email'=>'ravindrawaykar@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52111900111',
            'qualification'=>'M.Sc., M.Phil., Ph.D.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>106,
            'faculty_name'=>'Mr. Pathan Abbas Sayyad',
            'email'=>'aspathan@sangamnercollege.edu.in',
            'mobile_no'=>'9503703543',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$dxO7tQfkzwKzswIuwnbnE.Hi20kFretA1KecxTRwPmvdbgpcjPhAG',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801231',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-12 08:35:20',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-12 08:35:20'
            ] );

            Faculty::create( [
            'id'=>107,
            'faculty_name'=>'Mr. Pathan Shahrukh Bashir',
            'email'=>'sbpathan@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801260',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>108,
            'faculty_name'=>'Ms. Varpe Nikita Babasaheb',
            'email'=>'nikitabvarpe@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>3,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>109,
            'faculty_name'=>'Dr. Jadhav Sangita Devram',
            'email'=>'jadhav@sangamnercollege.edu.in',
            'mobile_no'=>'8605558167',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Aa1ePDgyEd8S7/uKZh34SeEWNyM7B6.wtsINqhJzUGRkDIcarfqXW',
            'remember_token'=>'ycGHHJYksVdQ4MSPJwwFdX6ao8bDfWswQmqqZRgUi0i184ZDAi9xXOZQENtg',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584117',
            'qualification'=>'M.Sc., M.Phil., Ph.D.',
            'role_id'=>9,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-30 06:57:17',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-30 06:57:17'
            ] );

            Faculty::create( [
            'id'=>110,
            'faculty_name'=>'Mr. Tambe Ashok Narayan',
            'email'=>'antambe@sangamnercollege.edu.in',
            'mobile_no'=>'9860486031',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$EaKlc.Cq1IKaSlqbkgcTB.eMUHq3N5zky1wuFk7Ma7.8Bwt25ZmuS',
            'remember_token'=>'QwTP2u74Y1Mxnk7NC2CBO38opJ4qdw5VPQXz45sJSDZRyU6UUeUnUmmradRN',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690571',
            'qualification'=>'M.Sc., SET., Ph.D.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 11:10:39',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 11:10:39'
            ] );

            Faculty::create( [
            'id'=>111,
            'faculty_name'=>'Mr. Roylawar Praveen Baliram',
            'email'=>'praveenroylawar@sangamnercollege.edu.in',
            'mobile_no'=>'9028106089',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$nnGsBAacs.q9lkbHt7XjKunN57CvqowUMjbF/hvAirI1ocP10c5yu',
            'remember_token'=>'WG9OxAaMoNZb8GvA32wfvYfXhxCHJ0lsSIRk1FMUHVLkoxdd4drkprCUwBwo',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52071900124',
            'qualification'=>'M.Sc., M.Phill., NET-JRF',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-08 05:18:37',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-08 05:18:37'
            ] );

            Faculty::create( [
            'id'=>112,
            'faculty_name'=>'Dr.  Khyade Mahendra Shivshankar',
            'email'=>'khyade@sangamnercollege.edu.in',
            'mobile_no'=>'9421482234',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$7le4mfizM5mk0tEHMxHS/OykxyY4inJ9/6nfWw6zFQFay6IzxvKPK',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201584158',
            'qualification'=>'M.Sc., Ph.D., FIAAT',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 10:39:52',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 10:39:52'
            ] );

            Faculty::create( [
            'id'=>113,
            'faculty_name'=>'Dr.  Hase Vijata Balasaheb',
            'email'=>'vijatahase@sangamnercollege.edu.in',
            'mobile_no'=>'9561665883',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$eOs/tV1lvPbYvs2Xp74wjete0vPgRmOUTkHvEnfJsN3L8uXHRlWuO',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800707',
            'qualification'=>'M.Sc. Ph.D.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-30 06:59:32',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-30 06:59:32'
            ] );

            Faculty::create( [
            'id'=>114,
            'faculty_name'=>'Dr.  Pandharmise Priyanka Arjunrao',
            'email'=>'pandharmise@sangamnercollege.edu.in',
            'mobile_no'=>'8975161190',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$C3r39SHU27hqq4PO1n9l1OgKhS6Pj8nBvlzDDHFxgyCec.R49Tliq',
            'remember_token'=>'i4ciaD3mtu2jPGCvNJzG93rrzNW7QQsbygOubsnhAQTez3Po4L1BhZeWNxoB',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801268',
            'qualification'=>'M.Sc., Ph.D. ',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-18 04:24:07',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-18 04:24:07'
            ] );

            Faculty::create( [
            'id'=>115,
            'faculty_name'=>'Mr. Navale Mahesh Bhimraj',
            'email'=>'maheshnavale@sangamnercollege.edu.in',
            'mobile_no'=>'9850121598',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$zPAR8taqlHvyDMZya919E.rXKcnsgR8HcEKIheEtuHbemKh.oFXQS',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'53201601881',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-16 05:11:00',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-16 05:11:00'
            ] );

            Faculty::create( [
            'id'=>116,
            'faculty_name'=>'Ms. Bramhane Rupali Subhash',
            'email'=>'rsbramhane@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>117,
            'faculty_name'=>'Mr. Gunjal Mahesh Baburao',
            'email'=>'mbgunjal@sangamnercollege.edu.in',
            'mobile_no'=>'9404424951',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$QyhhJ7zodbHThaISn7eiqOfEhNWajzGAn7dq0Bk5Urq96cERUpmae',
            'remember_token'=>'V7MHTBKlpyR73QWRClVVuTXkMjqZNMiaPwNjQz3sVsX30kOSDH4zubmAcJrH',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201796908',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-07-31 06:26:31',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-07-31 06:26:31'
            ] );

            Faculty::create( [
            'id'=>118,
            'faculty_name'=>'Mr. Padwal Anup Dashrath',
            'email'=>'padwal@sangamnercollege.edu.in',
            'mobile_no'=>'9850443379',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$VpLC7DLSCyVZE3MvgtCtg.0lU4U0DxDkXF3SjWEetLEGWlwTRH6ZS',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801223',
            'qualification'=>'M.Sc. , B.Ed.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-02-28 11:12:39',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-02-28 11:12:39'
            ] );

            Faculty::create( [
            'id'=>119,
            'faculty_name'=>'Ms. Bibave Bhagyashri Bharat',
            'email'=>'bibavebhagyashri@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>120,
            'faculty_name'=>'Ms. Wale Sonal Khanderao',
            'email'=>'walesonal@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>5,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>121,
            'faculty_name'=>'Dr. Mrs.Bhavare Vandana Vijay',
            'email'=>'bhavare@sangamnercollege.edu.in',
            'mobile_no'=>'9421438204',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$RIfHlivXyxc1gbyLrk2ns.i/.WstlIWeu5UBf1lLuvudWjqk0eztG',
            'remember_token'=>'oQV6epfsoukeSAPxlDYnPlxcSIwslvuylzhj4eBPjHKj2vACQOUHOdvn4COJ',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196801866',
            'qualification'=>'M.Sc., Ph.D., F.Z.S.I., F.S.L.S.',
            'role_id'=>14,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-12 05:20:09',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-12 05:20:09'
            ] );

            Faculty::create( [
            'id'=>122,
            'faculty_name'=>'Dr. Pingle Shrihari Ashok',
            'email'=>'pingle@sangamnercollege.edu.in',
            'mobile_no'=>'9422089803',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$A7gQ5rklHG4vw2HivagjKelhFTn/7DdNAUidyoacooCZyyp0gtnAu',
            'remember_token'=>'wzdR5DoNDe2Ng1lydUB9fMrCawkB6y0vjDrIv3p4WEMbYwtUKzabl5yipolZ',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198000715',
            'qualification'=>'M.Sc., CSIR-NET (JRF), F.Z.S.I.',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-27 07:18:36',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-27 07:18:36'
            ] );

            Faculty::create( [
            'id'=>123,
            'faculty_name'=>'Dr. Borgave Seema Sachin',
            'email'=>'borgave@sangamnercollege.edu.in',
            'mobile_no'=>'9730033447',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$rqSi707OZTpqLU8NRSSgKuIY8qcBihb5R9Taef.11gTtgn0glZiTe',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197303384',
            'qualification'=>'M.Sc., GATE, Ph.D., F.Z.S.I.',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-09 05:43:41',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-09 05:43:41'
            ] );

            Faculty::create( [
            'id'=>124,
            'faculty_name'=>'Dr. Bhagade Rupendra vinayak',
            'email'=>'bhagde@sangamnercollege.edu.in',
            'mobile_no'=>'8975063014',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$jCRd2Awi7MMQEaMpI/VSGu4hCJ18ehvZbP/zVUzHUkSNX0SJuKr6i',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196805919',
            'qualification'=>'M.Sc., Ph.D., F.Z.S.I.',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-05 02:25:50',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-05 02:25:50'
            ] );

            Faculty::create( [
            'id'=>125,
            'faculty_name'=>'Dr.  Dube Priyanka Goraksha',
            'email'=>'pgdube@sangamnercollege.edu.in',
            'mobile_no'=>'9552813155',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$d8uwXcodZRUSiCA2g6dOfepyVSq4UeX3gdhtgxSpwLXZR/8cV45xi',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795958',
            'qualification'=>'M.Sc., Ph.D., GATE',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-08 10:41:05',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-08 10:41:05'
            ] );

            Faculty::create( [
            'id'=>126,
            'faculty_name'=>'Ms. Bapte Pradnya Sunil',
            'email'=>'psbapte@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52091800306',
            'qualification'=>'M.Sc., CSIR-NET (LS)',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>127,
            'faculty_name'=>'Ms. Fatangare Prabhawati Uttam',
            'email'=>'pufatangare@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52032000101',
            'qualification'=>'M.Sc., CSIR-NET (JRF), GATE',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>128,
            'faculty_name'=>'Ms. Sahane Tanuja Dadasaheb',
            'email'=>'tdsahane@sangamnercollege.edu.in',
            'mobile_no'=>'7972909848',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$8/frKDCbBYX.GduL8XAWWurxk2PuTzCE7GQTHT8GCVvQP41aJva1S',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801327',
            'qualification'=>'M.Sc., CSIR-NET (JRF), SET, GATE',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-07 02:28:53',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-07 02:28:53'
            ] );

            Faculty::create( [
            'id'=>129,
            'faculty_name'=>'Ms. Vikhe Rutu Jankiram',
            'email'=>'rjvikhe@sangamnercollege.edu.in',
            'mobile_no'=>'7261965148',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$iWFwY7Fnc6RgvvDqycECo.jzBBwMqO3PP7Cgx0JuDJyETGc4avuM2',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801209',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-08-03 06:42:49',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-08-03 06:42:49'
            ] );

            Faculty::create( [
            'id'=>130,
            'faculty_name'=>'Ms. Mhaske Supriya Suryabhan',
            'email'=>'supriyamhaske@sangamnercollege.edu.in',
            'mobile_no'=>'8530850700',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$qcEP2EGQ75J3FjU8yPFd2.iP.zloK/H5iVbATPrZdzRFLvNjQ1JZW',
            'remember_token'=>'hxkFYCFUntOd2FbV3v2WfdgX4D83GFldkiBpIhrUI3PicUiZriuF9lWGi4T4',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52032000100',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-03 09:32:45',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-03 09:32:45'
            ] );

            Faculty::create( [
            'id'=>131,
            'faculty_name'=>'Ms. Pawar Varsha Ramchandra',
            'email'=>'varshapawar@sangamnercollege.edu.in',
            'mobile_no'=>'9850835802',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$kYS6VDazi.viSkMMOazQYOH.gTiHyLrTF4UEH8d6omETnSpP6QLBS',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801273',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>7,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-13 08:41:21',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-13 08:41:21'
            ] );

            Faculty::create( [
            'id'=>132,
            'faculty_name'=>'Ms. Maka Manisha Rameshrao',
            'email'=>'mrmaka@sangamnercollege.edu.in',
            'mobile_no'=>'9028250456',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$8JaKP6EB2.3ptWPHCLQrYeqZ5pJwDx9WBF.5uiDDZKHiA9mPi/OmS',
            'remember_token'=>'QpSJBMpxUbAJzFfIXGEoug5NzBlvWNFhDlhFlzCVVMWVO6DRtapRsv8tvbda',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'53101800055',
            'qualification'=>'M.Sc. , B.Ed.',
            'role_id'=>8,
            'department_id'=>9,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-27 07:31:47',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-27 07:31:47'
            ] );

            Faculty::create( [
            'id'=>133,
            'faculty_name'=>'Ms. Kulkarni Radhika Tejas',
            'email'=>'radhikakulkarni@sangamnercollege.edu.in',
            'mobile_no'=>'',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'53101800056',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>9,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>NULL,
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2021-11-26 14:37:00'
            ] );

            Faculty::create( [
            'id'=>134,
            'faculty_name'=>'Vice Principal Dr. Laddha Rajendra Shankarlal',
            'email'=>'rsladdha@sangamnercollege.edu.in',
            'mobile_no'=>'9860441810',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$E95lpHtbm91hYUF7oXwBSedo8wOz.E/5QKoWDGPxavON47j9gSbH6',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196505953',
            'qualification'=>'M.Sc., M.Phil., Ph.D.',
            'role_id'=>10,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-22 10:11:23',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-22 10:11:23'
            ] );

            Faculty::create( [
            'id'=>135,
            'faculty_name'=>'Mr. Bhagwat Suresh Vasudeo',
            'email'=>'bhagwat@sangamnercollege.edu.in',
            'mobile_no'=>'9822553937',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$e/I4m7wxcywIpHzNEEJbxuO7kYTj2iqjGkJlfLh.HQNaM4/XJBZlS',
            'remember_token'=>'VsL5r8av5XF8ej9zPDhZ514EtJfZhZmUwH9yfzzNyqKCYWrSc3gGOYRyc8nc',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52196500926',
            'qualification'=>'M.Sc., M.Phil.',
            'role_id'=>11,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-03-21 11:27:00',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-03-21 11:27:00'
            ] );

            Faculty::create( [
            'id'=>136,
            'faculty_name'=>'Mr. Shinde Prashant Krishna',
            'email'=>'shinde@sangamnercollege.edu.in',
            'mobile_no'=>'9975123168',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$hS2QD/x7uV./d7daXLgdceJO8kr67BCkS0qU7Nxycf.msyWmGlgsy',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198405939',
            'qualification'=>'M.Sc., NET',
            'role_id'=>8,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-04 06:49:28',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-04 06:49:28'
            ] );

            Faculty::create( [
            'id'=>137,
            'faculty_name'=>'Mr. Balode Bhimashankar Raosaheb',
            'email'=>'balode@sangamnercollege.edu.in',
            'mobile_no'=>'9850186276',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$ZEGJ.eapISKSznBqvI.j9O/ZO6VxZfHck3s09J9wcxjp77w/hbTta',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801274',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-04 05:33:04',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-04 05:33:04'
            ] );

            Faculty::create( [
            'id'=>138,
            'faculty_name'=>'Ms. Andela Indira Raghunand',
            'email'=>'andela@sangamnercollege.edu.in',
            'mobile_no'=>'7588077785',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$nrHReKZu.EhSKAYO26V6uejq/eEn7XG6XUospMP.18X1hhHfhzJvi',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801266',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-11-30 15:07:05',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-11-30 15:07:05'
            ] );

            Faculty::create( [
            'id'=>139,
            'faculty_name'=>'Mr. Pansare Shivaji Yashvant',
            'email'=>'pansare@sangamnercollege.edu.in',
            'mobile_no'=>'9767786614',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Kmwy3AcVbMz.Kg/ehj9jiOTQdre/FOTDiqkKzPTqrD2.nlkDjpkuq',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201798060',
            'qualification'=>'M.Sc. , B.Ed.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-23 04:22:18',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-23 04:22:18'
            ] );

            Faculty::create( [
            'id'=>140,
            'faculty_name'=>'Mr. Baheti Sachin Shamlal',
            'email'=>'sachinbaheti@sangamnercollege.edu.in',
            'mobile_no'=>'9890308845',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$KEVgEcfOsZS0.tbcxJWXx.6r/kajWnUFgS94rZN5V51vDc3Wr088m',
            'remember_token'=>'PJ1LJaLoXLKMptWOhtQPucPw2Rhkf1LtiObg2gYZjdv61P6rbvHtP9OAk2DZ',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801087',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-24 02:41:48',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-24 02:41:48'
            ] );

            Faculty::create( [
            'id'=>141,
            'faculty_name'=>'Mr. Bhusal Sanjay Changdeo',
            'email'=>'bhusal@sangamnercollege.edu.in',
            'mobile_no'=>'9922303683',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$1gGjcHDKvHiLzeja4Ai1Q.TzXVZ.GXC7yLsptBKxecvJ2zz529wi6',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690585',
            'qualification'=>'M.Sc. NET, SET',
            'role_id'=>8,
            'department_id'=>2,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-15 15:57:59',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-15 15:57:59'
            ] );

            Faculty::create( [
            'id'=>142,
            'faculty_name'=>'Miss. Gite Dipa Prabhakar',
            'email'=>'dipa.gite@sangamnercollege.edu.in',
            'mobile_no'=>'8308158753',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4OYZf3n9r315igB8NJOol.D3Du23FKOtShYo7HfjQapjCMoJ/Xs5u',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201689396',
            'qualification'=>'M.Sc. Comp. Sci.,NET',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-25 13:50:53',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-25 13:50:53'
            ] );

            Faculty::create( [
            'id'=>143,
            'faculty_name'=>'Ms. Talnikar Harshada Vivek',
            'email'=>'harshada.talnikar@gmail.com',
            'mobile_no'=>'9420146529',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$P2K9fCTEvD1jdEy4FJmYQu262JacIHWBN6zKgPhg0SWyFTerW.h7u',
            'remember_token'=>'Nx6eO7QgocfRg9mEmDFEyWORKW6epFw3aCjAfZYufXUqRRIc0ZaE1dDXWAwy',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201793808',
            'qualification'=>'M.Sc. Comp. Sci., NET',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>114,
            'active'=>1,
            'last_login'=>'2023-05-16 17:47:38',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-05-16 17:47:38'
            ] );

            Faculty::create( [
            'id'=>144,
            'faculty_name'=>'Ms. Khambekar Rupali Sandip',
            'email'=>'rskhambekar@sangamnercollege.edu.in',
            'mobile_no'=>'9271296522',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$utpS7QaFeiQA2972J2OED.52..Y6qaJRAIdW6dehzRYCTLFMWxBnW',
            'remember_token'=>'5kEm1hCvQBe3v4ADqRFuUTGg1WIGbJ8orgpEUkYOTE1s1MYZXuDdNbFgjmoO',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201690589',
            'qualification'=>'M.C.S. , NET',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-26 03:13:50',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-26 03:13:50'
            ] );

            Faculty::create( [
            'id'=>145,
            'faculty_name'=>'Mr. Kawade Sitaram Namdev',
            'email'=>'sitaram.kawade@sangamnercollege.edu.in',
            'mobile_no'=>'8308158752',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$11PT0unS8hGZc3f1k/Xpp.k3eXL7oVhVY4yTHZCqVyC53oDqwY8pK',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201688994',
            'qualification'=>'M.Sc. Comp. Sci., NET',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-16 07:48:00',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-16 07:48:00'
            ] );

            Faculty::create( [
            'id'=>146,
            'faculty_name'=>'Ms. Rahane Surekha Santosh',
            'email'=>'sbthorat@sangamnercollege.edu.in',
            'mobile_no'=>'9096466773',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$u/FAaUvQ6.vsXSs4fL4RLOp0amshBXWQVX6WC7nU926EjDoZPlkBS',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801269',
            'qualification'=>'M.Sc. Comp. Sci., B.Ed., SET',
            'role_id'=>8,
            'department_id'=>22,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-19 04:25:24',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-19 04:25:24'
            ] );

            Faculty::create( [
            'id'=>147,
            'faculty_name'=>'Ms. Jagdale Maithili Arjun',
            'email'=>'majagadale@sangamnercollege.edu.in',
            'mobile_no'=>'8625801687',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$tfINDP3dxbSglyQFHJ2VTe0qFlxiKz3CVWWV1KsiSZ6V9UbM8U9wy',
            'remember_token'=>'9JDKFYeddsNdYNGZTn7oAJXrVZqlu5wjqnubfAzf2ce209bdC30rNlCb2QAU',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201689415',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-21 05:21:56',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-21 05:21:56'
            ] );

            Faculty::create( [
            'id'=>148,
            'faculty_name'=>'Ms. Sharma Rohini Ishwarprasad',
            'email'=>'risharma@sangamnercollege.edu.in',
            'mobile_no'=>'8983432352',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$4MsK08rmsN5F4WW6BqxbKu/zQMKFsKfzGI4IHp9zc6Or.oD51Y/mC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801278',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-04 13:45:36',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-04 13:45:36'
            ] );

            Faculty::create( [
            'id'=>149,
            'faculty_name'=>'Mr. Gaikwad Mahesh Shivaji',
            'email'=>'msgaikwad@sangamnercollege.edu.in',
            'mobile_no'=>'9730477859',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$/cRfMjLiweDaHUlExLI9Wu86FpVFhqBy7GqqsykiCWMp0zUQ8xHJC',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201585896',
            'qualification'=>'M.Sc. Comp. Sci.,M.B.A., NET',
            'role_id'=>8,
            'department_id'=>22,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-02-23 07:19:16',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-02-23 07:19:16'
            ] );

            Faculty::create( [
            'id'=>150,
            'faculty_name'=>'Mr. Pansare Arun Dadasaheb',
            'email'=>'adpansare@sangamnercollege.edu.in',
            'mobile_no'=>'9762578440',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$oih6NJdzNFHcMPyU3LmeGOTeGYkxMfeULHIh5b4jMSs0DCAzmsjVa',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101800740',
            'qualification'=>'M.Sc.',
            'role_id'=>8,
            'department_id'=>10,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-08-02 16:57:20',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-08-02 16:57:20'
            ] );

            Faculty::create( [
            'id'=>151,
            'faculty_name'=>'Ms. Jondhale Dhanashree Rajaram',
            'email'=>'drjondhale@sangamnercollege.edu.in',
            'mobile_no'=>'8830007385',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$LkD1pq0y6JQx61Bi9qfBEOdCNJRmlOScVNRnmKKZmFxq.vh.p7apW',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52012000098',
            'qualification'=>'B.E. (Comp.)',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-03-16 09:22:15',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-03-16 09:22:15'
            ] );

            Faculty::create( [
            'id'=>152,
            'faculty_name'=>'Ms. Pawase Harshal Shivaji',
            'email'=>'harshalpawase@sangamnercollege.edu.in',
            'mobile_no'=>'8605745942',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$aBtmjNgEJ2FQrn8m96oJx.yQ1JAKcCGB/dqhXkeEwuNHk1G16lj1W',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52012000100',
            'qualification'=>'M.Sc. Comp. Sci.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-04 11:40:19',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-04 11:40:19'
            ] );

            Faculty::create( [
            'id'=>153,
            'faculty_name'=>'Ms. Bibave Swati Ashok',
            'email'=>'swatibibave@sangamnercollege.edu.in',
            'mobile_no'=>'7719939207',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$udGk6gPFW1ZKoix/.PKh2./iNGOtdFXAg9NMMZmw7tjP1pHPhz53.',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52012000099',
            'qualification'=>'M.Sc. Comp. Sci.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-01-25 10:03:45',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-01-25 10:03:45'
            ] );

            Faculty::create( [
            'id'=>154,
            'faculty_name'=>'Ms. Khairnar Suvarna Jagannath',
            'email'=>'sjkhairnar@sangamnercollege.edu.in',
            'mobile_no'=>'9637352803',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$Um0vBp564ScVh9uTrvXY9eAzfkaVBP4yZxWCUH6Wh1bmI7R7FVMRO',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52012000104',
            'qualification'=>'M.Sc. Comp. Sci.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-02-01 05:01:25',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-02-01 05:01:25'
            ] );

            Faculty::create( [
            'id'=>155,
            'faculty_name'=>'Ms. Vikhe Ranjana Shivaji',
            'email'=>'ranjanavikhe@sangamnercollege.edu.in',
            'mobile_no'=>'9579420856',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$LreS.7.Pcpd0FQ0day1SF.3WtjwWTWWWPOZFh3bKwk0lA/WTBfixu',
            'remember_token'=>'FwnzOLvJ1HqcOHnqbMqMCxns95A7t5HllVZZLK1u16DojFSwaGsWK05zvhN8',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52012000106',
            'qualification'=>'M.Sc. Comp. Sci.',
            'role_id'=>8,
            'department_id'=>1,
            'college_id'=>63,
            'active'=>1,
            'last_login'=>'2022-08-14 11:58:18',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-08-14 11:58:18'
            ] );

            Faculty::create( [
            'id'=>156,
            'faculty_name'=>'Ms. Asawa Arti Kailaschandra',
            'email'=>'artikasawa@sangamnercollege.edu.in',
            'mobile_no'=>'9890755615',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$O.4O1vtsIx5NSGeaNYvz5.b/ApOFM4ufw5inLigZcMR8aQ/R8dZXS',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101900399',
            'qualification'=>'M.C.A. (Management)',
            'role_id'=>8,
            'department_id'=>22,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-01-28 06:46:11',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-01-28 06:46:11'
            ] );

            Faculty::create( [
            'id'=>157,
            'faculty_name'=>'Mr. Sayyad Arif Abbas',
            'email'=>'arifsayyad@sangamnercollege.edu.in',
            'mobile_no'=>'9921946097',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$YukYZJUtXzWqylpwUsDlSOgIDpBmmbL8klwjdF.ptJq7cXbixw.A6',
            'remember_token'=>'HjuTUgJgemyt2gaKdjUZriY5m7Fa8vEBV7TLc3tmuBt4yv7pwa1iEieJCGTU',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52201795149',
            'qualification'=>'M.Sc. Comp. Sci., UGC-NET',
            'role_id'=>8,
            'department_id'=>22,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-20 11:01:37',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-20 11:01:37'
            ] );

            Faculty::create( [
            'id'=>158,
            'faculty_name'=>'Ms. Satpute Prajwala Chandrabhan',
            'email'=>'pcsatpute@sangamnercollege.edu.in',
            'mobile_no'=>'7058687445',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$aMGr95/banSt2vzB8Aq2heyz9rgxkUvEIk./dMNUx68w.LA1.uO8K',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52101801471',
            'qualification'=>'M.Sc. Comp. Sci.',
            'role_id'=>8,
            'department_id'=>22,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-15 09:42:06',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-15 09:42:06'
            ] );

            Faculty::create( [
            'id'=>159,
            'faculty_name'=>'Dr. Gudade Suresh Kondaji',
            'email'=>'gudade@sangamnercollege.edu.in',
            'mobile_no'=>'9822965671',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$yrvcCKphBridg27mJPmeTejePBQm6lei4QZxajcgg/VQj.oaYMdrG',
            'remember_token'=>'erijhDFKvjKMmWZ9acr6UBbUA9B1Z4vMHDPUi3vFngaKi59LVi6FsgDAoCvY',
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52197105929',
            'qualification'=>'M.Sc.',
            'role_id'=>9,
            'department_id'=>10,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2024-01-18 13:45:17',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2024-01-18 13:45:17'
            ] );

            Faculty::create( [
            'id'=>160,
            'faculty_name'=>'Mr. Kharde Uttam Dattu',
            'email'=>'kharde@sangamnercollege.edu.in',
            'mobile_no'=>'9209293828',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$TK9NKWpNsEhMUQY040wMOudmA8ZYSIdUGOwanfP0QBFusj5bDBPnm',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'52198403363',
            'qualification'=>'M.Sc., SET',
            'role_id'=>8,
            'department_id'=>10,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2023-12-19 13:23:21',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2023-12-19 13:23:21'
            ] );

            Faculty::create( [
            'id'=>161,
            'faculty_name'=>'Ms. Chowki Qurratulain Qattal Ahmed',
            'email'=>'qachowki@sangamnercollege.edu.in',
            'mobile_no'=>'9552865259',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$YOZIHviTB736wI07ovLb8eNkHzBN7G671Ve15p8MDWUUwC8.1MPb.',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'53101800066',
            'qualification'=>'M.Sc., B.Ed., SET',
            'role_id'=>8,
            'department_id'=>10,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-07-09 08:10:54',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-07-09 08:10:54'
            ] );

            Faculty::create( [
            'id'=>162,
            'faculty_name'=>'Ms. Shaikh Mubashshera Akram',
            'email'=>'mubashsherashaikh@sangamnercollege.edu.in',
            'mobile_no'=>'8308307675',
            'email_verified_at'=>NULL,
            'password'=>'$2y$10$1JPUiBeLdGtoklc2o3A5aeqDxTlP08IDt98CBjAwJZwdLtMrDm85i',
            'remember_token'=>NULL,
            'profile_photo_path'=>NULL,
            'unipune_id'=>'53101800068',
            'qualification'=>'M.Sc., B.Ed.',
            'role_id'=>8,
            'department_id'=>10,
            'college_id'=>1,
            'active'=>1,
            'last_login'=>'2022-07-09 11:19:42',
            'created_at'=>'2021-12-10 11:21:00',
            'updated_at'=>'2022-07-09 11:19:42'
            ] );

            // fggfgfdgdgdfg

            Faculty::create( [
                'id'=>163,
                'faculty_name'=>'Dr. Bibave Shweta Sachin',
                'email'=>'shwetabibave@sangamnercollege.edu.in',
                'mobile_no'=>'9150510707',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$pnnwdoU3ANkJW/hAVBsr8u6JUd93NuKZTmfHiaq.oT2gGaMlKDQ/O',
                'remember_token'=>'p4Mg0kAx4R9k37mYwKZYxQ8z3VpIyUpDIqHM3gfVC42aqBPUKKElf4JhNewc',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'53101800059',
                'qualification'=>'M.Sc., B.Ed.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-13 06:06:05',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-13 06:06:05'
                ] );

                Faculty::create( [
                'id'=>164,
                'faculty_name'=>'Ms. Varpe Nikita Rajendra',
                'email'=>'nikitavarpe@sangamnercollege.edu.in',
                'mobile_no'=>'',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'53101800063',
                'qualification'=>'M.Sc., B.Ed.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>165,
                'faculty_name'=>'Ms. Tamboli Saniya Habib',
                'email'=>'saniyatamboli@sangamnercollege.edu.in',
                'mobile_no'=>'7498150278',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$38cP15/UK/WHeA0buvXPr.ZiSJ.aLKXgxx4TzGbuqcb1g2Ve10mri',
                'remember_token'=>'RLvKJZEVBX6tng0iV14UNu70W8MnKci5bkU02OcxzXM9tARDlRqhJlzN11iO',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'53101800064',
                'qualification'=>'M.Sc., B.Ed.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-19 10:32:53',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-19 10:32:53'
                ] );

                Faculty::create( [
                'id'=>166,
                'faculty_name'=>'Mr. Shelke Amol Jagannath',
                'email'=>'ajshelke@sangamnercollege.edu.in',
                'mobile_no'=>'9921269782',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$5w7ooMMtcmPhPhLv0SeKAOuNuGkPGUoKfKk8Kj3HyFZq3ZgzFUWxq',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52121800103',
                'qualification'=>'M.Sc., B.Ed.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2022-03-30 09:19:27',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2022-03-30 09:19:27'
                ] );

                Faculty::create( [
                'id'=>167,
                'faculty_name'=>'Ms. Shete Pallavi Sharad',
                'email'=>'psshete@sangamnercollege.edu.in',
                'mobile_no'=>'8600730937',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$lJBCoa1l5D0HLOViqkmiEe8zzqqA5qOjgooBxlu8i4q5s1jCILtGW',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52101900098',
                'qualification'=>'M.Sc. Stats.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>0,
                'last_login'=>'2022-03-23 16:13:39',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2022-12-21 06:45:43'
                ] );

                Faculty::create( [
                'id'=>168,
                'faculty_name'=>'Ms. Nivdunge Jyoti Dattatray',
                'email'=>'jyotinivdunge@sangamnercollege.edu.in',
                'mobile_no'=>'',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52042100022',
                'qualification'=>'M.Sc. Stats.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>169,
                'faculty_name'=>'Ms. Kapase Priyanka Vikas',
                'email'=>'kapasepriyanka@sangamnercollege.edu.in',
                'mobile_no'=>'8975557493',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$1QV71Cfil/iTiksa65OWiOffMU.jTmFnZQIshhmen5zt8NY96kCtG',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52042100116',
                'qualification'=>'M.Sc. Stats.',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2022-08-10 04:27:49',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2022-08-10 04:27:49'
                ] );

                Faculty::create( [
                'id'=>170,
                'faculty_name'=>'Khemnar Tukaram Thaka',
                'email'=>'khemnar@sangamnercollege.edu.in',
                'mobile_no'=>'9420756004',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$kHMo/ykswtVtWjktDIXeOezEXW3PIQEoKDPy9qs8tNzDNEOh9mHZq',
                'remember_token'=>'S1KrCtEcCu6JMTGcie6J0wY5boHF3PTfFonYTdj1SKXfMvo4xY1NGqPtHxGk',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'53201500255',
                'qualification'=>'MCM, MCA, MBA, B.Ed.',
                'role_id'=>9,
                'department_id'=>27,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-15 12:58:24',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-15 12:58:24'
                ] );

                Faculty::create( [
                'id'=>171,
                'faculty_name'=>'Ms. Aswale Swati Haribhau',
                'email'=>'aswale@sangamnercollege.edu.in',
                'mobile_no'=>'9370087226',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$xVKZ7//GiGRLzWpju5orEubBOmdCVxwsuIxknKeTI4zvVopBMZLUm',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52201690376',
                'qualification'=>'MCM, MCA',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2023-12-08 06:59:45',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2023-12-08 06:59:45'
                ] );

                Faculty::create( [
                'id'=>172,
                'faculty_name'=>'Ms. Sabale Sonali Balasaheb',
                'email'=>'sbsabale@sangamnercollege.edu.in',
                'mobile_no'=>'7620908982',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$FiKb7QsEjbLo/.5.tb4LsePpsh0.CyPkEstyN6eaGP.6DkgIaBYIO',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52201797865',
                'qualification'=>'M.C.A.',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2023-05-08 16:25:48',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2023-05-08 16:25:48'
                ] );

                Faculty::create( [
                'id'=>173,
                'faculty_name'=>'Ms. Parad Sonali Raosaheb',
                'email'=>'sonaliparad@sangamnercollege.edu.in',
                'mobile_no'=>'9623017886',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$MPE5Fc92x/f2mm9ql6uI9.gWnWIUPAPgkW6x4rpeVsZp/pfzN.QLu',
                'remember_token'=>'kLT7S8r7NfS9AJslB59s4uYClRZlYmADVIapXAXene1ynougFoYQqWARot65',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52032100349',
                'qualification'=>'M.C.A.',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-23 16:00:09',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-23 16:00:09'
                ] );

                Faculty::create( [
                'id'=>174,
                'faculty_name'=>'Mr. Shinde Tushar Sampat',
                'email'=>'tusharshinde@sangamnercollege.edu.in',
                'mobile_no'=>'8623879751',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$AMEoxyCeMvE1DhMzc4gM/.HlneJ2gJtFtnRv8vm8lVNsbtJopLydq',
                'remember_token'=>'gGFiGJDjgkwAdm5T2OzeHwJgfaWMWSEDqScqwGyvEbp0pCAyH2LF8TMTXWxh',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52071900308',
                'qualification'=>'M.C.A.',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2022-08-07 05:40:24',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2022-08-07 05:40:24'
                ] );

                Faculty::create( [
                'id'=>175,
                'faculty_name'=>'Mrs. Kulkarni Shubhangi Vijaykumar',
                'email'=>'svkulkarni@sangamnercollege.edu.in',
                'mobile_no'=>'9860080151',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                'remember_token'=>NULL,
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52201584122',
                'qualification'=>'B.Com, MBA',
                'role_id'=>9,
                'department_id'=>28,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-23 15:09:54',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-23 15:09:54'
                ] );

                Faculty::create( [
                'id'=>176,
                'faculty_name'=>'Mr. Thorat Vijay Sakharam',
                'email'=>'thorat@sangamnercollege.edu.in',
                'mobile_no'=>'',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$1dDyJXDXPlER3XUewM2u1.KoNAimxpYs1TmgXV0p5P6rnaAXXLRsq',
                'remember_token'=>'py67d0Z0nEoCuuc8jpq2WbF7Cjhuw2q4skDticd2NVcqOuoqXkCCa0dQQZC4',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'52201584337',
                'qualification'=>'B.Sc., M.B.A., SET',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-01 06:16:06',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-01 06:16:06'
                ] );

                Faculty::create( [
                'id'=>177,
                'faculty_name'=>'Mr. Kale Rajesh Bhikaji',
                'email'=>'kale@sangamnercollege.edu.in',
                'mobile_no'=>'9823739849',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$Kzs9JcVKR.48lB9PrD2sMu/2GDyJhReUsJf8JOw2IzVL5JdaaKJfG',
                'remember_token'=>'0smaGoxszw0xbVjFbRbQnQruHLrkCvQhLZBo2QQJLW5e8ax3ynCJYzXfOZvw',
                'profile_photo_path'=>NULL,
                'unipune_id'=>'53201500551',
                'qualification'=>'B.Sc., M.B.A.',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-05 12:56:55',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-05 12:56:55'
                ] );

                Faculty::create( [
                'id'=>178,
                'faculty_name'=>'Dr. Sayyad M. D.\n',
                'email'=>'drmahejabin01@gmail.com',
                'mobile_no'=>'9270633998',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9270633998',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>179,
                'faculty_name'=>'Prof. Chaudhari Y. K. \n',
                'email'=>'yashnil@kthmcollege.ac.in',
                'mobile_no'=>'9881080823',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881080823',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>180,
                'faculty_name'=>'Prof. Tawade S. S.\n',
                'email'=>'sstawade@gmail.com',
                'mobile_no'=>'8087626119',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8087626119',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>29,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>181,
                'faculty_name'=>'Prof. Chaudhari U. V.\n',
                'email'=>'choudhariuv@gmail.com',
                'mobile_no'=>'7588551837',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588551837',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>17,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>182,
                'faculty_name'=>'Dr. Pagar S. R.\n\n',
                'email'=>'sambhajipagar@gmail.com',
                'mobile_no'=>'9850399971',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9850399971',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>183,
                'faculty_name'=>'Prof. Jadhav S. P. \n',
                'email'=>'santoshjadhav5494@gmail.com',
                'mobile_no'=>'9822976823',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822976823',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>29,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>184,
                'faculty_name'=>'Prof. Brahmane S.Y.',
                'email'=>'sybrahmne@gmail.com',
                'mobile_no'=>'9922435892',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9922435892',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>185,
                'faculty_name'=>'Prof. Wagh A.  A. ',
                'email'=>'ankitawagh11790@gmail.com',
                'mobile_no'=>'9158646256',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9158646256',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>28,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>186,
                'faculty_name'=>'Prof. Malani R.  J.',
                'email'=>'rishikesh.malani@rediffmail.com',
                'mobile_no'=>'9975641367',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9975641367',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>28,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>187,
                'faculty_name'=>'Prof. Jogdand B. B.',
                'email'=>'jogdandbabasaheb@gmail.com',
                'mobile_no'=>'8329886388',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8329886388',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>23,
                'college_id'=>38,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>188,
                'faculty_name'=>'Prof. Sayyad A. A. ',
                'email'=>'sayyadfoods86@gmail.com',
                'mobile_no'=>'8446728766',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8446728766',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>23,
                'college_id'=>84,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>189,
                'faculty_name'=>'Prof. Phule  Suyog',
                'email'=>'suyogphule@gmail.com',
                'mobile_no'=>'8208713067',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8208713067',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>23,
                'college_id'=>31,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>190,
                'faculty_name'=>'Prof.  Shete S. A.',
                'email'=>'sumeetshete78@gmail.com',
                'mobile_no'=>'9689599948',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9689599948',
                'qualification'=>'',
                'role_id'=>15,
                'department_id'=>25,
                'college_id'=>102,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>191,
                'faculty_name'=>'Prof.  Jadhav A. P.',
                'email'=>'apj.sairaj12@gmail.com',
                'mobile_no'=>'7218027554',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7218027554',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>25,
                'college_id'=>18,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>192,
                'faculty_name'=>'Prof.  Dhangada J. B.',
                'email'=>'Jayeshdhangada11@gmail.com',
                'mobile_no'=>'9421347836',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9421347836',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>25,
                'college_id'=>21,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>193,
                'faculty_name'=>'Dr. Vaidya R. G.',
                'email'=>'vaidya.ravindra20@gmail.com',
                'mobile_no'=>'9623993594',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9623993594',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>56,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>194,
                'faculty_name'=>'Maid Yogesh Popat',
                'email'=>'maidyp.1983@gmail.com',
                'mobile_no'=>'9146123321',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9146123321',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>22,
                'college_id'=>82,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>195,
                'faculty_name'=>'Mr.Deokar Sushil Rangnath',
                'email'=>'sushil.deokar@gmail.com',
                'mobile_no'=>'9284179099',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9284179099',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>22,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>197,
                'faculty_name'=>'Prof. Mahale L. M.  ',
                'email'=>'mahalelalita@gmail.com',
                'mobile_no'=>'7350778994',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7350778994',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>198,
                'faculty_name'=>'Pardeshi J. H.',
                'email'=>'jayprakashpardeshi@gmail.com',
                'mobile_no'=>'9518907872',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9518907872',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>199,
                'faculty_name'=>'Dr. Dube H. V.            ',
                'email'=>'dubehvd72@gmail.com',
                'mobile_no'=>'  94230 39499',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'  94230 39499',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>200,
                'faculty_name'=>'Dr. Sakalkale M. M.',
                'email'=>' milindsakalkale68@gmail.com',
                'mobile_no'=>'8830006731',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8830006731',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>201,
                'faculty_name'=>'Shinde B.S.',
                'email'=>'bhakti.shinde@iccs.ac.in',
                'mobile_no'=>'8668918002',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>' 86689 18002',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>33,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>202,
                'faculty_name'=>'Chaudhari R.S.',
                'email'=>'kadamnehaaa@gmail.com',
                'mobile_no'=>'7972197836',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7972197836',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>204,
                'faculty_name'=>'Mrs. Jadhav S.M.',
                'email'=>'surekha.kale@pravara.in',
                'mobile_no'=>'9970742631',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9970742631',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>95,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>205,
                'faculty_name'=>'Prof.  Kukereja G. P. ',
                'email'=>'girishkukreja.ram@gmail.com',
                'mobile_no'=>'9826833317',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9826833317',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>9,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>207,
                'faculty_name'=>'Dr. Wagh B. D.',
                'email'=>'balasaheb.wagh1@gmail.com',
                'mobile_no'=>'9767314757',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9767314757',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>5,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>208,
                'faculty_name'=>'Prof. Ghaywat L. D. ',
                'email'=>'ldghaywat@gmail.com',
                'mobile_no'=>'9822814931',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822814931',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>7,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>209,
                'faculty_name'=>'Prof. Khule S. K.',
                'email'=>'santoshkhule11@gmail.com',
                'mobile_no'=>'8805236464',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8805236464',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>2,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>210,
                'faculty_name'=>'Dr. Khilare S. K. ',
                'email'=>'shashi.khilare@gmail.com',
                'mobile_no'=>'7020379773',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7020379773',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>73,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>211,
                'faculty_name'=>'Prof. Thorat S. K. ',
                'email'=>'sukdeothorat@gmail.com',
                'mobile_no'=>'9860503940',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860503940',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>9,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>212,
                'faculty_name'=>'Prof. Pande V. R. ',
                'email'=>'vijaykumarpande111@gmail.com',
                'mobile_no'=>'8657956994',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8657956994',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>213,
                'faculty_name'=>'Prof. Deshmukh S. S.',
                'email'=>'deshmukhss1982@gmail.com',
                'mobile_no'=>'9860080782',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860080782',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>6,
                'college_id'=>66,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>214,
                'faculty_name'=>'Prof. Pokale A. L. ',
                'email'=>'abasahebpokale@gmail.com',
                'mobile_no'=>'9922363287',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9922363287',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>215,
                'faculty_name'=>'Prof.Talule S. S.  ',
                'email'=>'sstalule2006@gmail.com',
                'mobile_no'=>'7588029930',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588029930',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>59,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>216,
                'faculty_name'=>'Prof.Kashid P. R.     ',
                'email'=>'prashantrkashid@gmail.com',
                'mobile_no'=>'9860334519',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860334519',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>217,
                'faculty_name'=>'Prof. Thakare M. V.          ',
                'email'=>'m12thakare@gmail.com',
                'mobile_no'=>'9970805834',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9970805834',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>218,
                'faculty_name'=>'Prof. Thube A. R.',
                'email'=>'amol.thube1411@gmail.com',
                'mobile_no'=>'8796922723',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8796922723',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>2,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>219,
                'faculty_name'=>'Prof. Khamkar S. B.',
                'email'=>'santoshkhmkr@gmail.com',
                'mobile_no'=>'9960883724',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9960883724',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>220,
                'faculty_name'=>'Prof. Lohia Lakhan ',
                'email'=>'lohiya.lakhan@gmail.com',
                'mobile_no'=>'9156574316',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9156574316',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>28,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>221,
                'faculty_name'=>'Dr. Bankar Nilesh',
                'email'=>'nileshbankar191857@gmail.com',
                'mobile_no'=>'9860541857',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860541857',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>68,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>222,
                'faculty_name'=>'Dr. Tamboli Mohosin',
                'email'=>'mohasinat@gmail.com',
                'mobile_no'=>'9766010560',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9766010560',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>68,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>223,
                'faculty_name'=>'Prof. Kalantri Gopal ',
                'email'=>'i.gkalantri@gmail.com',
                'mobile_no'=>'8698420175',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8698420175',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>28,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>224,
                'faculty_name'=>'Dr. Wawale S. G. ',
                'email'=>'surendrawawale@gmail.com',
                'mobile_no'=>'8055201400',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8055201400',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>225,
                'faculty_name'=>'Prof. Gaikwad P. M. ',
                'email'=>'gaikwadpm70@gmail.com',
                'mobile_no'=>'9922435893',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9922435893',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>226,
                'faculty_name'=>'Dr. Hunnargikar L. V.',
                'email'=>'leenavh@gmail.com',
                'mobile_no'=>'9423062979',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423062979',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>20,
                'college_id'=>32,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>227,
                'faculty_name'=>'Dr. Kashide R. T. ',
                'email'=>'r.t.kashide@gmail.com',
                'mobile_no'=>'9921931004',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9921931004',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>62,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>228,
                'faculty_name'=>'Prof. Gavande J. V. ',
                'email'=>'gavandejagan8@gmail.com',
                'mobile_no'=>'9881328186',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881328186',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>19,
                'college_id'=>81,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>229,
                'faculty_name'=>'Prof. Dagade CA Devendra',
                'email'=>'devsnjb@gmail.com',
                'mobile_no'=>'7588858296',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588858296',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>89,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>230,
                'faculty_name'=>'Prof. Malani R. J.',
                'email'=>'malanirishikesh@gmail.com',
                'mobile_no'=>'7972612563',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7972612563',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>28,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>231,
                'faculty_name'=>'Prof. Gaikar S. P.',
                'email'=>'sunilgaikar101@gmail.com',
                'mobile_no'=>'8805151306',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8805151306',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>54,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>232,
                'faculty_name'=>'Dr. Patil Ganesh ',
                'email'=>'patilganesh3747@gmail.com',
                'mobile_no'=>'9423129390',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423129390',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>233,
                'faculty_name'=>'Prof. Wadghule N. D.',
                'email'=>'nishantwadghule01@gmail.com',
                'mobile_no'=>'9595772503',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9595772503',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>26,
                'college_id'=>52,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>234,
                'faculty_name'=>'Prof. Patole V. M.',
                'email'=>'vijaypatole555@gmail.com',
                'mobile_no'=>'9881631379',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881631379',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>44,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>235,
                'faculty_name'=>'Mr. Chaudhari Sachin',
                'email'=>'sunriseholidays12@yahoo.in',
                'mobile_no'=>'9552510001',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9552510001',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>23,
                'college_id'=>92,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>236,
                'faculty_name'=>'Prof. Daspute R. A.',
                'email'=>'ravi10pute@rediffmail.com',
                'mobile_no'=>'9096640651',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9096640651',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>25,
                'college_id'=>20,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>237,
                'faculty_name'=>'Prof. Hase S. R.',
                'email'=>'hasesir2009@gmail.com',
                'mobile_no'=>'9762830423',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9762830423',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>22,
                'college_id'=>88,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>238,
                'faculty_name'=>'Prof.Kalan Harish Dilip',
                'email'=>'harishkalan@gmail.com',
                'mobile_no'=>'96898 12323',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'96898 12323',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>22,
                'college_id'=>82,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>239,
                'faculty_name'=>'Dr. Naik R. R.',
                'email'=>'ramesh.naik31@yahoo.com',
                'mobile_no'=>'9890750779',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9890750779',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>22,
                'college_id'=>25,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>240,
                'faculty_name'=>'Prof. Sahane P. P.',
                'email'=>'pranitaagricos@gmail.com',
                'mobile_no'=>'8600301329',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8600301329',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>24,
                'college_id'=>18,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>241,
                'faculty_name'=>'Prof. Kad M. S.',
                'email'=>'meenal.parhad@gmail.com',
                'mobile_no'=>'9011231229',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9011231229',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>24,
                'college_id'=>43,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>242,
                'faculty_name'=>'Prof. Gaikwad S. B. ',
                'email'=>'swapnagaikwad41@gmail.com',
                'mobile_no'=>'9766980796',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9766980796',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>24,
                'college_id'=>19,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>243,
                'faculty_name'=>'Dr. Nerpagar D. J.',
                'email'=>'dnerpagar@gmail.com',
                'mobile_no'=>'9423258767',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423258767',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>24,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>244,
                'faculty_name'=>'Prof. Kakhandki K. S.',
                'email'=>'kavitakakhandki@gmail.com',
                'mobile_no'=>'9730791267',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9730791267',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>48,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>245,
                'faculty_name'=>'Prof. Pote K. M.',
                'email'=>'kmp147@gmail.com',
                'mobile_no'=>'9765646394',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9765646394',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>41,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>246,
                'faculty_name'=>'Prof.  Apte Somnath',
                'email'=>'somnathapte@yahoo.in',
                'mobile_no'=>'9890711744',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9890711744',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>22,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>247,
                'faculty_name'=>'Dr. Beldar Tejesh',
                'email'=>'tejeshbeldar143@gmail.com',
                'mobile_no'=>'9423226440',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423226440',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>42,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>248,
                'faculty_name'=>'Dr. Dalimbe S. N.',
                'email'=>'dalimbe@gmail.com',
                'mobile_no'=>'9822629151',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822629151',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>115,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>249,
                'faculty_name'=>'Dr. Wani B. .K. ',
                'email'=>'babakwani@gmail.com',
                'mobile_no'=>'9021602524',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9021602524',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>250,
                'faculty_name'=>'Prof.  Kulkarni R. H.',
                'email'=>'revahkulkarni@gmail.com',
                'mobile_no'=>'8319053615',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8319053615',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>20,
                'college_id'=>23,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>252,
                'faculty_name'=>'Dr. Nawale P. B. ',
                'email'=>'drpamakadam@gmial.com',
                'mobile_no'=>'988114979',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'988114979',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>253,
                'faculty_name'=>'Dr.  Deshmukh Ganesh',
                'email'=>'grdeshmukh2009@rediffmail.com',
                'mobile_no'=>'9421471669',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9421471669',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>254,
                'faculty_name'=>'Dr. Mohate Sunil ',
                'email'=>'sunil.mohate1975@gmail.com',
                'mobile_no'=>'9370259895',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9370259895',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>255,
                'faculty_name'=>'Dr. Jadhav kiran',
                'email'=>'skirjad74@gmail.com',
                'mobile_no'=>'9890814748',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9890814748',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>18,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>256,
                'faculty_name'=>'Prof. Jadhav H. A.',
                'email'=>'haridasjadhav74@gmail.com',
                'mobile_no'=>'9096325522',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9096325522',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>17,
                'college_id'=>51,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>257,
                'faculty_name'=>'Prof. Pawar B. M. ',
                'email'=>'pawarbaban1@gmail.com',
                'mobile_no'=>'9960974037',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9960974037',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>17,
                'college_id'=>3,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>258,
                'faculty_name'=>'Prof. Dhamane S. P. ',
                'email'=>'suvarnadhamane@kthmcollege.ac.in',
                'mobile_no'=>'9881914548',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881914548',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>17,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>259,
                'faculty_name'=>'Prof. Patil Manoj',
                'email'=>'akshymanoj@gmail.com',
                'mobile_no'=>'9970544101',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9970544101',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>21,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>260,
                'faculty_name'=>'Dr. Bhosale Krantigeeta',
                'email'=>'krantigeeta2020@gmail.com',
                'mobile_no'=>'7768096654',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7768096654',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>21,
                'college_id'=>80,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>261,
                'faculty_name'=>'Dr. Nanvare',
                'email'=>'rdnan25@gmail.com',
                'mobile_no'=>'9822980244',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822980244',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>12,
                'college_id'=>3,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>262,
                'faculty_name'=>'Dr. Ahire M. M.',
                'email'=>'milindahire7@gmail.com',
                'mobile_no'=>'9975658364',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9975658364',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>48,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>263,
                'faculty_name'=>'Dr. Balate B. B.',
                'email'=>'bharati_balte@rediffmail.com',
                'mobile_no'=>'9422058703',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9422058703',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>20,
                'college_id'=>80,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>264,
                'faculty_name'=>'Dr. Wable A. S.',
                'email'=>'anil.wable@pravara.in',
                'mobile_no'=>'7588606012',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588606012',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>5,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>265,
                'faculty_name'=>'Dr. Tapale B. K. ',
                'email'=>'bktapale@rediffmail.com',
                'mobile_no'=>'9860924147',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860924147',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>7,
                'college_id'=>3,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>266,
                'faculty_name'=>'Dr. Yawale Pravin',
                'email'=>'yawalepravin@yahoo.co.in',
                'mobile_no'=>'9860392952',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860392952',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>2,
                'college_id'=>12,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>267,
                'faculty_name'=>'Dr. Kudekar S. B. ',
                'email'=>'sbkudekar25@gmail.com',
                'mobile_no'=>'9766692525',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9766692525',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>10,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>268,
                'faculty_name'=>'Dr. Datir Ashok ',
                'email'=>'ashokdatir526@gmail.com',
                'mobile_no'=>'9420945628',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9420945628',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>269,
                'faculty_name'=>'Prof. Kadlag S. D. ',
                'email'=>'kadlagsd@gmail.com',
                'mobile_no'=>'9421552706',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9421552706',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>3,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>270,
                'faculty_name'=>'Prof. Kasar S. D.',
                'email'=>'sandeshkasar2012@gmail.com',
                'mobile_no'=>'9404696296',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9404696296',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>6,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>271,
                'faculty_name'=>'Dr. Dixit Madhuri ',
                'email'=>'mmd_pune@yahoo.com',
                'mobile_no'=>'9423586348',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423586348',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>66,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>272,
                'faculty_name'=>'Prof. Galande C. S.',
                'email'=>'csgalande73@gmail.com',
                'mobile_no'=>'9975397749',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9975397749',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>273,
                'faculty_name'=>'Mr. Shaikh T. N.',
                'email'=>'tousi1987@gmail.com',
                'mobile_no'=>'9823383286',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9823383286',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>274,
                'faculty_name'=>'Dr. Varade Prabhakar',
                'email'=>'psvarade1@gmail.com',
                'mobile_no'=>'9822856527',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822856527',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>49,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>275,
                'faculty_name'=>'Prof. Tambe R. R.',
                'email'=>'rajashri.tambe@pravara.in',
                'mobile_no'=>'8087142815',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8087142815',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>95,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>276,
                'faculty_name'=>'Prof. Wani S.T.',
                'email'=>'sanjay.wani@pravara.in',
                'mobile_no'=>'9960527820',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9960527820',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>95,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>277,
                'faculty_name'=>'Prof. Ghogare A.S.',
                'email'=>'archana.ghogare@pravara.in',
                'mobile_no'=>'9403543331',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9403543331',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>1,
                'college_id'=>95,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>278,
                'faculty_name'=>'Dr. Ranpise B. D. ',
                'email'=>'branpise07@gmail.com',
                'mobile_no'=>'7020725600',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7020725600',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>279,
                'faculty_name'=>'Dr.  Borate Sudhir',
                'email'=>'sb07pk@gmail.com',
                'mobile_no'=>'7588382870',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588382870',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>71,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>280,
                'faculty_name'=>'Prof. Aswale S. R.',
                'email'=>'asawalesantosh123@gmail.com',
                'mobile_no'=>'9666151298',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9666151298',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>3,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>281,
                'faculty_name'=>'Prof. Aher V. V. ',
                'email'=>'virendraaher@gmail.com',
                'mobile_no'=>'9405615230',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9405615230',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>61,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>283,
                'faculty_name'=>'Dr. Kotkar V. G. ',
                'email'=>'vishkotkar@gmail.com',
                'mobile_no'=>'9604669317',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9604669317',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>284,
                'faculty_name'=>'Dr. Sudam Shinde',
                'email'=>'shindesudam1@gmail.com',
                'mobile_no'=>'9284736527',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9284736527',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>79,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>285,
                'faculty_name'=>'Prof.  Sethiya Mahavir',
                'email'=>'mahavirshetiya@gmail.com',
                'mobile_no'=>'9730472993',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9730472993',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>28,
                'college_id'=>79,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>286,
                'faculty_name'=>'Prof. Patil Ravindra \n  ',
                'email'=>'ravi_patil111@rediffmail.com',
                'mobile_no'=>'9960423212',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9960423212',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>75,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>287,
                'faculty_name'=>'Prof. Nimbalkar S. S. \n  ',
                'email'=>'ssnimbalkar@gmail.com',
                'mobile_no'=>'9011542746',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9011542746',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>288,
                'faculty_name'=>'Prof. Vaidya S. S.',
                'email'=>'vaidyasupriya3493@gmail.com',
                'mobile_no'=>'7744932336',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7744932336',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>289,
                'faculty_name'=>'Prof. Chandratre Y. V.\n',
                'email'=>'cyogiraj@gmail.com',
                'mobile_no'=>'9404245561',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9404245561',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>27,
                'college_id'=>15,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>291,
                'faculty_name'=>'Dr. Gadgil M. R.',
                'email'=>'mugdha.gb@gmail.com',
                'mobile_no'=>'9970057062',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9970057062',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>20,
                'college_id'=>83,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>292,
                'faculty_name'=>'Dr. Joshi A. V.',
                'email'=>'anaghaj2002@gmail.com',
                'mobile_no'=>'9850642768',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9850642768',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>20,
                'college_id'=>16,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>293,
                'faculty_name'=>'Dr. Undre Baliram Dadarao',
                'email'=>'undre.baliram@gmail.com',
                'mobile_no'=>'9403726342',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9403726342',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>59,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>294,
                'faculty_name'=>'Dr. Mante V.B.',
                'email'=>'vbmante@gmail.com',
                'mobile_no'=>'8788985520',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8788985520',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>69,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>295,
                'faculty_name'=>'Dr.  Salalkar Rajendra',
                'email'=>'rajsalalkar07@gmail.com',
                'mobile_no'=>'9822864125',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822864125',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>12,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>296,
                'faculty_name'=>'Dr. Achary',
                'email'=>'drsayli.achary.gmail.com',
                'mobile_no'=>'8421382083',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8421382083',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>32,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>297,
                'faculty_name'=>'Dr. Salunkhe S.S.',
                'email'=>'sashishinde2303@gmail.com',
                'mobile_no'=>'9975367890',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9975367890',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>13,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>298,
                'faculty_name'=>'Prof. Satpute M.R.',
                'email'=>'satputeminesh8@gmail.com',
                'mobile_no'=>'8888225532',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8888225532',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>13,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>299,
                'faculty_name'=>'Dr.  Wadekar Sudhir',
                'email'=>'wadekar.sudhir@gmail.com',
                'mobile_no'=>'9420335162',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9420335162',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>5,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>300,
                'faculty_name'=>'Dr.  Syyad Yasin',
                'email'=>'yasinsayyad1970@gmail.com',
                'mobile_no'=>'9423387997',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423387997',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>2,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>301,
                'faculty_name'=>'Dr.  Gaikwad Sanjay',
                'email'=>'politics151971@gmail.com',
                'mobile_no'=>'9527239905',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9527239905',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>34,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>302,
                'faculty_name'=>'Prof.  Nabde Vilas',
                'email'=>'vilas.nabde@gmail.com',
                'mobile_no'=>'9960615560',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9960615560',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>5,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>303,
                'faculty_name'=>'Prof.  More Seema',
                'email'=>'seemamore523@gmail.com',
                'mobile_no'=>'7387843710',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7387843710',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>304,
                'faculty_name'=>'Dr. Deshmukh S.H.',
                'email'=>'shrikant.deshmukh040@gmail.com',
                'mobile_no'=>'9096695675',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9096695675',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>65,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>305,
                'faculty_name'=>'Dr Karande Shahaji',
                'email'=>'shahaji_karande@rediffmail.com',
                'mobile_no'=>'9421105729',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9421105729',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>97,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>306,
                'faculty_name'=>'Dr.  Menon S.R.',
                'email'=>'sunithamenon12@gmail.com',
                'mobile_no'=>'9823024285',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9823024285',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>32,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>307,
                'faculty_name'=>'Dr. Binnor Sharad',
                'email'=>'sharadbinnor@gmail.com',
                'mobile_no'=>'9850100253',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9850100253',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>308,
                'faculty_name'=>'Dr. Shinde Smita',
                'email'=>'smitashinde11683@gmail.com',
                'mobile_no'=>'9822922651',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822922651',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>29,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>309,
                'faculty_name'=>'Dr. Amle B.B.  ',
                'email'=>'aba292005@gmail.com',
                'mobile_no'=>'9423750372',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423750372',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>310,
                'faculty_name'=>'Mr.Gujar S.D.',
                'email'=>'santooshgujar@gmail.com',
                'mobile_no'=>'9130072526',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9130072526',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>311,
                'faculty_name'=>'Dr.  Kandekar Avinash',
                'email'=>'avikandekar@gmail.com',
                'mobile_no'=>'9881234502',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881234502',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>83,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>312,
                'faculty_name'=>'Dr. Nikam  C.M.',
                'email'=>'cmnikam71@gmail.com',
                'mobile_no'=>'9423257159',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423257159',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>45,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>313,
                'faculty_name'=>'Prof. Thokal  ASHOK',
                'email'=>'ashokthokal@gmail.com',
                'mobile_no'=>'9130046337',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9130046337',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>57,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>314,
                'faculty_name'=>'Dr. Pathare Anil',
                'email'=>'anilkumar_pathare@yahoo.com',
                'mobile_no'=>'8788473466',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8788473466',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>74,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>315,
                'faculty_name'=>'Prof.  Deshmukh Pragati ',
                'email'=>'dpragati30@gmail.com',
                'mobile_no'=>'9096244069',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9096244069',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>14,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>316,
                'faculty_name'=>'Dr.  Borude Sharad',
                'email'=>'sharadborude@gmail.com',
                'mobile_no'=>'7972930997',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7972930997',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>5,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>317,
                'faculty_name'=>'Dr. Pawar R.S.',
                'email'=>'rajendra_pawar2007@yahoo.co.in',
                'mobile_no'=>'9011723010',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9011723010',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>318,
                'faculty_name'=>'Dr.   Chavan Ganesh',
                'email'=>'gc.geography@gmail.com',
                'mobile_no'=>'9766768082',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9766768082',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>36,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>319,
                'faculty_name'=>'Dr. Pusate Vaishali ',
                'email'=>'vaishalitp@gmail.com',
                'mobile_no'=>'9892159011',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9892159011',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>7,
                'college_id'=>77,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>320,
                'faculty_name'=>'Prof. Bhalsingh D.G.',
                'email'=>'dilipbhalsingh@gmail.com',
                'mobile_no'=>'9423750929',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423750929',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>7,
                'college_id'=>27,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>321,
                'faculty_name'=>'Prof. Shelar D.S.',
                'email'=>'dipakshelar27@gmail.com',
                'mobile_no'=>'9403620178',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9403620178',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>2,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>322,
                'faculty_name'=>'Dr.  Mhaske Shrikant',
                'email'=>'maske.shrikantmadan@gmail.com',
                'mobile_no'=>'8806738378',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8806738378',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>2,
                'college_id'=>86,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>323,
                'faculty_name'=>'Prof. Jagtap R.R',
                'email'=>'rrjmaths@gmail.com',
                'mobile_no'=>'9970268198',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9970268198',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>73,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>324,
                'faculty_name'=>'Prof. Momale P.S',
                'email'=>'psmomale@gmail.com',
                'mobile_no'=>'9637338928',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9637338928',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>10,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>325,
                'faculty_name'=>'Prof. Karanjekar A.N.',
                'email'=>'ajitkaranjekar@gmail.com',
                'mobile_no'=>'8308253503',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$S6hP6fwc8yNhgPNNuzgPD.292mkAegsHL7HCJ5ipwn/zdJ8AjfDiO',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8308253503',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>1,
                'active'=>1,
                'last_login'=>'2024-01-25 04:46:48',
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2024-01-25 04:46:48'
                ] );

                Faculty::create( [
                'id'=>326,
                'faculty_name'=>'Dr. Ralegankar S.D.',
                'email'=>'sdralegankar@gmail.com',
                'mobile_no'=>'9371357069',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9371357069',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>5,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>327,
                'faculty_name'=>'Dr. Gawande A.B.',
                'email'=>'gawandeab@gmail.com',
                'mobile_no'=>'9404689773',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9404689773',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>37,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>328,
                'faculty_name'=>'Dr.  Zate M.K.',
                'email'=>'manoharzate@gmail.com',
                'mobile_no'=>'9975632732',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9975632732',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>53,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>329,
                'faculty_name'=>'Dr. Shelke P.B.',
                'email'=>'shelke.pradip@gmail.com',
                'mobile_no'=>'9422226924',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9422226924',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>5,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>330,
                'faculty_name'=>'Prof.  Gunjal V.B.',
                'email'=>'gunjalvijayshree24@gmail.com',
                'mobile_no'=>'7083754214',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7083754214',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>53,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>331,
                'faculty_name'=>'Dr. Kadam S.L.',
                'email'=>'slkadam2010@gmail.com',
                'mobile_no'=>'9423463540',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423463540',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>57,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>332,
                'faculty_name'=>'Dr. Uphade B.K.',
                'email'=>'bhagwatuphade@gmail.com',
                'mobile_no'=>'9422741036',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9422741036',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>6,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>333,
                'faculty_name'=>'Dr. Takate S.J.',
                'email'=>'sjtakate@gmail.com',
                'mobile_no'=>'7588604199',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588604199',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>334,
                'faculty_name'=>'Dr. Ahire D. D.',
                'email'=>'digambar12@rediffmail.com',
                'mobile_no'=>'9834935502',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9834935502',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>5,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>335,
                'faculty_name'=>'Dr. Mahadev B. Kanade',
                'email'=>'mahadevkanade1@gmail.com',
                'mobile_no'=>'9881195196',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881195196',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>5,
                'college_id'=>93,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>336,
                'faculty_name'=>'Dr. Gahile Yogesh',
                'email'=>'yogeshgahile@gmail.com',
                'mobile_no'=>'9552559397',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9552559397',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>5,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>337,
                'faculty_name'=>'Prof. Sakhala S.R.\n',
                'email'=>'sakhala.swapnil0@gmail.com',
                'mobile_no'=>'9823982065',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9823982065',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>338,
                'faculty_name'=>'Mrs.Trupti Deore',
                'email'=>'trupti.deore@gmail.com',
                'mobile_no'=>'9403211690',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9403211690',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>37,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>339,
                'faculty_name'=>'Dr. Rekha Kadhane',
                'email'=>'rekhakadhne@gmail.com',
                'mobile_no'=>'9860149323',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9860149323',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>3,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>340,
                'faculty_name'=>'Dr. Wakchaure R.N.  ',
                'email'=>'rajaramwakchare@gmail.com',
                'mobile_no'=>'9922278435',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9922278435',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>85,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>341,
                'faculty_name'=>'Prof. Deshmukh M.M.',
                'email'=>'mahesh_m_deshmukh@yahoo.com',
                'mobile_no'=>'7972547497',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7972547497',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>90,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>342,
                'faculty_name'=>'Dr. Gundur Nissim   , Professor & Chairman',
                'email'=>'seegundur@gmail.com',
                'mobile_no'=>'9036564522',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9036564522',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>98,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>343,
                'faculty_name'=>'Prof. Dr. Chougule Ramesh',
                'email'=>'drrbchougule@yahoo.com',
                'mobile_no'=>'9423717774',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423717774',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>72,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>344,
                'faculty_name'=>'Dr. Deore D.B.',
                'email'=>'deoredinesh@gmail.com',
                'mobile_no'=>'9511674186',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9511674186',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>14,
                'college_id'=>11,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>345,
                'faculty_name'=>'Dr. Santosh Waghmare ',
                'email'=>'santosh.waghmare79@gmail.com',
                'mobile_no'=>'9765614507',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9765614507',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>57,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>346,
                'faculty_name'=>'Dr.  Rahane Shobha',
                'email'=>'shobharahane81@gmail.com',
                'mobile_no'=>'9881176400',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881176400',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>16,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>348,
                'faculty_name'=>'Prof. Dighe N.D.',
                'email'=>'nanadighe1988@gmail.com',
                'mobile_no'=>'7350506950',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7350506950',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>17,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>349,
                'faculty_name'=>'Prof. Inamdar T.A.',
                'email'=>'sultan7inamdar@gmail.com',
                'mobile_no'=>'7385325080',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7385325080',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>17,
                'college_id'=>50,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>350,
                'faculty_name'=>'DR. Tonde B.S.',
                'email'=>'babatonde12@gnail.com',
                'mobile_no'=>'9850640704',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9850640704',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>73,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>351,
                'faculty_name'=>'Prof. Nipunge N.S.',
                'email'=>'nitinnipunge@gmail.com',
                'mobile_no'=>'9922194849',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9922194849',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>56,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>352,
                'faculty_name'=>'Dr. Sonawane M.B.',
                'email'=>'manishbsonawane@gmail.com',
                'mobile_no'=>'7588007249',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588007249',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>17,
                'college_id'=>46,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>353,
                'faculty_name'=>'Dr. Dhorde Anargha',
                'email'=>'anarghawakhare@gmail.com',
                'mobile_no'=>'9881370447',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881370447',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>55,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>354,
                'faculty_name'=>'Prof. Naikwadi Manisha',
                'email'=>'manishanaikwadi90@gmail.com',
                'mobile_no'=>'9552320315',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9552320315',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>4,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>355,
                'faculty_name'=>'Dr. Chaudhari  C.B.',
                'email'=>'cbchaudhari.1576@rediffmail.com',
                'mobile_no'=>'9405371579',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9405371579',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>73,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>356,
                'faculty_name'=>'Dr. Ghungarde D.S.',
                'email'=>'dsghungarde@gmail.com',
                'mobile_no'=>'9822572733',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822572733',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>64,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>357,
                'faculty_name'=>'Dr. Landage A.A.',
                'email'=>'anilandge77@yahoo.com',
                'mobile_no'=>'9890522445',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9890522445',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>358,
                'faculty_name'=>'Dr. Gadekar D.J.',
                'email'=>'deepak.gadekar007@gmai.com',
                'mobile_no'=>'9921462014',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9921462014',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>63,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>359,
                'faculty_name'=>'Prof.  Kadam Yogesh',
                'email'=>'yogesh.kadam97@gmail.com',
                'mobile_no'=>'9561735339',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9561735339',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>360,
                'faculty_name'=>'Dr. Sangale S.B.',
                'email'=>'sanjaysangale123@gmail.com',
                'mobile_no'=>'9426287473',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9426287473',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>15,
                'college_id'=>73,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>361,
                'faculty_name'=>'Dr. Salunkhe O.R.',
                'email'=>'onkarsalunke@yahoo.com',
                'mobile_no'=>'9479542668',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9479542668',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>67,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>362,
                'faculty_name'=>'Dr.  Bhalla Resham',
                'email'=>'dr.resham.bhalla@gmail.com',
                'mobile_no'=>'7588133244',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7588133244',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>7,
                'college_id'=>40,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>363,
                'faculty_name'=>'Prof. Dr. Deshmukh D.R.',
                'email'=>'deshmukhdnyan@gmail.com',
                'mobile_no'=>'9423141506',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423141506',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>7,
                'college_id'=>70,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>364,
                'faculty_name'=>'Dr  Deore Madhavrao',
                'email'=>'deoremadhav63@gmail.com',
                'mobile_no'=>'9403031329',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9403031329',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>39,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>365,
                'faculty_name'=>'Dr. Deore V.P.',
                'email'=>'vijaydeore66@gmail.com',
                'mobile_no'=>'9420682728',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9420682728',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>56,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>366,
                'faculty_name'=>'Dr. Dhakane S.F.',
                'email'=>'dhakanesf@gmail.com',
                'mobile_no'=>'9421038332',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9421038332',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>3,
                'college_id'=>6,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>367,
                'faculty_name'=>'Prof. Suryawanshi M.B.',
                'email'=>'manjoosha28@gmail.com',
                'mobile_no'=>'8087986846',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8087986846',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>6,
                'college_id'=>32,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>368,
                'faculty_name'=>'Dr. Shelke S.N.',
                'email'=>'snshelke@yahoo.co.in',
                'mobile_no'=>'8888199853',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'8888199853',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>6,
                'college_id'=>73,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>369,
                'faculty_name'=>'Dr. Mhaske P.C.',
                'email'=>'mhaskepc18@gmail.com',
                'mobile_no'=>'9850577751',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9850577751',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>6,
                'college_id'=>87,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>370,
                'faculty_name'=>'Prof. Jadhav A.M.',
                'email'=>'anil1981jadhav@gmail.com',
                'mobile_no'=>'9822780918',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9822780918',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>58,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>371,
                'faculty_name'=>'Dr. Sangale M.D.',
                'email'=>'mdsangale@gmail.com',
                'mobile_no'=>'9423755295',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9423755295',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>91,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>372,
                'faculty_name'=>'Dr.  Shinde D.R.',
                'email'=>'drshindechemistry1970@gmail.com',
                'mobile_no'=>'9881350383',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9881350383',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>76,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>373,
                'faculty_name'=>'Asst. Prof. Giri M.S.',
                'email'=>'manishagiri84@gmail.com',
                'mobile_no'=>'7758074444',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7758074444',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>30,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>374,
                'faculty_name'=>'Dr.  Lipare Kishor',
                'email'=>'kishorwcs2020@gmail.com',
                'mobile_no'=>'7447802829',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'7447802829',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>94,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>375,
                'faculty_name'=>'Dr. Nikam V.B.',
                'email'=>'vijaybthakur@gmail.com',
                'mobile_no'=>'9922153111',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9922153111',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>91,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>376,
                'faculty_name'=>'Prof Nikam A.S.',
                'email'=>'ashishnikam1988@gmail.com',
                'mobile_no'=>'9850042742',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9850042742',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>8,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>377,
                'faculty_name'=>'Prof. Shaikh S.T.',
                'email'=>'shoyabshaikh90@gmail.com',
                'mobile_no'=>'9595846464',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9595846464',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>78,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>378,
                'faculty_name'=>'Prof.  Salake Sunil (Industrial Economics)',
                'email'=>'salkesunilr@gmail.com',
                'mobile_no'=>'9545449518',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9545449518',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>11,
                'college_id'=>47,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>379,
                'faculty_name'=>'Prof. Doibale M.S.',
                'email'=>'meena.doibale@gmail.com',
                'mobile_no'=>'9970932974',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9970932974',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>13,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                Faculty::create( [
                'id'=>380,
                'faculty_name'=>'Madhavi Avhankar',
                'email'=>'madhavi.avhankar@iccs.ac.in',
                'mobile_no'=>'9823549423',
                'email_verified_at'=>NULL,
                'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                'remember_token'=>'',
                'profile_photo_path'=>'',
                'unipune_id'=>'9823549423',
                'qualification'=>'',
                'role_id'=>8,
                'department_id'=>30,
                'college_id'=>33,
                'active'=>1,
                'last_login'=>NULL,
                'created_at'=>'2021-12-10 11:21:00',
                'updated_at'=>'2021-11-26 14:37:00'
                ] );

                // fggfgfdgdgdfg

                Faculty::create( [
                    'id'=>381,
                    'faculty_name'=>'Prof.Panchariya S.O.',
                    'email'=>'panchariya@sangamnercollege.edu.in',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$lXjlQOklpBeSHb9dRM2.nubiROu3uhegrCMMWJCAXPwJZkWBq78SS',
                    'remember_token'=>'t3eGssj18cj6TR5KNMLTTEbr86ugRSV0QkCjDxA1JEBDkBc27bWsY9aGuaF4',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. ',
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-19 10:31:38',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-19 10:31:38'
                    ] );

                    Faculty::create( [
                    'id'=>382,
                    'faculty_name'=>'Prof. Pathan S. H.',
                    'email'=>'samrinpathan@sangamnercollege.edu.in',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$mC.gf4xMMr.q.MSewY.7je/Ho22/q2rghE2x2c6iuz9do9gDcKMhm',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'M.Sc., SET',
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-07-30 06:57:24',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-07-30 06:57:24'
                    ] );

                    Faculty::create( [
                    'id'=>383,
                    'faculty_name'=>'Prof. Kadam P. A.',
                    'email'=>'pranitakadam1412@gmail.com',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>' ',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>384,
                    'faculty_name'=>'Dr. Gholap A. R.',
                    'email'=>'adigholap2011@gmail.com',
                    'mobile_no'=>'9689833955',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com',
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>96,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>385,
                    'faculty_name'=>'Prof. Sable Bipin',
                    'email'=>'sablebipin@gmail.com',
                    'mobile_no'=>'9975436758',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., NET, SET, GDC&A',
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>35,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>386,
                    'faculty_name'=>'Prof. Chine G. V.\r\n',
                    'email'=>'gvchine@sangamnercollege.edu.in',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.A., NET, Ph.D.',
                    'role_id'=>13,
                    'department_id'=>12,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>387,
                    'faculty_name'=>'Dr. Gandhare D. K.',
                    'email'=>'gandhare7@gmail.com',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.A., NET, Ph.D.',
                    'role_id'=>13,
                    'department_id'=>12,
                    'college_id'=>3,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>388,
                    'faculty_name'=>'Prof. Tambe D. D.',
                    'email'=>'deepatambe25513@gmail.com',
                    'mobile_no'=>'9767698582',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'8888225532',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>13,
                    'college_id'=>96,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>389,
                    'faculty_name'=>'Dr. Kasar Rohini',
                    'email'=>'rohinikasar108@gmail.com',
                    'mobile_no'=>'8669029203',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.A.',
                    'role_id'=>11,
                    'department_id'=>14,
                    'college_id'=>7,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>390,
                    'faculty_name'=>'Dr. Patil Satyajit',
                    'email'=>'satyajitpatil76@gmail.com',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.A.',
                    'role_id'=>11,
                    'department_id'=>14,
                    'college_id'=>66,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>391,
                    'faculty_name'=>'Dr. Kolhe V. S.',
                    'email'=>'vilaskolhe65@gmail.com',
                    'mobile_no'=>'9421438084',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52196405948',
                    'qualification'=>'M.A.',
                    'role_id'=>11,
                    'department_id'=>14,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>392,
                    'faculty_name'=>'Prof. Bhosale D. M.',
                    'email'=>'dipalimbhosale@sangamnercollege.edu.in',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$wLJxXp/ULk.kFmoQjBVhQuhLsHLxcBkgV.2BjRXTzFAxPuTcm59jO',
                    'remember_token'=>'7Tf0elLyKS1VSyLXIjg9SuRUrSW8JbAr8pAvcelQeOn8oS1z2OJ892zE8MCQ',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'B.Sc., M.B.A.',
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-23 09:29:06',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-12-23 09:29:06'
                    ] );

                    Faculty::create( [
                    'id'=>393,
                    'faculty_name'=>'Prof. More G. V.',
                    'email'=>'gaurimore@sangamnercollege.edu.in',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$7LVc/9FDepxkULsBEPMYmOF7Q6pLmdFZ1IK.ebf9FhbcmFadR8UQu',
                    'remember_token'=>'WoERhzFucA0TdC3NYZtIWYr8Cumiu10y9r9Rls8WLAoaO5huyEWk2aiv4Xz3',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'53201500551',
                    'qualification'=>'B.Sc., M.B.A.',
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-26 11:39:15',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-12-26 11:39:15'
                    ] );

                    Faculty::create( [
                    'id'=>397,
                    'faculty_name'=>'Prof.Pawar Hrushikesh Gokul',
                    'email'=>'rushikesh@sangamnercollege.edu.in',
                    'mobile_no'=>'9545989333',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$jdxtW5nv///jd8dnyEuVMOdv7QlpQjLInXfeWa4SkJGghYomRp/.2',
                    'remember_token'=>'G0PZNYNReYKLjeJsRq7MZBY5ekkdwckxNkFke8AK9pTL4kI2Mq5cwID3dR5S',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9623993594',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-25 03:26:28',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-25 03:26:28'
                    ] );

                    Faculty::create( [
                    'id'=>398,
                    'faculty_name'=>'Ms. Deshmukh Vinita Sandip',
                    'email'=>'vinitadeshmukh@sangamnercollege.edu.in',
                    'mobile_no'=>'9075520940',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$x.IEKq/GuaQzmoAX35soMujtMY8Mlb74HODJBdbTwX1kwX3sTWPi2',
                    'remember_token'=>'IuxvLrfNRB0VNVP0UsbCD9Eopz3huZ89mft1GhNCe6KehCm7FIZ7ILFr9LuX',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. Comp. Sci. ',
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-05 12:54:53',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-05 12:54:53'
                    ] );

                    Faculty::create( [
                    'id'=>399,
                    'faculty_name'=>'Dr. Gokul Mundhe',
                    'email'=>'gokulmundhe07@gmail.com',
                    'mobile_no'=>'9175777723',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197805920',
                    'qualification'=>'M.A., NET, Ph.D.',
                    'role_id'=>8,
                    'department_id'=>17,
                    'college_id'=>57,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>400,
                    'faculty_name'=>'Dr.Rajdeo Trambak Bhimraj',
                    'email'=>'tb.rajdeo@gmail.com',
                    'mobile_no'=>'9423461885',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>18,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>401,
                    'faculty_name'=>'Mr. Jorvekar Mangesh Pandharinath',
                    'email'=>'mangesh@sangamnercollege.edu.in',
                    'mobile_no'=>'9881004918',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$H5tDD/lSbr3C/w1WCvKc1.6IbWauvrmTLSUhbPiK.pBnpSKeZUVlS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201690155',
                    'qualification'=>'M.A., M.Phil., Ph.D., NET',
                    'role_id'=>8,
                    'department_id'=>12,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-05-24 10:28:44',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-05-24 10:28:44'
                    ] );

                    Faculty::create( [
                    'id'=>402,
                    'faculty_name'=>'Dhadge N. S.\r\n',
                    'email'=>'dhadge.nikita2017@gmail.com',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc., Agri.',
                    'role_id'=>8,
                    'department_id'=>24,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>403,
                    'faculty_name'=>'Prof. Desai S. S.\r\n',
                    'email'=>'desaisneha@sangamnercollege.edu.in',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Mhyy6MDGj/DkV6ANoIyIYOChATuuaQorR39qGNikeF0aJcpfrC9S2',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc., Agri.',
                    'role_id'=>8,
                    'department_id'=>24,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-04-04 08:36:24',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-04 08:36:24'
                    ] );

                    Faculty::create( [
                    'id'=>404,
                    'faculty_name'=>'Prof. Jaybhay V. B.',
                    'email'=>'vishnujaybhay5812@gmail.com',
                    'mobile_no'=>'',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$MrEKKG/amYgRKI.GYKAOY.upXH5BH7Re/oMnHdJq8a.yO6Dsq/9wm',
                    'remember_token'=>'VbpOZfmiHCGte2RsEvjb17Ehc8vfmeHucHnVyc4Jjv9ylXhHNeC8GNX1tYJz',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc., Agri.',
                    'role_id'=>8,
                    'department_id'=>24,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-04-03 09:27:06',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-04-03 09:27:06'
                    ] );

                    Faculty::create( [
                    'id'=>405,
                    'faculty_name'=>'Prof. Jejurkar G. B.',
                    'email'=>'jejurkargb@sangamnercollege.edu.in',
                    'mobile_no'=>'9890787910',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. Agri., Ph.D. (Soil Science &  Agricultural Chemistry)',
                    'role_id'=>8,
                    'department_id'=>25,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>406,
                    'faculty_name'=>'khadus zarina mohd abdul\r\n',
                    'email'=>'zarinakhaddus@rediffmail.com',
                    'mobile_no'=>'9270155688',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'53101800055',
                    'qualification'=>'M.Sc. , B.Ed.',
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>5,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>407,
                    'faculty_name'=>'MS Komal Taskar',
                    'email'=>'komaltaskar@sangamnercollege.edu.in',
                    'mobile_no'=>'8883331052',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$k/AufPdoC/ad07lxhF40PuxKQ73kD8VL4cfduSthOV9xOoUeQov9u',
                    'remember_token'=>'iQlY0DkpWfbL7iUp4vWwk10FY0BiQsEgAIxjRJEGeJYHLDU0zNkfHxPoh1W1',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'53101800055',
                    'qualification'=>'M.Sc. , B.Ed.',
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-20 06:56:24',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-12-20 06:56:24'
                    ] );

                    Faculty::create( [
                    'id'=>410,
                    'faculty_name'=>'Mr. Kadam Rahul Khandu',
                    'email'=>'kadamrahul2017@gmail.com',
                    'mobile_no'=>'9096131113',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'M.A.',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>'2022-01-12 07:10:31',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-12 07:10:31'
                    ] );

                    Faculty::create( [
                    'id'=>412,
                    'faculty_name'=>'Prof.Pramod Rajendra Tambe',
                    'email'=>'prajtambe14@gmail.com',
                    'mobile_no'=>'9145404088',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'53101800055',
                    'qualification'=>'M.Sc. , B.Ed.',
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>413,
                    'faculty_name'=>'Dr.K.D. Gopale',
                    'email'=>'santoshgopale10@gmail.com',
                    'mobile_no'=>'9767314757',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'M.A.',
                    'role_id'=>8,
                    'department_id'=>5,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-12 07:10:00'
                    ] );

                    Faculty::create( [
                    'id'=>415,
                    'faculty_name'=>'Prof. Aher S.S.',
                    'email'=>'swatiaher@sangamnercollege.edu.in',
                    'mobile_no'=>'9356448987',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'53101800055',
                    'qualification'=>'M.Sc. , B.Ed.',
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>416,
                    'faculty_name'=>'Prof.  Joshi V.D.',
                    'email'=>'vaishnavijoshi801@gmail.com',
                    'mobile_no'=>'8668641747',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'M.A.',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>78,
                    'active'=>0,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-12 07:10:00'
                    ] );

                    Faculty::create( [
                    'id'=>417,
                    'faculty_name'=>'Dr. Nirmal V.D.',
                    'email'=>'vdnirmal80@gmail.com',
                    'mobile_no'=>'9765191130',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'M.A.',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-12 07:10:00'
                    ] );

                    Faculty::create( [
                    'id'=>418,
                    'faculty_name'=>'Prof.Gangadhar Bansode',
                    'email'=>'gangadharbansode61@gmail.com',
                    'mobile_no'=>'8208042191',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197201865',
                    'qualification'=>'M.A., SET, M.Phil., Ph.D.',
                    'role_id'=>14,
                    'department_id'=>17,
                    'college_id'=>3,
                    'active'=>1,
                    'last_login'=>'2022-01-17 07:53:21',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-17 07:53:21'
                    ] );

                    Faculty::create( [
                    'id'=>419,
                    'faculty_name'=>'Mr.Garje Pravin Madhav',
                    'email'=>'garjepravin@rediffmail.com',
                    'mobile_no'=>'9922434358',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201688994',
                    'qualification'=>'M.Sc. Comp. Sci., NET',
                    'role_id'=>8,
                    'department_id'=>2,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-02-08 10:38:45',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-02-08 10:38:45'
                    ] );

                    Faculty::create( [
                    'id'=>420,
                    'faculty_name'=>'Prof.Avinash Vijaykumar Karande ',
                    'email'=>'karandesir89@gmail.com',
                    'mobile_no'=>'8329516712',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9881350383',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>59,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>421,
                    'faculty_name'=>'Mr.Ambre Shubham Sunil',
                    'email'=>'ssambre@sangamnercollege.edu.in',
                    'mobile_no'=>'9763506626',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$2OKMS2lgZ507t08.YLD5Ce1hq7ovcKxWnry//OD0rmKv447x9ZJ6W',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52196801866',
                    'qualification'=>'M.Sc., Ph.D., F.Z.S.I., F.S.L.S.',
                    'role_id'=>8,
                    'department_id'=>7,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-07 02:27:28',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-07 02:27:28'
                    ] );

                    Faculty::create( [
                    'id'=>422,
                    'faculty_name'=>'Ms.Badhe Poonam Balasaheb',
                    'email'=>'poonambadhe@sangamnercollege.edu.in',
                    'mobile_no'=>'9359528051',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$KekZVtlvzBY2f21byG/UwOyNTkVnXvsG7ZU9.tSLwStWc/JapqAWO',
                    'remember_token'=>'jhJIx7AyHK8kW788rLYrmmyyQmI2zAwaj5QyhpypTEtrsNTIRLhrj3WIH6G5',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc.',
                    'role_id'=>8,
                    'department_id'=>2,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-02-01 07:50:52',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-02-01 07:50:52'
                    ] );

                    Faculty::create( [
                    'id'=>423,
                    'faculty_name'=>'Dr. Kadam Ajitkumar Sadashiv',
                    'email'=>'kadam@sangamnercollege.edu.in',
                    'mobile_no'=>'9881053481',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$ESPnlRUQpxzTasiRZ4hc4uDIM3O9cZwoLzDn444QI3jZ24qxuuW42',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52198105982',
                    'qualification'=>'M.A., M.Phil., Ph.D.',
                    'role_id'=>8,
                    'department_id'=>33,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-07-27 12:02:01',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-07-27 12:02:01'
                    ] );

                    Faculty::create( [
                    'id'=>424,
                    'faculty_name'=>'Halde Anil Uttam',
                    'email'=>'anilhalde27@gmail.com',
                    'mobile_no'=>'9370562714',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$z.uh5c0L.oOKvAzlpvniKODflnkf.pRHlmbDr757l1YeRSnXJPtxm',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., D.C.F.A., M.Phil., Ph.D.',
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>39,
                    'active'=>1,
                    'last_login'=>'2022-05-09 04:54:22',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-09 04:54:22'
                    ] );

                    Faculty::create( [
                    'id'=>425,
                    'faculty_name'=>'Ms.Rode Machindra',
                    'email'=>'machindrarode@sangamnercollege.edu.in',
                    'mobile_no'=>'8806324800',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$5xAlzcWhvjG7A3TwlmTNru59pJCjuThv6lp.u1MH2dCe/FgtJ469G',
                    'remember_token'=>'tYnipdHrHleEElbucNARRvmPkmktP5VVuVUja9oVaGHLTuthGK3doHEVzoEf',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52198306954',
                    'qualification'=>'M.Com., ',
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-07-24 11:21:40',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-07-24 11:21:40'
                    ] );

                    Faculty::create( [
                    'id'=>426,
                    'faculty_name'=>'Dr.Borde Gorakshanath Dnyaneshwar',
                    'email'=>'gorakb@gmail.com',
                    'mobile_no'=>'9665447086',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$PH.vmb8VePdKXqgwQ8KR0OMUsLX5eVKS1JTZjvpJatfbz/p/L6cyW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., ',
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>'2022-05-07 08:09:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-07 08:09:00'
                    ] );

                    Faculty::create( [
                    'id'=>428,
                    'faculty_name'=>'Mr R R Walekar',
                    'email'=>'raviwalekar@sangamnercollege.edu.in',
                    'mobile_no'=>'7263967832',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$2MG7d44glb3jMfI7RLZnR.JIEBmNWpDNOV/hbpa12IcPM72t6iFKK',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc.',
                    'role_id'=>8,
                    'department_id'=>3,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-01-25 12:07:35',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-01-25 12:07:35'
                    ] );

                    Faculty::create( [
                    'id'=>429,
                    'faculty_name'=>'Ms V D Joshi',
                    'email'=>'vaishnavijoshi@sangamnercollege.edu.in',
                    'mobile_no'=>'8668641747',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$fM1fYGtGJzV0PHNHlyw8QeebrchmWeR/M6V8L.0DG9VGepZNKWjmi',
                    'remember_token'=>'lJQGgTWsofZRBejIN0efzCHbVRkdba5siK8ohk4QmF8Ot2JRRWcoQmisqqGt',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc., ',
                    'role_id'=>8,
                    'department_id'=>3,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-05-13 03:41:28',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-05-13 03:41:28'
                    ] );

                    Faculty::create( [
                    'id'=>430,
                    'faculty_name'=>'Dr  Vasudev Salunke',
                    'email'=>'vasusalunke@yahoo.co.in',
                    'mobile_no'=>'9370389291',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$G/rzA74l1sbEvRXBXwlw3uErZJInfc0uh4Dqcwo8IM4GiWv040aBO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>' ',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>'2022-04-22 10:29:16',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-22 10:29:16'
                    ] );

                    Faculty::create( [
                    'id'=>431,
                    'faculty_name'=>'Dr. Anand Pandit',
                    'email'=>'anandpandit@newartsdcs.ac.in',
                    'mobile_no'=>'8999341618',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$G/rzA74l1sbEvRXBXwlw3uErZJInfc0uh4Dqcwo8IM4GiWv040aBO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>' ',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>59,
                    'active'=>1,
                    'last_login'=>'2022-04-22 10:29:16',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-22 10:29:16'
                    ] );

                    Faculty::create( [
                    'id'=>432,
                    'faculty_name'=>'Prof. A. N. Jadhav',
                    'email'=>'ashwinijadhav@sangamnercollege.edu.in',
                    'mobile_no'=>'8605558167',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$dBjQajZUHzAeOK5um7FEqe31hlQFJCZju5cqIEIVDVVPh5Nn8w9c2',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>' ',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-26 06:24:52',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-12-26 06:24:52'
                    ] );

                    Faculty::create( [
                    'id'=>433,
                    'faculty_name'=>'Ms. Madhubala Bhausaheb Kadlag',
                    'email'=>'madhubala@sangamnercollege.edu.in',
                    'mobile_no'=>'7499628495',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$8E/Un41BjcJWTIMFDpQFhe3qTkNdTXMdxIr9XKxe1zbBNf0QTh3TK',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201795960',
                    'qualification'=>'MTA, UGC NET-JRF, PGDHRM',
                    'role_id'=>8,
                    'department_id'=>23,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-08 09:00:36',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-08 09:00:36'
                    ] );

                    Faculty::create( [
                    'id'=>434,
                    'faculty_name'=>'Varpe Rohini Jayram',
                    'email'=>'rohinivarpe@sangamnercollege.edu.in',
                    'mobile_no'=>'9764985682 ',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$G/rzA74l1sbEvRXBXwlw3uErZJInfc0uh4Dqcwo8IM4GiWv040aBO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>' ',
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-04-22 10:29:16',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-22 10:29:16'
                    ] );

                    Faculty::create( [
                    'id'=>435,
                    'faculty_name'=>'Prof.Mane Yogesh Sainath',
                    'email'=>'yogeshsm49@gmail.com',
                    'mobile_no'=>'7709950596',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$PH.vmb8VePdKXqgwQ8KR0OMUsLX5eVKS1JTZjvpJatfbz/p/L6cyW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., ',
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>30,
                    'active'=>1,
                    'last_login'=>'2022-05-07 08:09:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-07 08:09:00'
                    ] );

                    Faculty::create( [
                    'id'=>436,
                    'faculty_name'=>'Mr. A. S. Satralkar ',
                    'email'=>'assatralkar@sangamnercollege.edu.in',
                    'mobile_no'=>'98818 55478',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$CtiJ1lWn08nQGkAkcWptZeI0kKi3itA2LyoKjdS7oV.vLxGaeW4R.',
                    'remember_token'=>'FvMQk4z6SwDP4ktHN81kMv83dO1aGevXNgEvzUk2YIx12fNjxJst3cgKfXvz',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc., SET.',
                    'role_id'=>8,
                    'department_id'=>5,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-27 09:04:03',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-27 09:04:03'
                    ] );

                    Faculty::create( [
                    'id'=>437,
                    'faculty_name'=>'Sahane J.A',
                    'email'=>'jyotisahane@sangamnercollege.edu.in',
                    'mobile_no'=>'9146191190',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$i6Bpa1uPQxwu.qg3TVGVi.Ltxlz3AoG05X/8BZX6NCAFlNhz8BlQm',
                    'remember_token'=>'o8XFIf3gofWbf8YjBSZhTY36ias9MWBqrxRW1WNtEvUp1GbycJmXK1J19Gq8',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. Agri., Ph.D. (Soil Science &  Agricultural Chemistry)',
                    'role_id'=>8,
                    'department_id'=>25,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-08-03 06:31:48',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-08-03 06:31:48'
                    ] );

                    Faculty::create( [
                    'id'=>438,
                    'faculty_name'=>'Dr Sakore G. D.',
                    'email'=>'ganeshsakore3154@gmail.com',
                    'mobile_no'=>'9420860055',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$1e5j7H.Fh8o9ufll/mPbOOtHc5raJS09l3ZsmZ90FE7l0mGD0Wq7u',
                    'remember_token'=>'bjGgzgyp9fmqMWNb6D6KimiISz6cCstX3kIr2upttJCf2jju2rPJ9fUaS2Rk',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. Agri., Ph.D. (Soil Science &  Agricultural Chemistry)',
                    'role_id'=>8,
                    'department_id'=>25,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-05-09 13:18:06',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-09 13:18:06'
                    ] );

                    Faculty::create( [
                    'id'=>439,
                    'faculty_name'=>'Miss Khilari Shalaka A.',
                    'email'=>'shalakakhilari@sangamnercollege.edu.in',
                    'mobile_no'=>'74994 66225',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$9Uv15GC1GrFbwinyJkXZoeK3y0de/usk..L.VrjS7tiGMT2X2cZh2',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'B.E.IT',
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-05 13:04:18',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-05 13:04:18'
                    ] );

                    Faculty::create( [
                    'id'=>443,
                    'faculty_name'=>'Bhapkar Renuka Pramod',
                    'email'=>'renukabhapkar@sangamnercollege.edu.in',
                    'mobile_no'=>'7447352544',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$hsDQc58ThCXzXMPck4bSpOAwYuTNbfR/xQNeK58B7C9XGENTj7v.i',
                    'remember_token'=>'nasrZLB1FBrAFdaTBdgNUr7K29zeVHHv4XYiaa14UflEhhIFej5L5zCve3hQ',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'M.Sc.',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-05-08 07:17:43',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-05-08 07:17:43'
                    ] );

                    Faculty::create( [
                    'id'=>444,
                    'faculty_name'=>'Shrinivas Bhagwanrao Bhise',
                    'email'=>'shrinivas@sangamnercollege.edu.in',
                    'mobile_no'=>'8421756359',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$EtZ8r8dz8OqaTyys45B7sOL1TDfkphAq18YW3fn16l/ayWiL.Ct6u',
                    'remember_token'=>'f59UqvWfvKeIXTSFdXum1WvWcNQCSHcPV7JvKBpAFsL5mZsNB9bKbyv8CNWG',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.A.,M.Phil. SET',
                    'role_id'=>14,
                    'department_id'=>21,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-25 04:45:42',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-25 04:45:42'
                    ] );

                    Faculty::create( [
                    'id'=>445,
                    'faculty_name'=>'Mr. Pawase Avinash Ashok',
                    'email'=>'avinashpawase@sangamnercollege.edu.in',
                    'mobile_no'=>'77988 04240',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$ggqkuAWqCe/nG7IKQT5.2OS8daR1NRpKLljBYAekqzRIenBoVd0ni',
                    'remember_token'=>'9TReYfKMIbgztQIAcQHd45VxlmgbQWvrUQl1OO48pPM1H5RqXUZVOZUms9mF',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. Math.',
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-17 09:22:28',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-17 09:22:28'
                    ] );

                    Faculty::create( [
                    'id'=>446,
                    'faculty_name'=>'Pawar Hrishikesh Gokul',
                    'email'=>'hrushipawar9001@gmail.com',
                    'mobile_no'=>'95459 89333',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$yd0i3MOv8dUNg7HDBnA0uex145pKy2E2JQpgWbkbgQiGYGc7x/emO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc. Comp. Sci.',
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-25 03:24:35',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-25 03:24:35'
                    ] );

                    Faculty::create( [
                    'id'=>448,
                    'faculty_name'=>'Prof.Tambe Minakshi Vasant',
                    'email'=>'minakshitambenehe@gmail.com',
                    'mobile_no'=>'8806568523',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$MPE5Fc92x/f2mm9ql6uI9.gWnWIUPAPgkW6x4rpeVsZp/pfzN.QLu',
                    'remember_token'=>'5JW0YcxOiewIlryXilRuOYHg6bFhlImkt2mCCGqCgQU79r1j9PFHhdlcqn1b',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52032100349',
                    'qualification'=>'M.C.A.',
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>'2022-03-19 07:47:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-03-19 07:47:00'
                    ] );

                    Faculty::create( [
                    'id'=>449,
                    'faculty_name'=>'Prof.Supekar Kiran Arun',
                    'email'=>'supekar.k.a@gmail.com',
                    'mobile_no'=>'8087167770',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$MPE5Fc92x/f2mm9ql6uI9.gWnWIUPAPgkW6x4rpeVsZp/pfzN.QLu',
                    'remember_token'=>'5JW0YcxOiewIlryXilRuOYHg6bFhlImkt2mCCGqCgQU79r1j9PFHhdlcqn1b',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52032100349',
                    'qualification'=>'M.C.A.',
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>58,
                    'active'=>1,
                    'last_login'=>'2022-03-19 07:47:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-03-19 07:47:00'
                    ] );

                    Faculty::create( [
                    'id'=>450,
                    'faculty_name'=>'Prof.Kohakade Dattatray Ashok',
                    'email'=>'kohakadedattatray538@gmail.com',
                    'mobile_no'=>'8975385387',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9975641367',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>75,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>454,
                    'faculty_name'=>'Gawali Uttam Balu',
                    'email'=>'ubgawali@gmail.com',
                    'mobile_no'=>'9890837184',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9637338928',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>91,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>455,
                    'faculty_name'=>'Mr. Dhakane manoj Babasaheb',
                    'email'=>'dhakanemanoj28@gmail.com',
                    'mobile_no'=>'7741866363',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9637338928',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>459,
                    'faculty_name'=>'Dr. Pramodini Balasaheb Nawale (Kadam)',
                    'email'=>'drpamakadam@gmail.com',
                    'mobile_no'=>'9881176400',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9881176400',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>460,
                    'faculty_name'=>'Dr. Walunj Ganesh Rajendra',
                    'email'=>'walunjganesh2010@gmail.com',
                    'mobile_no'=>'9960181388',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>'',
                    'profile_photo_path'=>'',
                    'unipune_id'=>'9881176400',
                    'qualification'=>'',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>461,
                    'faculty_name'=>'Prof .Rajendra Jorvar',
                    'email'=>'rsjorwar@gmail.com',
                    'mobile_no'=>'7058979693',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$zpOp.nYM4XVFMBZ6HmtqeescUDJ6PKsFLizSbc9iPIsGGtorbKEOW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197305949',
                    'qualification'=>'M.A., NET, Ph.D.',
                    'role_id'=>8,
                    'department_id'=>12,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>'2022-05-10 09:32:09',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-10 09:32:09'
                    ] );

                    Faculty::create( [
                    'id'=>463,
                    'faculty_name'=>'Dr.Sayli Aacharya',
                    'email'=>'sayli.acharya22@gmail.com',
                    'mobile_no'=>'8420382083',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$zpOp.nYM4XVFMBZ6HmtqeescUDJ6PKsFLizSbc9iPIsGGtorbKEOW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197305949',
                    'qualification'=>'M.A., NET, Ph.D.',
                    'role_id'=>8,
                    'department_id'=>12,
                    'college_id'=>32,
                    'active'=>1,
                    'last_login'=>'2022-05-10 09:32:09',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-10 09:32:09'
                    ] );

                    Faculty::create( [
                    'id'=>464,
                    'faculty_name'=>'Mr. Anup Kadam',
                    'email'=>'anupkadam@sangamnercollege.edu.in',
                    'mobile_no'=>'91302 33230',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$fNYyc.igzh3lggG98nO1G.rhMa3F3PT/eco7mstz15qn2rNUHBNFy',
                    'remember_token'=>'EWlr7qs927hW7ZRrkptTBHm0LBahPpPdTHzp8kZyqn5YfT4QxEdiIG5sHt7s',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52196405948',
                    'qualification'=>'M.A.',
                    'role_id'=>11,
                    'department_id'=>14,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2022-07-16 08:13:44',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-07-16 08:13:44'
                    ] );

                    Faculty::create( [
                    'id'=>465,
                    'faculty_name'=>'Prof. Ramesh Deshmukh',
                    'email'=>'rameshraje15@gmail.com',
                    'mobile_no'=>'9689138128',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'B.Com, MBA',
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>'2022-05-12 07:03:12',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 07:03:12'
                    ] );

                    Faculty::create( [
                    'id'=>466,
                    'faculty_name'=>'Prof.Yogesh Deshmukh',
                    'email'=>'yogeshadeshmukh05@gmail.com\r\n',
                    'mobile_no'=>'9921292414',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>' ',
                    'qualification'=>'B.Com, MBA',
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>'2022-05-12 07:03:12',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 07:03:12'
                    ] );

                    Faculty::create( [
                    'id'=>467,
                    'faculty_name'=>'Dr.Neha Shah',
                    'email'=>'neha.shah.87@gmail.com',
                    'mobile_no'=>'9975702993',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201584122',
                    'qualification'=>'B.Com, MBA',
                    'role_id'=>9,
                    'department_id'=>28,
                    'college_id'=>100,
                    'active'=>1,
                    'last_login'=>'2022-05-12 07:03:12',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 07:03:12'
                    ] );

                    Faculty::create( [
                    'id'=>468,
                    'faculty_name'=>'Prof.Liyakat Sayyad',
                    'email'=>'luckyliyakat@gmail.com',
                    'mobile_no'=>'9960892386',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'B.Com, MBA',
                    'role_id'=>9,
                    'department_id'=>28,
                    'college_id'=>101,
                    'active'=>1,
                    'last_login'=>'2022-05-12 07:03:12',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 07:03:12'
                    ] );

                    Faculty::create( [
                    'id'=>469,
                    'faculty_name'=>'Prof.Santosh Admane',
                    'email'=>'santoshadmane93@gmail.com',
                    'mobile_no'=>'8669061653',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'B.Com, MBA',
                    'role_id'=>9,
                    'department_id'=>28,
                    'college_id'=>101,
                    'active'=>1,
                    'last_login'=>'2022-05-12 07:03:12',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 07:03:12'
                    ] );

                    Faculty::create( [
                    'id'=>472,
                    'faculty_name'=>'Prof. Dinesh Shelke ',
                    'email'=>'dgshelke1984@gmail.com',
                    'mobile_no'=>'9881599861',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Arc1ohXOBnygwlP6PuQcKuNgD0UkCwNQNAtF104ATBGGaoU9DFRPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'B.Com, MBA',
                    'role_id'=>9,
                    'department_id'=>28,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>'2022-05-12 07:03:12',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 07:03:12'
                    ] );

                    Faculty::create( [
                    'id'=>473,
                    'faculty_name'=>'DR.Babasaheb Sakharam Tonde\r\n',
                    'email'=>'babatonde12@gmail.com',
                    'mobile_no'=>'9850640704',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197201865',
                    'qualification'=>'M.A., SET, M.Phil., Ph.D.',
                    'role_id'=>13,
                    'department_id'=>17,
                    'college_id'=>73,
                    'active'=>1,
                    'last_login'=>'2022-01-17 07:53:21',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-17 07:53:21'
                    ] );

                    Faculty::create( [
                    'id'=>474,
                    'faculty_name'=>'Nagare Navnath Vithoba ',
                    'email'=>'nnagare77777@gmail.com',
                    'mobile_no'=>'9527077777',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197201865',
                    'qualification'=>'M.A., SET, M.Phil., Ph.D.',
                    'role_id'=>13,
                    'department_id'=>17,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>'2022-01-17 07:53:21',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-01-17 07:53:21'
                    ] );

                    Faculty::create( [
                    'id'=>476,
                    'faculty_name'=>'Dr. Shrikant Fulsundar ',
                    'email'=>'shrikantmf123@gmail.com',
                    'mobile_no'=>'9860286411',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., NET, SET, GDC&A',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>10,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>477,
                    'faculty_name'=>'Mr. Jagtap Gajanan Ramrao',
                    'email'=>'gajananjagtap816@gmail.com',
                    'mobile_no'=>'9881997165',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., NET, SET, GDC&A',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>10,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>478,
                    'faculty_name'=>'Dr. Sachin Kasabe',
                    'email'=>'skasabe358@gmail.com',
                    'mobile_no'=>'7083133320',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., NET, SET, GDC&A',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>103,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>479,
                    'faculty_name'=>'Dr. Bhushan  Anna Waykar',
                    'email'=>'waykarbhushan21@gmail.com',
                    'mobile_no'=>'9860744688',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., NET, SET, GDC&A',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>104,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>482,
                    'faculty_name'=>'Dr. Sandip V. Tile',
                    'email'=>'dr.sandiptile@gmail.com',
                    'mobile_no'=>'9422813960',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$n0EWKNRjOqPpl3UTMVLuVerYUq3NvEmC.V.pyo5N7O0WjNOgzeftC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Com., NET, SET, GDC&A',
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>39,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2021-11-26 14:37:00'
                    ] );

                    Faculty::create( [
                    'id'=>483,
                    'faculty_name'=>'Chaudhari Shashangar Ashok',
                    'email'=>'shashangarchaudhari@sangamnercollege.edu.in',
                    'mobile_no'=>'9657446189',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$vUTYXCiosxj37ops5gSsXOQDHWsSRrKQBbCBgDXF3YiJGgAxDq97e',
                    'remember_token'=>'s6fm5HUq4Xny1L4PMp7jvY5tTj8PR3cBqG2gwqT9gU00rnrsHJVb9Xs5MKdK',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52101801274',
                    'qualification'=>'M.Sc.',
                    'role_id'=>8,
                    'department_id'=>2,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-20 06:45:31',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-12-20 06:45:31'
                    ] );

                    Faculty::create( [
                    'id'=>485,
                    'faculty_name'=>'Dr Prashant Pundlik Lohar',
                    'email'=>'lohar.prashant1979@gmail.com',
                    'mobile_no'=>'8766592719',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$d9kujIbAl8QEd5ygPERmyuOhFxoAgvFxaoRKKFd2f6XRuAV2UWrXa',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52197305947',
                    'qualification'=>'M.A., SET, Ph.D.',
                    'role_id'=>13,
                    'department_id'=>14,
                    'college_id'=>105,
                    'active'=>1,
                    'last_login'=>'2022-05-12 06:00:13',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-05-12 06:00:13'
                    ] );

                    Faculty::create( [
                    'id'=>486,
                    'faculty_name'=>'Dr. Dipak R. Tope',
                    'email'=>'dipak.tope@gmail.com',
                    'mobile_no'=>'9421138546',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$rB.fsVbo6KMuS2e9FtEbE.nBeU3xAbDFmzYEJae7krVS6Y6osZlRe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201584131',
                    'qualification'=>'M.Sc. Ph.D.',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>32,
                    'active'=>1,
                    'last_login'=>'2022-04-01 11:54:13',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-01 11:54:13'
                    ] );

                    Faculty::create( [
                    'id'=>487,
                    'faculty_name'=>'Dr. Ptatibha V. Randhawane',
                    'email'=>'pvrandhavane@gmail.com',
                    'mobile_no'=>'9371092684',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$rB.fsVbo6KMuS2e9FtEbE.nBeU3xAbDFmzYEJae7krVS6Y6osZlRe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201584131',
                    'qualification'=>'M.Sc. Ph.D.',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>91,
                    'active'=>1,
                    'last_login'=>'2022-04-01 11:54:13',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-01 11:54:13'
                    ] );

                    Faculty::create( [
                    'id'=>488,
                    'faculty_name'=>'Dr. Pallavi Dnyaneshwar Shelke',
                    'email'=>'pallavidshelke@gmail.com',
                    'mobile_no'=>'8830809689',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$rB.fsVbo6KMuS2e9FtEbE.nBeU3xAbDFmzYEJae7krVS6Y6osZlRe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201584131',
                    'qualification'=>'M.Sc. Ph.D.',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>58,
                    'active'=>1,
                    'last_login'=>'2022-04-01 11:54:13',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-01 11:54:13'
                    ] );

                    Faculty::create( [
                    'id'=>489,
                    'faculty_name'=>'Dr. S. S. Gaikwad',
                    'email'=>'gaikwaid.sharad85@gmail.com',
                    'mobile_no'=>'9922625611',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$rB.fsVbo6KMuS2e9FtEbE.nBeU3xAbDFmzYEJae7krVS6Y6osZlRe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201584131',
                    'qualification'=>'M.Sc. Ph.D.',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>39,
                    'active'=>1,
                    'last_login'=>'2022-04-01 11:54:13',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-04-01 11:54:13'
                    ] );

                    Faculty::create( [
                    'id'=>490,
                    'faculty_name'=>'Dr. Hari Pawar',
                    'email'=>'haripawar2010@gmail.com',
                    'mobile_no'=>'9975668976',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$PgdDnyYmiB76nrMFGYA/quoXsp.vpxmYFJcvuPUlpPVQ/m8sQ1Y.6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52198701832',
                    'qualification'=>'M.Sc., NET',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>106,
                    'active'=>1,
                    'last_login'=>'2022-03-21 10:38:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-03-21 10:38:00'
                    ] );

                    Faculty::create( [
                    'id'=>492,
                    'faculty_name'=>'Prof. Dare Sushma',
                    'email'=>'daresushama@gmail.com',
                    'mobile_no'=>'9890674754',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$PgdDnyYmiB76nrMFGYA/quoXsp.vpxmYFJcvuPUlpPVQ/m8sQ1Y.6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52198701832',
                    'qualification'=>'M.Sc., NET',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>58,
                    'active'=>1,
                    'last_login'=>'2022-03-21 10:38:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-03-21 10:38:00'
                    ] );

                    Faculty::create( [
                    'id'=>493,
                    'faculty_name'=>'Prof. K. M. Gadhave',
                    'email'=>'kmgadhave@gmail.com',
                    'mobile_no'=>'9921135045',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$PgdDnyYmiB76nrMFGYA/quoXsp.vpxmYFJcvuPUlpPVQ/m8sQ1Y.6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52198701832',
                    'qualification'=>'M.Sc., NET',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>71,
                    'active'=>1,
                    'last_login'=>'2022-03-21 10:38:00',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2022-03-21 10:38:00'
                    ] );

                    Faculty::create( [
                    'id'=>494,
                    'faculty_name'=>'Mr.Satpute Rahul laxman',
                    'email'=>'rahulsatpute@sangamnercollege.edu.in',
                    'mobile_no'=>'9860150740',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$fgWffwk.byOGFMN8nkDpGekP8TXppxaEIGw8/Zgij42p97p3an1Oi',
                    'remember_token'=>'37pD0nmZXsIqb7IeHDMPmauJEOBuQZxw44PeBcfAo7QG0jyw6knHhGjIA8GC',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52196205926',
                    'qualification'=>'M.Sc., B.Ed., Ph.D.',
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-08-09 06:59:34',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-08-09 06:59:34'
                    ] );

                    Faculty::create( [
                    'id'=>495,
                    'faculty_name'=>'Ms.Kotkar H.B.',
                    'email'=>'harshadakotkar@sangamnercollege.edu.in',
                    'mobile_no'=>'7350280621',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$R9wC2kUr6H05rSSx0YP45.FshZy9D1BHNWgvY7l48wskH4C6WzFiG',
                    'remember_token'=>'fQCvNrR2bJRDca39AfbN6QPKyH6HUQap2vZGwcObPf7rVuubjYkKUIHy4giy',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'52201795149',
                    'qualification'=>'M.Sc. Comp. Sci., UGC-NET',
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-20 09:41:16',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2023-12-20 09:41:16'
                    ] );

                    Faculty::create( [
                    'id'=>498,
                    'faculty_name'=>'Ms.Raut Supriya Laxman',
                    'email'=>'supriyaraut@sangamnercollege.edu.in',
                    'mobile_no'=>'9325486119',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Fi70aut..4TDBmBA0iNqWOxHcpLkeu73yApVGh4vgv8D9mlA2/aNi',
                    'remember_token'=>'rXoFIRhteK1SkeHR2y0Gpna2LNLo9owBuScNejQjMt7C87krCXl5bDrDa58X',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>'',
                    'qualification'=>'M.Sc.',
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-17 15:49:51',
                    'created_at'=>'2021-12-10 11:21:00',
                    'updated_at'=>'2024-01-17 15:49:51'
                    ] );

                    Faculty::create( [
                    'id'=>503,
                    'faculty_name'=>'Tajane Manisha Kailas',
                    'email'=>'manishatajane@gmail.com',
                    'mobile_no'=>NULL,
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$PoOGCB.by3zJG4k8q2v9qeLvbPx6RLeltjaUYifPc01fOTU/sgE9m',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-04 05:48:14',
                    'created_at'=>'2022-10-22 12:13:08',
                    'updated_at'=>'2023-12-04 05:48:14'
                    ] );

                    Faculty::create( [
                    'id'=>507,
                    'faculty_name'=>'Dr. G.S. Shinde',
                    'email'=>'gsshindebhumi@gmail.com',
                    'mobile_no'=>NULL,
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$jxz62Rvq1g5uzZ.iOsg6FOxLbvUcF9dNm9Na6x1sBCeVRs33DIp0C',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>5,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 12:24:01',
                    'updated_at'=>'2022-10-22 12:24:01'
                    ] );

                    Faculty::create( [
                    'id'=>511,
                    'faculty_name'=>'Shelke Ganesh Rakhamaji',
                    'email'=>'ganeshshelke1857@gmail.com',
                    'mobile_no'=>NULL,
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$mDYFzF42QCzJa1StXiWIYOTvioDLRYaePbM5qjWRNVaD3jqMSgcba',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>9,
                    'department_id'=>16,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 12:39:05',
                    'updated_at'=>'2022-10-22 12:39:05'
                    ] );

                    Faculty::create( [
                    'id'=>520,
                    'faculty_name'=>'Mr.Dhage Haushiram Yadav',
                    'email'=>'dhagehy@sangamnercollege.edu.in',
                    'mobile_no'=>'9552323706',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$DwxLwtSEdtRoD0lPFzIYTeff5h4KeQuWQmN78IwfEXl.q7dJxHgei',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-11-30 12:03:44',
                    'created_at'=>'2022-10-22 13:09:30',
                    'updated_at'=>'2023-11-30 12:03:44'
                    ] );

                    Faculty::create( [
                    'id'=>532,
                    'faculty_name'=>'Dr.D.B.Tambe',
                    'email'=>'tambedeepmala@gmail.com',
                    'mobile_no'=>'9767879011',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$xQp.eWpL49AqaxxN0pF83um9ihSqahWaWE7/tgk2S0EAvLxqJQEIa',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>5,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 13:38:38',
                    'updated_at'=>'2022-10-22 13:38:38'
                    ] );

                    Faculty::create( [
                    'id'=>536,
                    'faculty_name'=>'Ms.Punde Ashwini Ramesh',
                    'email'=>'pundeashwini29@gmail.com',
                    'mobile_no'=>'9665687042',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$3R7lnZ0/3DPwjgIc74CBFOgpP4DKEhyuVPiTfuqVOCPMwsQKM6tye',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 13:58:18',
                    'updated_at'=>'2022-10-22 13:58:18'
                    ] );

                    Faculty::create( [
                    'id'=>537,
                    'faculty_name'=>'Dr. Anil Ramchandra Kurhe',
                    'email'=>'anil.kurhe@gmail.com',
                    'mobile_no'=>'7020238375',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$x.sjAdQkAhxWZb/7LPioye32vxsZC62KeUY3.ilDk8Tcp3Q4ly/Oe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>7,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 14:01:56',
                    'updated_at'=>'2022-10-22 14:01:56'
                    ] );

                    Faculty::create( [
                    'id'=>538,
                    'faculty_name'=>'Dr. Kamal Ranganath Dhakane',
                    'email'=>'kamaldhakane@gmail.com',
                    'mobile_no'=>'9370028508',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$ZDt9BwLErMOKPR6cvRUhQ.atQDp.c0WLzLTGkliQxgdvYHYhG.xdS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>13,
                    'department_id'=>7,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 14:10:52',
                    'updated_at'=>'2022-10-22 14:10:52'
                    ] );

                    Faculty::create( [
                    'id'=>540,
                    'faculty_name'=>'Mr.Kiran Kailas Ambre',
                    'email'=>'kiran.k.anbre@gmail.com',
                    'mobile_no'=>'8208532541',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$OO3yNsZd2BKFYvw23Cfh1u6iQCjKTNbV6x6zF5cfEZJUNAOq9oObe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 14:28:09',
                    'updated_at'=>'2022-10-22 14:28:09'
                    ] );

                    Faculty::create( [
                    'id'=>541,
                    'faculty_name'=>'Mr.Tambe Dattatray C.',
                    'email'=>'dattatambe143@gmail.com',
                    'mobile_no'=>'7387025286',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$ML56OUbgem/6jsIf6OLMW.0jChnrcOS9fbK5N5X.hWAh8drfiTq3m',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 14:44:55',
                    'updated_at'=>'2022-10-22 14:44:55'
                    ] );

                    Faculty::create( [
                    'id'=>542,
                    'faculty_name'=>'Mr.Thorat Dnyaneshwar  S.',
                    'email'=>'dsthorat02@gmail.com',
                    'mobile_no'=>'9834439615',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$iXlZsxzY/V7poSVwWuHd/uNwzeQjwQO.MbpUb8Mtmb2L2G1VnkbqW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>27,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 14:50:59',
                    'updated_at'=>'2022-10-22 14:50:59'
                    ] );

                    Faculty::create( [
                    'id'=>543,
                    'faculty_name'=>'Kumkar Tukaram Karbhari',
                    'email'=>'omkumkar@rediffmail.com',
                    'mobile_no'=>'9960026273',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$7ySLKWSUvGXecwhWwL4FM.a0Yjg0dxe82VoI6ZLeUo.3W6GGn833i',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>7,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 14:55:48',
                    'updated_at'=>'2022-10-22 14:55:48'
                    ] );

                    Faculty::create( [
                    'id'=>544,
                    'faculty_name'=>'Miss Namita Suresh Kharat',
                    'email'=>'namitakharat@sangamnercollege.edu.in',
                    'mobile_no'=>'9322738394',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$qeeT9kNiZlysTgoyeVlmAeOvCb5jtkx52kIFK/wr.9yBrc64Hk9Ly',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-08-04 13:48:58',
                    'created_at'=>'2022-10-22 15:59:58',
                    'updated_at'=>'2023-08-04 13:48:58'
                    ] );

                    Faculty::create( [
                    'id'=>545,
                    'faculty_name'=>'Miss Varsha Sahebrao Aher',
                    'email'=>'varshasaher@gmail.com',
                    'mobile_no'=>'9975944807',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$.fnKIa5ECuFxiy9cuDZwPOdTvXlsKljLotQnYO3T8dSiSqk.2tgP2',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 16:05:45',
                    'updated_at'=>'2022-10-22 16:05:45'
                    ] );

                    Faculty::create( [
                    'id'=>546,
                    'faculty_name'=>'Mr. Jayram D. Dere',
                    'email'=>'jayramdere@gmail.com',
                    'mobile_no'=>'9850208149',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$lEm3TbN8bL9X217elEVX/O0lfYwS4OWQOeV47rudn7HKEmcg6iz1q',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-22 16:30:10',
                    'updated_at'=>'2022-10-22 16:30:10'
                    ] );

                    Faculty::create( [
                    'id'=>548,
                    'faculty_name'=>'Prof. Miss Kshatriya Shalaka Rajendra',
                    'email'=>'srkshatriya@sangamnercollege.edu.in',
                    'mobile_no'=>'8669887431',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$YcCQNrQxbCq7nQ7hCFrsVe1bUoimqsh2G9uTS0rYhTdFhXG/cNSoy',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-04 06:34:21',
                    'created_at'=>'2022-10-26 21:50:48',
                    'updated_at'=>'2024-01-04 06:34:21'
                    ] );

                    Faculty::create( [
                    'id'=>549,
                    'faculty_name'=>'Dr. Karande Pandharinath Tukaram',
                    'email'=>'ptkarande@gmail.com',
                    'mobile_no'=>'9423755156',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$MSF5JwZekLuy8WkuLZ1Fw.RHtcX6Adsa3rsYYs9jvfTn584jV6r3S',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>3,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-26 22:00:16',
                    'updated_at'=>'2022-10-26 22:00:16'
                    ] );

                    Faculty::create( [
                    'id'=>550,
                    'faculty_name'=>'CMA Maithili Malpure',
                    'email'=>'cma.maithilimalpure@gmail.com',
                    'mobile_no'=>'9421514777',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$iDGeuO8aaJ/EVaAFf/eLPezsKKOPqPHbnyD4UGvt9p0OeCO87Xqeu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>26,
                    'college_id'=>39,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-27 17:28:08',
                    'updated_at'=>'2022-10-27 17:28:08'
                    ] );

                    Faculty::create( [
                    'id'=>551,
                    'faculty_name'=>'Dnyanoba Trimbak Dhage',
                    'email'=>'dtdhage17@gmail.com',
                    'mobile_no'=>'9637747896',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$elq6pX8XCFP338nXNHSQSuhRbhH7ahgY15o4ZwMaFgBQhKDZeAODS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>17,
                    'college_id'=>108,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-29 20:21:08',
                    'updated_at'=>'2022-10-29 20:21:08'
                    ] );

                    Faculty::create( [
                    'id'=>552,
                    'faculty_name'=>'Varsha Uday Kakad',
                    'email'=>'varshakakad24@gmail.com',
                    'mobile_no'=>'9404248074',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$25SoKlgX/fpu8GB/CkzzFeyLryhg6n9KBVujq47XNzFtVcdK2Wj/K',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>17,
                    'college_id'=>4,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-29 20:30:28',
                    'updated_at'=>'2022-10-29 20:30:28'
                    ] );

                    Faculty::create( [
                    'id'=>553,
                    'faculty_name'=>'Dr.Rahul  Balkrisha Gonge',
                    'email'=>'rahulgonge72@gmail.com',
                    'mobile_no'=>'9850091643',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$AxSv/O/Jw05jh17gWXP5NudqgfX8hT3LihTi/6G0ynEVAuQHilg/i',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>10,
                    'department_id'=>17,
                    'college_id'=>10,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-29 20:40:29',
                    'updated_at'=>'2022-10-29 20:40:29'
                    ] );

                    Faculty::create( [
                    'id'=>554,
                    'faculty_name'=>'Mr. Raviraj Ambadas Vatne',
                    'email'=>'ravichimani@gmail.com',
                    'mobile_no'=>'9881978109',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$bpSAPEbRa1yXKdDDgeS37eF1VW/e84rOI4rb4DD8A3Z/3oSgAiRyG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>17,
                    'college_id'=>37,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-29 20:48:40',
                    'updated_at'=>'2022-10-29 20:48:40'
                    ] );

                    Faculty::create( [
                    'id'=>555,
                    'faculty_name'=>'Mr.Chandrakant Harde',
                    'email'=>'hardecg@gmail.com',
                    'mobile_no'=>'9834394080',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$38zo08bve9D5cG0uHQnc.O4Poa5bscJFaP3aONfXeYeGMwUMGc0jC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>17,
                    'college_id'=>107,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-29 21:01:05',
                    'updated_at'=>'2022-10-29 21:01:05'
                    ] );

                    Faculty::create( [
                    'id'=>556,
                    'faculty_name'=>'Amol Nivrutti Kharat',
                    'email'=>'kharatamol444@gmail.com',
                    'mobile_no'=>'8830179616',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$IuyEgQyj/G8yTYIAwERO8uB1AD6oYV0YRsg5CGOO9I1b/tEjjWpPu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>17,
                    'college_id'=>107,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-29 21:07:03',
                    'updated_at'=>'2022-10-29 21:07:03'
                    ] );

                    Faculty::create( [
                    'id'=>559,
                    'faculty_name'=>'Aakash Dilip pawar',
                    'email'=>'aakashpawar71@gmail.com',
                    'mobile_no'=>'9767373497',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$dweDNMR/Z2/oIeZ7qwpf7OJTo0/htEnplSTWUWKMVZ4Kw24DAQAcK',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 09:44:49',
                    'updated_at'=>'2022-10-30 09:44:49'
                    ] );

                    Faculty::create( [
                    'id'=>560,
                    'faculty_name'=>'Pradnya Sanjay  kadu',
                    'email'=>'pradnyaskadu@gmail.com',
                    'mobile_no'=>'+917387352615',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$St4VKxUWiftR.tcYN3Lg8OFyZTgk8pJIHdPWBA/2hg8DCnnRPAt7O',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 09:59:48',
                    'updated_at'=>'2022-10-30 09:59:48'
                    ] );

                    Faculty::create( [
                    'id'=>561,
                    'faculty_name'=>'Shaikh Sajid Hussain',
                    'email'=>'sajidshaikh00@gmail.com',
                    'mobile_no'=>'8830061003',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$WNlz7FTkIEASakYS/naoWeGR8TFVgfOREGc1YAFbCHcCOwjg5k88K',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>58,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 10:11:25',
                    'updated_at'=>'2022-10-30 10:11:25'
                    ] );

                    Faculty::create( [
                    'id'=>562,
                    'faculty_name'=>'Kadu Divya namdev',
                    'email'=>'divyakadu@sangamnercollege.edu.in',
                    'mobile_no'=>'+919970693710',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$kjBRfMUsrkOgOt0udGoQhO6hcLXKuL.sRv21Y6LJ8m7de8e4QBGCC',
                    'remember_token'=>'litM5esyfVkECeGKlUxfLhrJaqJjFH1SqMYTPd9v9uiWGnbVmWJXpmGyKL9y',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>9,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-04 11:37:08',
                    'created_at'=>'2022-10-30 10:16:13',
                    'updated_at'=>'2024-01-04 11:37:08'
                    ] );

                    Faculty::create( [
                    'id'=>563,
                    'faculty_name'=>'Dr. Nilesh S. Kanhe',
                    'email'=>'nilesh264284@gmail.com',
                    'mobile_no'=>'9021646746',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$WXdq9fR36kNRh8IwYOcZAeGbr.gTcfPPG4DDv0weg.dFWoLqAw6Hm',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>3,
                    'college_id'=>7,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 12:28:56',
                    'updated_at'=>'2022-10-30 12:28:56'
                    ] );

                    Faculty::create( [
                    'id'=>564,
                    'faculty_name'=>'Dr. Anil Gite',
                    'email'=>'gite.anil@gmail.com',
                    'mobile_no'=>'9850770193',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$1sQlT5JqqGwfdbpSf3PO2Ougq8uhlMWXfBvfwYRdT0MA9bGY3GeUy',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>3,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 12:36:18',
                    'updated_at'=>'2022-10-30 12:36:18'
                    ] );

                    Faculty::create( [
                    'id'=>565,
                    'faculty_name'=>'Dr. Ganesh Dilwale',
                    'email'=>'dilwaleganesh10@gmail.com',
                    'mobile_no'=>'9503856300',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$VEQP.Hi/QqjJQzF7EHzNfe0WTxCZK/x8RiHgSSEBy5HKoUWB3DdLO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>3,
                    'college_id'=>74,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 12:39:01',
                    'updated_at'=>'2022-10-30 12:39:01'
                    ] );

                    Faculty::create( [
                    'id'=>566,
                    'faculty_name'=>'Dr. Ramesh Bhise',
                    'email'=>'bhiseramesh@gmail.com',
                    'mobile_no'=>'7387780212',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$V0U8xsco8DttrNYRwkJsYuEvsJRIxeZ81cf.Ckx/VYTjZkzoN98Gq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>10,
                    'department_id'=>3,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 12:46:28',
                    'updated_at'=>'2022-10-30 12:46:28'
                    ] );

                    Faculty::create( [
                    'id'=>567,
                    'faculty_name'=>'Prof. (Dr.) B. B. Bhosale',
                    'email'=>'bbbhosale68@gmail.com',
                    'mobile_no'=>'9767049090',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$MfpE5ae00Ry.6PuE0VfzE./egu3UGRQxu56ZwtiM3DblulZApLyvC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>14,
                    'department_id'=>3,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-30 12:51:23',
                    'updated_at'=>'2022-10-30 12:51:23'
                    ] );

                    Faculty::create( [
                    'id'=>568,
                    'faculty_name'=>'Dr. Dhanaraj Subhash Hadule',
                    'email'=>'dhanrajhadule@gmail.com',
                    'mobile_no'=>'8275473201',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$8E8jt5skLut.l57KPWrQ1uZs8gqaWfVtc.ZHHOj0X9QuOrAkb7GYe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>21,
                    'college_id'=>4,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 09:51:42',
                    'updated_at'=>'2022-10-31 09:51:42'
                    ] );

                    Faculty::create( [
                    'id'=>569,
                    'faculty_name'=>'Mr. Dilip Popat Bagul',
                    'email'=>'dbagul400@gmail.com',
                    'mobile_no'=>'7020187469',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$mbaHrjr5rA7Br6HAycv3eutJBiAo5I.SIMo4YKG5SVIizapjtsanq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>18,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 10:12:20',
                    'updated_at'=>'2022-10-31 10:12:20'
                    ] );

                    Faculty::create( [
                    'id'=>570,
                    'faculty_name'=>'Shreyas Pradip Kadarkar',
                    'email'=>'kadarkarshreyas@sangamnercolleg.edu.in',
                    'mobile_no'=>'9284198554',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$bMULJZ6EsvTRNKONMtN0XeV5I/ZFUjTzOYVelJMnNFE8iRTI4KFcu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>1,
                    'active'=>0,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 10:38:28',
                    'updated_at'=>'2022-12-21 06:44:55'
                    ] );

                    Faculty::create( [
                    'id'=>571,
                    'faculty_name'=>'Mrs.Joshi Nutan Prakash',
                    'email'=>'nutanjoshi950@gmail.com',
                    'mobile_no'=>'9730366293',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$CNROBgUoa63OLHiz7rd64ueVQkhJOjN5dSypMSmzRNfCKuIcAjBAW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>30,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 10:49:31',
                    'updated_at'=>'2022-10-31 10:49:31'
                    ] );

                    Faculty::create( [
                    'id'=>572,
                    'faculty_name'=>'Mr.Pathan Ashpak Kankar',
                    'email'=>'akpathan99@gmail.com',
                    'mobile_no'=>'9096813718',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$tJFWH54QKkHIqPRAGrxmnug3nMUwpLkYkCEZLym570kxWWrEnm1FO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 11:24:56',
                    'updated_at'=>'2022-10-31 11:24:56'
                    ] );

                    Faculty::create( [
                    'id'=>573,
                    'faculty_name'=>'Mr. Murtadak Balu Namdev',
                    'email'=>'bnmurtadak@gmail.com',
                    'mobile_no'=>'7620432456',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$qk1LbOObXybDC59r7zGJI.ezRZo4t1ZyIqfyBlq8WD7nDjYJ9jrny',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>11,
                    'college_id'=>58,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 12:01:06',
                    'updated_at'=>'2022-10-31 12:01:06'
                    ] );

                    Faculty::create( [
                    'id'=>574,
                    'faculty_name'=>'Dr. Santosh Ram Pagare',
                    'email'=>'srpagare@gmail.com',
                    'mobile_no'=>'9822191868',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$l7Cl1huxMX5ogtJEtdBva.JPKdzpw4gdClSuRL1RA/on5T089zTwy',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>11,
                    'college_id'=>36,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 13:57:22',
                    'updated_at'=>'2022-10-31 13:57:22'
                    ] );

                    Faculty::create( [
                    'id'=>575,
                    'faculty_name'=>'Kanchan Suresh Shete',
                    'email'=>'kanchanshete21@gmail.com',
                    'mobile_no'=>'9423003923',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$VCj7eQHW75FH0m2FJUBdIu1Sbum94gos4dnzLPELu/BfgTiXNY69i',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>29,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 14:02:29',
                    'updated_at'=>'2022-10-31 14:02:29'
                    ] );

                    Faculty::create( [
                    'id'=>576,
                    'faculty_name'=>'Sarika Balasaheb Perane',
                    'email'=>'sarikaperane@gmail.com',
                    'mobile_no'=>'9970191971',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$G8EgIBVLQJQpnA3S5Sv9hOYKMmdH2EoxNMKY/1jNsr8aO9HSgF6QK',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>15,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 14:19:54',
                    'updated_at'=>'2022-10-31 14:19:54'
                    ] );

                    Faculty::create( [
                    'id'=>577,
                    'faculty_name'=>'Dr. P. S. Sable',
                    'email'=>'purnimasable@gmail.com',
                    'mobile_no'=>'7588693379',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$NZgyCS/5b1DJtZ46f8n/Su5SkBk8XD.95Hhf9TvdWbrgI3MJh/8MW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>5,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 14:26:47',
                    'updated_at'=>'2022-10-31 14:26:47'
                    ] );

                    Faculty::create( [
                    'id'=>578,
                    'faculty_name'=>'Sahane Gokul Balchandra',
                    'email'=>'sahanegokul26@gmail.com',
                    'mobile_no'=>'9921024641',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$E5..i9A47jsMXTWD1uuA/eKyHrphn.22BMw75K5SKvCAMGrLYw.cu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>34,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 14:34:48',
                    'updated_at'=>'2022-10-31 14:34:48'
                    ] );

                    Faculty::create( [
                    'id'=>579,
                    'faculty_name'=>'Aher Pravin Pandurang',
                    'email'=>'pravinaher88@gmail.com',
                    'mobile_no'=>'8698514894',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Zn.RUSc5YTThjnfSzgET1OvvuUQb9ojNCEpfugsrRHGa2Db2O6OLW',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>108,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 14:39:57',
                    'updated_at'=>'2022-10-31 14:39:57'
                    ] );

                    Faculty::create( [
                    'id'=>580,
                    'faculty_name'=>'Gunjal Rohini Sandip',
                    'email'=>'rohinijadhav64@gmail.com',
                    'mobile_no'=>'9657590902',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$pjXxKL02zxMC0xjzNjzyQexhNVrp0g3zrtoGdDRuwxmJcR66nQcDi',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 15:25:05',
                    'updated_at'=>'2022-10-31 15:25:05'
                    ] );

                    Faculty::create( [
                    'id'=>581,
                    'faculty_name'=>'Kakade Nitin Ekanath',
                    'email'=>'nitin.kakade@pravara.in',
                    'mobile_no'=>'9970204211',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$CTEDQaT3lvB9KgSFjnyGS.8e38wkMYEAZnYR5Tfywt3J4rOrhf8Ju',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>95,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 15:31:02',
                    'updated_at'=>'2022-10-31 15:31:02'
                    ] );

                    Faculty::create( [
                    'id'=>582,
                    'faculty_name'=>'Dr. Sweety Khandre',
                    'email'=>'sweetykhandre18@gmail.com',
                    'mobile_no'=>'9890662549',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$A3Gj/Jm8zCZ0fiOUgdIL4.dtS/VP6tDDgyPM4i.gVzkiZ50U1RAnS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>21,
                    'college_id'=>80,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 15:32:41',
                    'updated_at'=>'2022-10-31 15:32:41'
                    ] );

                    Faculty::create( [
                    'id'=>594,
                    'faculty_name'=>'Kolekar Shivaji Shrimant',
                    'email'=>'sshivaji50@gmail.com',
                    'mobile_no'=>'9975300812',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$SzkUL1YBOl4Qr9xzf6yx9uWe32ZUVXAjqJ5YiXZzPB1NIpYTw3HcC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>97,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 17:06:20',
                    'updated_at'=>'2022-10-31 17:06:20'
                    ] );

                    Faculty::create( [
                    'id'=>595,
                    'faculty_name'=>'Dr. Amit Shivajirao Waghmare',
                    'email'=>'asw6807@gmail.com',
                    'mobile_no'=>'9850518810',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$alYxQWTMSPeEKiif6D.Bv.utCtypUPIP7V.WXoSArrnjVYen8a4wG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>9,
                    'department_id'=>6,
                    'college_id'=>7,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 20:33:30',
                    'updated_at'=>'2022-10-31 20:33:30'
                    ] );

                    Faculty::create( [
                    'id'=>596,
                    'faculty_name'=>'Dr. Anil Gorakshnath Gadhave',
                    'email'=>'anilgadhave@gmail.com',
                    'mobile_no'=>'9922827545',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$VSDLkmYtMpV1WFFTw4oOfOIs5Cr7/kiVWvNUNVntBtpMWYoBecLoy',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>6,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 20:38:07',
                    'updated_at'=>'2022-10-31 20:38:07'
                    ] );

                    Faculty::create( [
                    'id'=>597,
                    'faculty_name'=>'Gandhe Shrikant Purushottam',
                    'email'=>'gandhe50@gmail.com',
                    'mobile_no'=>'9850922225',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$.eZtSYsgEHk1V.yJXfx9TexmquxMON1kn4yYRZ0ZYFqPnmKdQgFcS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>2,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 22:13:33',
                    'updated_at'=>'2022-10-31 22:13:33'
                    ] );

                    Faculty::create( [
                    'id'=>598,
                    'faculty_name'=>'Kulkarni Sushma Chandrashekhar',
                    'email'=>'sckulkarni12@gmail.com',
                    'mobile_no'=>'9764495229',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$EdDaPube/IRB6xoTCX6GreHY.xg/hpcDnzqDFkIH0Ffmg57yQnYJq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>2,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 22:18:26',
                    'updated_at'=>'2022-10-31 22:18:26'
                    ] );

                    Faculty::create( [
                    'id'=>599,
                    'faculty_name'=>'Madhukar Sarvottam Zambare',
                    'email'=>'drmsz29@gmail.com',
                    'mobile_no'=>'9823120331',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$/V5HXqArU1Ha1LB33DCXs.9Jfs2SZsku.8V5szEAI9fqKiA.W3TJ6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>2,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 22:23:37',
                    'updated_at'=>'2022-10-31 22:23:37'
                    ] );

                    Faculty::create( [
                    'id'=>600,
                    'faculty_name'=>'Dr. Shalmali Gadge',
                    'email'=>'thipse.shalmali@gmail.com',
                    'mobile_no'=>'9850967688',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$jLcQz0RT/x9ZXrtshh4Kq.e4WwXqo4gnwcjJ462cC1T0aV0oUbWZu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>109,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-10-31 23:46:18',
                    'updated_at'=>'2022-10-31 23:46:18'
                    ] );

                    Faculty::create( [
                    'id'=>601,
                    'faculty_name'=>'Mr Rakesh Mali',
                    'email'=>'rkshml1@gmail.com',
                    'mobile_no'=>'8830390646',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$El7tR9rIWrKsHCkmiHsp5e3BVUJMxcjqTVkkdsAb7uztntb33dy2K',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 09:02:06',
                    'updated_at'=>'2022-11-01 09:02:06'
                    ] );

                    Faculty::create( [
                    'id'=>602,
                    'faculty_name'=>'Dr Madhav Radhakisan Yeshwant',
                    'email'=>'yeshwantmr@gmail.com',
                    'mobile_no'=>'9822794992',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$wxehblwo3nTNMAHVBomRo.fLEgYH9sso.1IfWMIB5DaVTHdbMvski',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>91,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 09:06:49',
                    'updated_at'=>'2022-11-01 09:06:49'
                    ] );

                    Faculty::create( [
                    'id'=>603,
                    'faculty_name'=>'Mr Rahul Vijay Pancham',
                    'email'=>'rahul.pancham28@gmail.com',
                    'mobile_no'=>'9921274721',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$qz/Fd.BV2tMFvIsEVe3.yuCCYmSFWvD0D4PmyVvcZOvi8g/0zBqQO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>4,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 09:18:41',
                    'updated_at'=>'2022-11-01 09:18:41'
                    ] );

                    Faculty::create( [
                    'id'=>607,
                    'faculty_name'=>'Mr.Joshi Pushkar Dilip',
                    'email'=>'cdjpushkarjoshi@gmail.com',
                    'mobile_no'=>'9766087063',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$2CHik.zdY90Hp6JUVryxQeqK6yGGUsSRHplreokjQcYpdrYq8TCMu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>15,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 10:49:29',
                    'updated_at'=>'2022-11-01 10:49:29'
                    ] );

                    Faculty::create( [
                    'id'=>612,
                    'faculty_name'=>'Dr Shrikant Rambhau Susar',
                    'email'=>'shrikanta.susar@gmail.com',
                    'mobile_no'=>'9511841320',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Scmwk53I87EJpVZjH2Zide8rEMzHG2Z4sTzD.0w5LtAubAbBsCiqC',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 12:56:19',
                    'updated_at'=>'2022-11-01 12:56:19'
                    ] );

                    Faculty::create( [
                    'id'=>614,
                    'faculty_name'=>'Gade Pratima  Abhijeet',
                    'email'=>'pratimagade.pg@gmail.com',
                    'mobile_no'=>'7972308040',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$Vw/f5yTW7a.1D21hO.IFI.lNKUJ8tjbmLFAbfGqziF2DeSkqqlKoi',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 13:16:46',
                    'updated_at'=>'2022-11-01 13:16:46'
                    ] );

                    Faculty::create( [
                    'id'=>615,
                    'faculty_name'=>'Ms.Kumudini Sagar Jadhav',
                    'email'=>'kumudini.gondhali@pravara.in',
                    'mobile_no'=>'9960975979',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$3oM57131K.WW2nlThfH5PeQQ8s1kJXilONgQJOkZ8iygzgZSFKWue',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>95,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-01 14:08:43',
                    'updated_at'=>'2022-11-01 14:08:43'
                    ] );

                    Faculty::create( [
                    'id'=>619,
                    'faculty_name'=>'Miss. Pradnya Popatrao Padekar',
                    'email'=>'pradnya.padekar@suryadatta.edu.in',
                    'mobile_no'=>'8788099928',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$g/pWLHju5DC7D6dbJOmWXehY4TrWUXVWVZZKkJqPlzcno/1p11kui',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>23,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-03 16:59:24',
                    'updated_at'=>'2022-11-03 16:59:24'
                    ] );

                    Faculty::create( [
                    'id'=>630,
                    'faculty_name'=>'Satpute Rajshree Gorakshanath',
                    'email'=>'rajshreesatpute@sangamnercollege.edu.in',
                    'mobile_no'=>'8766405355',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$LGNa.O8MVaN8JWi9ACgswOcZxnvgJpU9hQBY77fdaGxhZaJSbJ3cm',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-03 15:59:12',
                    'created_at'=>'2022-11-04 16:20:29',
                    'updated_at'=>'2023-12-03 15:59:12'
                    ] );

                    Faculty::create( [
                    'id'=>631,
                    'faculty_name'=>'Raut Rahul Balasaheb',
                    'email'=>'raut280@gmail.com',
                    'mobile_no'=>'8329859680',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$uAHO4cMCgk5lE2vB7wRypeUgNX466e6K/wn6GGJw4Fsm8Px5At/4i',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>73,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-04 16:29:29',
                    'updated_at'=>'2022-11-04 16:29:29'
                    ] );

                    Faculty::create( [
                    'id'=>632,
                    'faculty_name'=>'Bakare Rohit Dilip',
                    'email'=>'rohit.bakare@gmail.com',
                    'mobile_no'=>'9922810719',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$DoozWVsbbQQ/jqmTlPk91evvn7wCvrM.DqmW.2CR15H6sBffQp2i6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>73,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-04 16:31:55',
                    'updated_at'=>'2022-11-04 16:31:55'
                    ] );

                    Faculty::create( [
                    'id'=>635,
                    'faculty_name'=>'Dr. Bharat Shenkar',
                    'email'=>'btshenkar@gmail.com',
                    'mobile_no'=>'9423164521',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$CZBsqfcsPzyUZP9ejAjNQOIW/xREA.nbbSO5nmKFXNsIN3ph0.2mS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>13,
                    'college_id'=>3,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-05 08:48:00',
                    'updated_at'=>'2022-11-05 08:48:00'
                    ] );

                    Faculty::create( [
                    'id'=>636,
                    'faculty_name'=>'Dr. Sahebrao Gaikwad',
                    'email'=>'sahebraogaikwad66@gmail.com',
                    'mobile_no'=>'9423388442',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$KdGAaholeed9lI/dJfPpMOG29PubsGc.ZKHFhJTaDbTdxQo18NSP.',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>13,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-05 08:51:06',
                    'updated_at'=>'2022-11-05 08:51:06'
                    ] );

                    Faculty::create( [
                    'id'=>638,
                    'faculty_name'=>'Dr. Sunil Vyavhare',
                    'email'=>'syvkinwat@gmail.com',
                    'mobile_no'=>'9822618580',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$c8hwcjOIx0/tYaY8oBssZ.EKtESWSVoShVqapRkVe9bIOY2mdf1Uq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>10,
                    'department_id'=>13,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-05 09:02:30',
                    'updated_at'=>'2022-11-05 09:02:30'
                    ] );

                    Faculty::create( [
                    'id'=>640,
                    'faculty_name'=>'MR. KADAM ABHIJIT BALASAHEB',
                    'email'=>'kadamabhijit403@gmail.com',
                    'mobile_no'=>'9699573009',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$xbG/mVJGjdwMKPR3IlS0DuSWvGRLZpgC7KifOyoI/6S7lRCx/2mBO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>23,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-05 15:34:16',
                    'updated_at'=>'2022-11-05 15:34:16'
                    ] );

                    Faculty::create( [
                    'id'=>641,
                    'faculty_name'=>'Dr. Borhade Shobha Sakharam',
                    'email'=>'borhadeshobha@gmail.com',
                    'mobile_no'=>'9960872151',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$8gOzJg8K8o58w33RpY0Zeu/mNOQ/tp3Gq27.gGFdG/Yee3.9Npasu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>14,
                    'department_id'=>6,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-06 21:28:14',
                    'updated_at'=>'2022-11-06 21:28:14'
                    ] );

                    Faculty::create( [
                    'id'=>642,
                    'faculty_name'=>'MISS. JYOTI DESHMUKH',
                    'email'=>'jyotiajitdeshmukh@gmail.com',
                    'mobile_no'=>'9604077828',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$oZ3O90eohtEigkYJOTZAX.FkcW8/t5wu7Hyhe67RlNl.qc6CiAMPG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>15,
                    'college_id'=>83,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-07 13:50:14',
                    'updated_at'=>'2022-11-07 13:50:14'
                    ] );

                    Faculty::create( [
                    'id'=>646,
                    'faculty_name'=>'Gagare Sahebrao Rambhaji',
                    'email'=>'sahebraogagare@gmail.com',
                    'mobile_no'=>'9860061275',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$FLa2ukICFyLiPz264YNQSeLDSUykJR8lfet3qiSB85EU.CPO29HTq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>63,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-09 10:45:27',
                    'updated_at'=>'2022-11-09 10:45:27'
                    ] );

                    Faculty::create( [
                    'id'=>649,
                    'faculty_name'=>'Mr. Shreyas Pradip Kadarkar',
                    'email'=>'kadarkarshreyas@sangamnercollege.edu.in',
                    'mobile_no'=>'9284198554',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$4.YVjwKsuXPunmiGJ5fIBu7ko8mMk.AEWFXrO6MXkP5DiEwLW.Zum',
                    'remember_token'=>'2HlheBsQZCVxOSO4yqyxkbtOXUrky6bxOoCu9SoYPftJhapdcfFPtnO5txzp',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>11,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-06-02 11:27:59',
                    'created_at'=>'2022-11-17 11:06:09',
                    'updated_at'=>'2023-06-02 11:27:59'
                    ] );

                    Faculty::create( [
                    'id'=>656,
                    'faculty_name'=>'Dipak ashok unhale',
                    'email'=>'unhaledeepak137@gmail.com',
                    'mobile_no'=>'9823577174',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$oW45z/tIgv1EP4fRf.5UXe8xZYLWjwmHjdaw.7b1.olSAKes5.zoG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>24,
                    'college_id'=>19,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-11-19 12:54:47',
                    'updated_at'=>'2022-11-19 12:54:47'
                    ] );

                    Faculty::create( [
                    'id'=>658,
                    'faculty_name'=>'Ms. Pokharkar Rutuja Balu',
                    'email'=>'rutujapokharkar@sangamnercollege.edu.in',
                    'mobile_no'=>'9172087084',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$4aKifBBpV08ASmmLya7hbuMMWi7ndHUySUHmxYRs9rZm.B/0d9kbu',
                    'remember_token'=>'cgOUvoRIiMTf1XIru91JKfgVVJQEqVCOOgZ2eZ1f0sVfyjh2fovK3ff29gCV',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-06-20 07:03:18',
                    'created_at'=>'2022-12-16 07:20:29',
                    'updated_at'=>'2023-06-20 07:03:18'
                    ] );

                    Faculty::create( [
                    'id'=>662,
                    'faculty_name'=>'Dr. Khaire Promod Bhausaheb',
                    'email'=>'pramod.khaire70@gmail.com',
                    'mobile_no'=>'9822320040',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$z.pWQGTRM8U.JjNQTLtxCOev7qLcbOuLlggbqcOy3kSQ5.0j7Gt9O',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>33,
                    'college_id'=>100,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2022-12-20 09:41:18',
                    'updated_at'=>'2022-12-20 09:41:18'
                    ] );

                    Faculty::create( [
                    'id'=>663,
                    'faculty_name'=>'Mr. Bambale Ashok Ramdas',
                    'email'=>'ashokbambale@sangamnercollege.edu.in',
                    'mobile_no'=>'8830543156',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$mLtsMz4aYROCTH6H7r1nruPoCO8bUwt3uE8sTJqTNLxfBwW4B8cue',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-29 13:31:59',
                    'created_at'=>'2022-12-20 10:09:53',
                    'updated_at'=>'2023-12-29 13:31:59'
                    ] );

                    Faculty::create( [
                    'id'=>664,
                    'faculty_name'=>'Ms. Shelke Madhuri Dnyandev',
                    'email'=>'madhurishelke@sangamnercollege.edu.in',
                    'mobile_no'=>'9284796397',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$r3IHaODb.RsDkoFx5x08Veyw3enLcpEEwNaFTZtQLfMdAoT8ymO5C',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-01-28 06:41:17',
                    'created_at'=>'2022-12-20 10:22:48',
                    'updated_at'=>'2023-01-28 06:41:17'
                    ] );

                    Faculty::create( [
                    'id'=>665,
                    'faculty_name'=>'Ms. Gadakh Dipali Gorakshanath',
                    'email'=>'dipali@sangamnercollege.edu.in',
                    'mobile_no'=>'9130605754',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$N6G/U4qg0wGnwsziRybZueGj1PMKR./M9rntDBH9k9gXJvmOzN7M6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-08-19 06:20:38',
                    'created_at'=>'2022-12-20 10:26:32',
                    'updated_at'=>'2023-08-19 06:20:38'
                    ] );

                    Faculty::create( [
                    'id'=>666,
                    'faculty_name'=>'Mr. Balsane Sachin Vasant',
                    'email'=>'sachinbalsane@sangamnercollege.edu.in',
                    'mobile_no'=>'8600178172',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$EbNvhGTLUyYxn/LIgJf3ieXkkh7EDdWtOkPM0snGVxrdgnLnbKL1G',
                    'remember_token'=>'n6VDpMrmqSRaaVf3zTmj1GZYUwkH28PBUyYcYlh08fBISLmZj9SGn6qqqtRY',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>6,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-05-15 10:36:09',
                    'created_at'=>'2022-12-20 11:17:10',
                    'updated_at'=>'2023-05-15 10:36:09'
                    ] );

                    Faculty::create( [
                    'id'=>667,
                    'faculty_name'=>'Ms. Rahane Jayshree Kailas',
                    'email'=>'jrahane@sangamnercollege.edu.in',
                    'mobile_no'=>'9604409848',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$m1QvpqxRGcy1cMNVlRuTn.rFvELLX/Crlih0xzOf4006TSTcyeffu',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>3,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-05-18 11:45:28',
                    'created_at'=>'2022-12-20 11:21:04',
                    'updated_at'=>'2023-05-18 11:45:28'
                    ] );

                    Faculty::create( [
                    'id'=>672,
                    'faculty_name'=>'Mr. Gunjal Keshav Rambhau',
                    'email'=>'keshavgunjal@sangamnercollege.edu.in',
                    'mobile_no'=>'7972299879',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$OX75A2PtFZE1tK7a.6NJReaAi/XEoLIAZ4mpydixcG6G.1MKEAVT2',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>25,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-28 06:20:42',
                    'created_at'=>'2022-12-20 11:42:18',
                    'updated_at'=>'2024-01-28 06:20:42'
                    ] );

                    Faculty::create( [
                    'id'=>673,
                    'faculty_name'=>'Mr. Mahind Dhananjay Nivas',
                    'email'=>'mahind@sangamnercollege.edu.in',
                    'mobile_no'=>'9075913030',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$e2A3Upec1At/PiI5NVUBBuUuUfJ1wia3CBGWnku3jnmg5TMyKLVcO',
                    'remember_token'=>'zCd5RVy6mGQPwKDuYj2Dvpp5BJtlcVKy93zXsFFVWQ71gzttvBXiRxA7qxtV',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>25,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-03-01 07:14:28',
                    'created_at'=>'2022-12-20 11:52:13',
                    'updated_at'=>'2023-03-01 07:14:28'
                    ] );

                    Faculty::create( [
                    'id'=>682,
                    'faculty_name'=>'Prof. Shepal Ashwini Ramdas',
                    'email'=>'ashwinishepal@sangamnercollege.edu.in',
                    'mobile_no'=>'9284088592',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$ATJB0uOpERNSNbCxjpuXSegjT56RcsMJu9QvM9DC8LgyV0K4PMc7O',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-13 10:02:12',
                    'created_at'=>'2023-01-24 10:57:28',
                    'updated_at'=>'2023-12-13 10:02:12'
                    ] );

                    Faculty::create( [
                    'id'=>684,
                    'faculty_name'=>'Prof. Walunj Pooja Sudhakar',
                    'email'=>'poojawalunj@sangamnercollege.edu.in',
                    'mobile_no'=>'9765404206',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$2lJQ2CaKD61dPLTAUzEuMOgrLSFEMW1n7nUWvQl6KFnVAZUO4NCXy',
                    'remember_token'=>'5MVQ0cSHMDfeKDavfW5pU00LwMOPGeHb4u70XeRmOFkkuO1ln9VviGJRAAZv',
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>10,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-14 07:03:02',
                    'created_at'=>'2023-01-25 11:05:42',
                    'updated_at'=>'2023-12-14 07:03:02'
                    ] );

                    Faculty::create( [
                    'id'=>694,
                    'faculty_name'=>'Nitin Annasaheb Varpe',
                    'email'=>'sfc.sangamnercollege@gmail.com',
                    'mobile_no'=>'8668371897',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$r4Q7TouH0I.3HTDGBAkDgOMxhuhDduTBXSQseA3ppCvurQHm0wjbe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>24,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-01-26 00:12:19',
                    'updated_at'=>'2023-01-26 00:12:19'
                    ] );

                    Faculty::create( [
                    'id'=>701,
                    'faculty_name'=>'Ganesh Haribhau Nimase',
                    'email'=>'ganeshnimase55@gmail.com',
                    'mobile_no'=>'9404281828',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$pnQGuQZ8rZ8h.VVmu4HlWOfO0nrZ5SwM6eghOzo.i7funC5z.S4ue',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>21,
                    'college_id'=>59,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-21 05:01:43',
                    'updated_at'=>'2023-03-21 05:01:43'
                    ] );

                    Faculty::create( [
                    'id'=>702,
                    'faculty_name'=>'Sachin Dattatray Kharde',
                    'email'=>'khardesachin@gmail.com',
                    'mobile_no'=>'9860487788',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$iwjPzKggyH/qMomRYj36POZWrHEtsyVS/Sor3UVa8xdm3of36rFuO',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>100,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-28 08:00:31',
                    'updated_at'=>'2023-03-28 08:00:31'
                    ] );

                    Faculty::create( [
                    'id'=>703,
                    'faculty_name'=>'Prof.Vishal Vasantrao Satav',
                    'email'=>'vishal.satav@yahoo.com',
                    'mobile_no'=>'9552003426',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$iBKKAuDSvEGGb6GWyzT5mOqjqz6muZkLJJDiekevnPbSmODKeWFVe',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>100,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-28 08:15:04',
                    'updated_at'=>'2023-03-28 08:15:04'
                    ] );

                    Faculty::create( [
                    'id'=>704,
                    'faculty_name'=>'Mrs.Sunita.S.Punde',
                    'email'=>'sonupunde8888@gmail.com',
                    'mobile_no'=>'9119595967',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$uiaod12tKEDsFNSxmssmnedmtI5WBWW9V/YtOL55AZW292I6wpgzS',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-28 08:41:19',
                    'updated_at'=>'2023-03-28 08:41:19'
                    ] );

                    Faculty::create( [
                    'id'=>705,
                    'faculty_name'=>'Rahane Sachin Dashrath',
                    'email'=>'sachinrahane707@gmail.com',
                    'mobile_no'=>'7387567797',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$hxjcyqmoGAWCJSfJKAZOJ.zhPD5RZlwRTLnvluPinJUkn1gg6ocmq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>22,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2023-12-27 15:13:43',
                    'created_at'=>'2023-03-28 08:50:47',
                    'updated_at'=>'2023-12-27 15:13:43'
                    ] );

                    Faculty::create( [
                    'id'=>706,
                    'faculty_name'=>'Ms Komal Nanasaheb Mhaske',
                    'email'=>'komalmhaske469@gmail.com',
                    'mobile_no'=>'7057773508',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$5olAeowyO07.5aVINCjk8.AzymlcrHjMdIWkgAkFrBnenYmsgOWOa',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>78,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-28 09:37:12',
                    'updated_at'=>'2023-03-28 09:37:12'
                    ] );

                    Faculty::create( [
                    'id'=>707,
                    'faculty_name'=>'Mr Shakh Salim Nisar',
                    'email'=>'salimnshaikh786@gmail.com',
                    'mobile_no'=>'9762438668',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$v.fherxc60UKB/2pGEfn8.oSlXVUTvnX41VjrXNVIDvx0ooBwRUv.',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>14,
                    'college_id'=>2,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-28 09:43:02',
                    'updated_at'=>'2023-03-28 09:43:02'
                    ] );

                    Faculty::create( [
                    'id'=>708,
                    'faculty_name'=>'Shinde Kashmira Kailas',
                    'email'=>'kashmirashinde247@gmail.com',
                    'mobile_no'=>'9158037061',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$8.mDBexsmH8kn1OtHiU0IetlUdU3QrkW5wfM1BkTEl/Nclxl5H3a2',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>1,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>'2024-01-04 13:20:50',
                    'created_at'=>'2023-03-31 06:46:33',
                    'updated_at'=>'2024-01-04 13:20:50'
                    ] );

                    Faculty::create( [
                    'id'=>709,
                    'faculty_name'=>'Mr.Vinodkumar Pandurang Pathade',
                    'email'=>'pathadevinod@gmail.com',
                    'mobile_no'=>'9975627161',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$/9mpQTIUz4ZkgMWNJX5qyeXr8qYpkWmZ6cBh2aFYr71Gs9mpEtmFG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>111,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-31 11:30:07',
                    'updated_at'=>'2023-03-31 11:30:07'
                    ] );

                    Faculty::create( [
                    'id'=>710,
                    'faculty_name'=>'Ms.Komal Suyog Kadam',
                    'email'=>'kmlsskr@gmail.com',
                    'mobile_no'=>'9511836687',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$rm3.tJUgCoqVb6SmYBx0MOqGNRfZrG5fvCxnlrTf6JVr.PIChV/1S',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>112,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-03-31 11:38:55',
                    'updated_at'=>'2023-03-31 11:38:55'
                    ] );

                    Faculty::create( [
                    'id'=>715,
                    'faculty_name'=>'Mr. Kiran Kailas Ambre',
                    'email'=>'kkambre16987@gmail.com',
                    'mobile_no'=>'9373893422',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$333vG4lPUicO.TvchNQTKuE07yixx7cGv8Ew4DFJJ.ZoLaonegQ2G',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>11,
                    'department_id'=>1,
                    'college_id'=>4,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-01 05:11:11',
                    'updated_at'=>'2023-04-01 05:11:11'
                    ] );

                    Faculty::create( [
                    'id'=>717,
                    'faculty_name'=>'Dr.Irole Sandeep Vitthal',
                    'email'=>'sandeep.irole20@gmail.com',
                    'mobile_no'=>'9922752290',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$5g.vjiQQ59EZLjkTsk0cquKH5RUyKdpYs4shS31kuKLDf0eGO9yA.',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>16,
                    'college_id'=>44,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-01 07:20:52',
                    'updated_at'=>'2023-04-01 07:20:52'
                    ] );

                    Faculty::create( [
                    'id'=>718,
                    'faculty_name'=>'Dr. Ambadas Sampat Kapadi',
                    'email'=>'kapadiambadas@gmail.com',
                    'mobile_no'=>'9423060348',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$AvWLdhy3RuLfIZIYRA7YFuaDz4VKFngck1.drprtzKbt/.B7ROZCi',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>9,
                    'department_id'=>16,
                    'college_id'=>29,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-01 07:29:17',
                    'updated_at'=>'2023-04-01 07:29:17'
                    ] );

                    Faculty::create( [
                    'id'=>720,
                    'faculty_name'=>'Mr. Tanaji H. Sawant',
                    'email'=>'tanajisawant13@gmail.com',
                    'mobile_no'=>'8308176221',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$af74vs75HXdDCMdCMqIzRe95G23YrlkYDNsQnAFL24SenG2qb.hJm',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>26,
                    'college_id'=>3,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-01 14:46:01',
                    'updated_at'=>'2023-04-01 14:46:01'
                    ] );

                    Faculty::create( [
                    'id'=>722,
                    'faculty_name'=>'CA Priyanka D Deshmukh',
                    'email'=>'capriyankadeshmukh20@gmail.com',
                    'mobile_no'=>'7757966149',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$SHAzpDbxzOL5stg/itsVuu/RAf9gRQ0N.JA1td5AnIK3wzIt98Ra6',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>26,
                    'college_id'=>39,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-01 15:13:13',
                    'updated_at'=>'2023-04-01 15:13:13'
                    ] );

                    Faculty::create( [
                    'id'=>723,
                    'faculty_name'=>'Mr. Nishant Sureshkumar Sutare',
                    'email'=>'sutarens.dc@gmail.com',
                    'mobile_no'=>'9890163252',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$tcUtyFVCM2rM6qdeTEgd9eo0OFIDX8q2rHAQQTwtReTAMaEuj3JJq',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>23,
                    'college_id'=>1,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-03 05:19:51',
                    'updated_at'=>'2023-04-03 05:19:51'
                    ] );

                    Faculty::create( [
                    'id'=>734,
                    'faculty_name'=>'Mr.Gopal Vijay Boob',
                    'email'=>'gopalboob@gmail.com',
                    'mobile_no'=>'9890418839',
                    'email_verified_at'=>NULL,
                    'password'=>'$2y$10$L/.5Sj7qPL6RbRIu6yCOSu1Bqukq3eHn2Q2bztOTHLSEKMEpI7ThG',
                    'remember_token'=>NULL,
                    'profile_photo_path'=>NULL,
                    'unipune_id'=>NULL,
                    'qualification'=>NULL,
                    'role_id'=>8,
                    'department_id'=>28,
                    'college_id'=>110,
                    'active'=>1,
                    'last_login'=>NULL,
                    'created_at'=>'2023-04-03 11:31:53',
                    'updated_at'=>'2023-04-03 11:31:53'
                    ] );

                    // fggfgfdgdgdfg

                    Faculty::create( [
                        'id'=>735,
                        'faculty_name'=>'Pooja kawalnen. Gakkhad',
                        'email'=>'gakkhadpuja@gmail.com',
                        'mobile_no'=>'9834805586',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$Udp3zMsTr6wbjm1SQ9pnsuIl8hR5flRYQyB/nBCiSbGt4eubQa4Dm',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>9,
                        'college_id'=>36,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-04 12:08:54',
                        'updated_at'=>'2023-04-04 12:08:54'
                        ] );

                        Faculty::create( [
                        'id'=>737,
                        'faculty_name'=>'Sagar Sambhaji Thosar',
                        'email'=>'sthosar97@gmail.com',
                        'mobile_no'=>'7276203998',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$tLzPtM1aNmwgiyVopcFpfuMZGIHUBJfLrapyOBA8fdqn6AiYnrjIu',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>11,
                        'department_id'=>3,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-05 04:06:21',
                        'updated_at'=>'2023-04-05 04:06:21'
                        ] );

                        Faculty::create( [
                        'id'=>738,
                        'faculty_name'=>'Mr.Bade Rajesh Keshav',
                        'email'=>'rajebade@gmail.com',
                        'mobile_no'=>'9422484804',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$hAdqLdJdKpPviwHL8pBaBOy2Rrnd40zxwsQ9hzAu6.TfClcnKx18K',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>27,
                        'college_id'=>60,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-05 06:18:11',
                        'updated_at'=>'2023-04-05 06:18:11'
                        ] );

                        Faculty::create( [
                        'id'=>767,
                        'faculty_name'=>'Dr. Gholap Sachin Ashok',
                        'email'=>'sachu.eco@gmail.com',
                        'mobile_no'=>'8007209887',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$Q84tF7jdAMqY5WNFdt4BZOD6R0GFKv5Ksy5BBi7iTbfzIdNQqblCe',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>9,
                        'department_id'=>16,
                        'college_id'=>113,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-05 07:14:46',
                        'updated_at'=>'2023-04-05 07:14:46'
                        ] );

                        Faculty::create( [
                        'id'=>768,
                        'faculty_name'=>'Mr. Sushant Dhananjay Chougule',
                        'email'=>'sushantchougule@sangamnercollege.edu.in',
                        'mobile_no'=>'8686561008',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$DuitGit8wFpqR9roFzuzJ.h1MwrmO/ZDeqnR7Ge/5G9xuM3oZFTe2',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>24,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-08-27 13:07:08',
                        'created_at'=>'2023-04-05 13:34:46',
                        'updated_at'=>'2023-08-27 13:07:08'
                        ] );

                        Faculty::create( [
                        'id'=>771,
                        'faculty_name'=>'Miss. Kanhore Poonam Sampat',
                        'email'=>'kanhorepoonam94@gmail.com',
                        'mobile_no'=>'7620949294',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$6bgOlGJKGAKe0VPUPN0SKOLEpVTpr4TBh9Kk7uxbmAglR3uHtxuC.',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>22,
                        'college_id'=>78,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-06 08:55:09',
                        'updated_at'=>'2023-04-06 08:55:09'
                        ] );

                        Faculty::create( [
                        'id'=>775,
                        'faculty_name'=>'Mr. Momin Mahemud Patel',
                        'email'=>'patel.moin@rediffmail.com',
                        'mobile_no'=>'9975763527',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$s8qYySrb6J4IczyEf6aPv.hHXlSeET8BSAR6DedIXkny4ZiYMowGq',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>7,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-10 14:25:37',
                        'updated_at'=>'2023-04-10 14:25:37'
                        ] );

                        Faculty::create( [
                        'id'=>776,
                        'faculty_name'=>'Mr.Lande Rohidas Dnyaneshwar',
                        'email'=>'landerohidas@gmail.com',
                        'mobile_no'=>'9657633124',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$16ZTHeYq5xmyzRc1e/P2SulFUvCGLFOT.59J9cm9AF8oZ73oyPPR6',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>22,
                        'college_id'=>15,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-12 14:23:49',
                        'updated_at'=>'2023-04-12 14:23:49'
                        ] );

                        Faculty::create( [
                        'id'=>777,
                        'faculty_name'=>'Milita shashil Vanjare',
                        'email'=>'militavanjare@gmail.com',
                        'mobile_no'=>'7517909565',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$AH6/o3Q.IoQjEJSVHXWqKeotV1v.qBdQ.hUhNkDwHRDMRIkPva6XG',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>9,
                        'college_id'=>36,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-15 09:35:51',
                        'updated_at'=>'2023-04-15 09:35:51'
                        ] );

                        Faculty::create( [
                        'id'=>778,
                        'faculty_name'=>'Wakchaure Komal chandrakant',
                        'email'=>'komalwakchaure@sangamnercollege.edu.in\n',
                        'mobile_no'=>'918637744729',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$fmMJgOiH.noul5ECoMFGVezy.oKwR8A.B8/aRC.Jks5LZPbcoZWLG',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>'0',
                        'qualification'=>'M.Sc.',
                        'role_id'=>8,
                        'department_id'=>3,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-04-13 07:26:29',
                        'created_at'=>'2021-12-10 11:21:00',
                        'updated_at'=>'2023-04-13 07:26:29'
                        ] );

                        Faculty::create( [
                        'id'=>779,
                        'faculty_name'=>'Vishnu Ashok Adole',
                        'email'=>'vishnuadole86@gmail.com',
                        'mobile_no'=>'8830701585',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$ZXSH1KUvGShxk1E42mZerulM3ykPrGwwBXVuSld6Ks2qsvJWb3iZu',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>40,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-04-29 04:39:11',
                        'updated_at'=>'2023-04-29 04:39:11'
                        ] );

                        Faculty::create( [
                        'id'=>780,
                        'faculty_name'=>'Kanhore Poonam Santosh',
                        'email'=>'kanhorepoonam@gmail.com',
                        'mobile_no'=>'7620949294',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$m.5icqrZl3gmFLvsSqrWjOV/8455EZmy3Z4Ce.1hTfAE8G4ZHfbIG',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>1,
                        'college_id'=>78,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-05-03 06:51:10',
                        'updated_at'=>'2023-05-03 06:51:10'
                        ] );

                        Faculty::create( [
                        'id'=>781,
                        'faculty_name'=>'Jadhav Vishal Vasant',
                        'email'=>'saivishal.jadhav@gmail.com',
                        'mobile_no'=>'96658 33626',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$bNp4MdG0J7agXjvV5pCTGuYX/9OpujPBnxm4/sRGUcx8uOA0lHdvy',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>'',
                        'qualification'=>'M.Lib,PhD.',
                        'role_id'=>8,
                        'department_id'=>34,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-05-03 03:35:31',
                        'created_at'=>'2021-12-10 11:21:00',
                        'updated_at'=>'2023-05-03 03:35:31'
                        ] );

                        Faculty::create( [
                        'id'=>789,
                        'faculty_name'=>'Dr. Vijay Sopanrao Shedage',
                        'email'=>'vijayshedage2013@gmail.com',
                        'mobile_no'=>'9881926185',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$f/ZqCypkiebBeWH42BrPauqxI26xcDoDKeSDXzsGCRVOUO3b03DHW',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>14,
                        'department_id'=>21,
                        'college_id'=>2,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-06-10 11:28:09',
                        'updated_at'=>'2023-06-10 11:28:09'
                        ] );

                        Faculty::create( [
                        'id'=>790,
                        'faculty_name'=>'SAHANE PRANITA PRATAPRAO',
                        'email'=>'pranitasahane@sangamnercollege.edu.in',
                        'mobile_no'=>'8600301329',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$QFysKZE70mIaOmcuEcBiye6ypyzQBIwo/Qj.rRWkLZkuxyUPp2eyS',
                        'remember_token'=>'kl5iQGKAqq3l2tLR1SgEB0g3R4eINffUsu4dcYM5r0K9JQez2qhMRXW8jS3g',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>9,
                        'department_id'=>24,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2024-01-28 09:37:35',
                        'created_at'=>'2023-07-25 08:57:21',
                        'updated_at'=>'2024-01-28 09:37:35'
                        ] );

                        Faculty::create( [
                        'id'=>791,
                        'faculty_name'=>'Dokhe Prajakta Gajanan',
                        'email'=>'prajaktadokhe@sangamnercollege.edu.in',
                        'mobile_no'=>'9623869437',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$x.wVwFWvDSwwskpQoNBPjOZd6SHCEqXZ0vaOP5PiFwX3XGMx8vZvK',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>2,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2024-01-27 12:22:27',
                        'created_at'=>'2023-09-16 09:29:19',
                        'updated_at'=>'2024-01-27 12:22:27'
                        ] );

                        Faculty::create( [
                        'id'=>792,
                        'faculty_name'=>'PROF. GOPAL BALASAHEB SANAP',
                        'email'=>'gopalsanap@sangamnercollege.edu.in',
                        'mobile_no'=>'9604708768',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$rJ4IaWZ4Ga9Ba3WWqWUsQ.YIz4t0hKVTBk8DQr0tTM3FkAeuX7E0y',
                        'remember_token'=>'sTUERuKZwmKFhUsrfapcTZ8QPq3vS5tJApQAVzE6nRcHBH3tBvFiY6FfTdLO',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>12,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2024-01-25 14:55:37',
                        'created_at'=>'2023-09-16 09:38:13',
                        'updated_at'=>'2024-01-25 14:55:37'
                        ] );

                        Faculty::create( [
                        'id'=>793,
                        'faculty_name'=>'Ms. Holnor Samidha Sanjay',
                        'email'=>'samidha@sangamnercollege.edu.in',
                        'mobile_no'=>'7741810174',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$3O4.c0Bisqkr1.zLYQXSSu5h8dHYAolY7jJiyuJdpDHmI.OT3YMDu',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>13,
                        'department_id'=>5,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2024-01-25 14:42:03',
                        'created_at'=>'2023-09-16 09:55:34',
                        'updated_at'=>'2024-01-25 14:42:03'
                        ] );

                        Faculty::create( [
                        'id'=>794,
                        'faculty_name'=>'Ms. Wakchaure Shital Prabhakar',
                        'email'=>'shitalwakchaure@sangamnercollege.edu.in',
                        'mobile_no'=>'9657888928',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$uaWO8My8XvCDLxT.zDeOK.7csWpbsgWX6iu4dWB2JzzGRbwHE2AgG',
                        'remember_token'=>'M5Cb9hWAjSfA0HNpd6i7rxYt1WkAiGkfmujx3jTgfOV0W1AKsUWbl8Sr7pFV',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>13,
                        'department_id'=>14,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2024-01-19 03:37:28',
                        'created_at'=>'2023-09-16 11:11:16',
                        'updated_at'=>'2024-01-19 03:37:28'
                        ] );

                        Faculty::create( [
                        'id'=>795,
                        'faculty_name'=>'Ms. Dudi Kamala Jaggaram',
                        'email'=>'kamaladudi78@gmail.com',
                        'mobile_no'=>'9579226227',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$4vUK4C//u/IN2slFiicRt.EddP20J/n1OjW9tR.g08vhgpWU6rNaC',
                        'remember_token'=>'EWiMQhOu8iniigBSclS9cjscdcDf8cwd8yCvyNEBv1k66vDkRhrFEndLfUlE',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>13,
                        'department_id'=>19,
                        'college_id'=>1,
                        'active'=>0,
                        'last_login'=>'2023-12-22 05:12:57',
                        'created_at'=>'2023-09-16 11:27:25',
                        'updated_at'=>'2023-12-22 05:12:57'
                        ] );

                        Faculty::create( [
                        'id'=>799,
                        'faculty_name'=>'Ms. Deo Sukhada Rajan',
                        'email'=>'sukhada@sangamnercollege.edu.in',
                        'mobile_no'=>'9518901154',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$Ehku6VtwSkc5B0FnAwWH8uwI7lN0DV/H5J7HypaSa3hoLGj.Dl4dG',
                        'remember_token'=>'Q7S9rt9VAXzDu1KkHhguBM9f13Beyge2NP2FiBdWEoc3vpwYjhkQRPUrrC1W',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>13,
                        'department_id'=>11,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-12-28 06:39:33',
                        'created_at'=>'2023-09-16 11:46:46',
                        'updated_at'=>'2023-12-28 06:39:33'
                        ] );

                        Faculty::create( [
                        'id'=>800,
                        'faculty_name'=>'Mr Vijay Tanhaji Amle',
                        'email'=>'vijayamle1997@gmail.com',
                        'mobile_no'=>'9604661482',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$epJefkqI/G8Q8DLF/DZcVeRIjs9eTG/NAzYfgj0d4rT6qk0w/rY6i',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>14,
                        'college_id'=>60,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-09-28 05:15:21',
                        'updated_at'=>'2023-09-28 05:15:21'
                        ] );

                        Faculty::create( [
                        'id'=>801,
                        'faculty_name'=>'Nikita kashinath Nannaware',
                        'email'=>'nikitanannaware1999@gmail.com',
                        'mobile_no'=>'9322564324',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$1UtR8Fo7u36w5jMr0cOJpucYf5zNDBa7wttCyFC0YYo8ZZEM5TZde',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>9,
                        'college_id'=>73,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-09-28 13:37:43',
                        'updated_at'=>'2023-09-28 13:37:43'
                        ] );

                        Faculty::create( [
                        'id'=>802,
                        'faculty_name'=>'Mrs.Revagade Kavita Pundlik',
                        'email'=>'kavitarevgade@sangamnercollege.edu.in',
                        'mobile_no'=>'9665032378',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$BVmgi5QYOHlfk2aAFW96uug.jUo1BOockcjI892Z4JdzHS0wTplQu',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>27,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-12-21 05:26:59',
                        'created_at'=>'2023-09-30 05:16:41',
                        'updated_at'=>'2023-12-21 05:26:59'
                        ] );

                        Faculty::create( [
                        'id'=>803,
                        'faculty_name'=>'Nikam Mayuri Paraji',
                        'email'=>'nikam@sangamnercollege.edu.in',
                        'mobile_no'=>'8698510615',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$jRZRNMbDa0bf6WSPiXS9weXAFPoYNegjPkWFuH6qSqOJyaqSJoWNK',
                        'remember_token'=>'iHAYSyfa86b9RyhV2My8maknfPPQZ7dd92lUS5q70Z1YUlAK2BDGSVU2feSe',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-11-29 07:35:54',
                        'created_at'=>'2023-09-30 10:01:20',
                        'updated_at'=>'2023-11-29 07:35:54'
                        ] );

                        Faculty::create( [
                        'id'=>804,
                        'faculty_name'=>'Bansode Amruta Abhimanyu',
                        'email'=>'bansode@sangamnercollege.edu.in',
                        'mobile_no'=>'9309748958',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$6L1KTo8UWJzVbYJvPZEBg./QHJ0Ro2Di3w9grLuMgBmQxpnuH7cN2',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-12-31 06:56:02',
                        'created_at'=>'2023-09-30 10:09:54',
                        'updated_at'=>'2023-12-31 06:56:02'
                        ] );

                        Faculty::create( [
                        'id'=>805,
                        'faculty_name'=>'Singar Pranali Sanjay',
                        'email'=>'pranalisingar@sangamnercollege.edu.in',
                        'mobile_no'=>'9960791385',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$hHvXIBMjH42JLerLxAVHs.PPnqTIEe4XTcGZLue8lJR6cQllllFUi',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-12-31 06:59:31',
                        'created_at'=>'2023-09-30 10:19:36',
                        'updated_at'=>'2023-12-31 06:59:31'
                        ] );

                        Faculty::create( [
                        'id'=>806,
                        'faculty_name'=>'Shaikh Ifa Mukhtar',
                        'email'=>'ifashaikh@sangamnercollege.edu.in',
                        'mobile_no'=>'7276171731',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$ihO9kpoUT83em2FTyl9flOQTkD/blwYzIB/0GHJUy02nW.pm0fmz6',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-11-30 11:19:35',
                        'created_at'=>'2023-09-30 10:25:37',
                        'updated_at'=>'2023-11-30 11:19:35'
                        ] );

                        Faculty::create( [
                        'id'=>807,
                        'faculty_name'=>'Prof.Thorat M.D.',
                        'email'=>'manishathorat@sangamnercollege.edu.in',
                        'mobile_no'=>'9763768442',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$Xpcy2BG3RLxktvW8ezkvxeWDjN2dAndE534RmqMu3KVey3nk9z64G',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>28,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-12-07 03:50:46',
                        'created_at'=>'2023-09-30 11:18:12',
                        'updated_at'=>'2023-12-07 03:50:46'
                        ] );

                        Faculty::create( [
                        'id'=>808,
                        'faculty_name'=>'Mr Satish Sahebrao Vairal',
                        'email'=>'satishvairal@gmail.com',
                        'mobile_no'=>'9028039906',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$Ym2yD1BeTGWzdcp33UvV9e4xB7Y8IHdb4ZP.VPlOc.wbJdS59Fwre',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>14,
                        'college_id'=>73,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-09-30 11:28:36',
                        'updated_at'=>'2023-09-30 11:28:36'
                        ] );

                        Faculty::create( [
                        'id'=>812,
                        'faculty_name'=>'Dr. Sushma Jayvant Takate',
                        'email'=>'sjtakate26@gmail.com',
                        'mobile_no'=>'9921561255',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$/dy9h9jk3FTstWLweLiJkeSMshhJhSXtYdrTaNWhEQURi0ZrCEoqy',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>59,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-02 05:52:43',
                        'updated_at'=>'2023-10-02 05:52:43'
                        ] );

                        Faculty::create( [
                        'id'=>813,
                        'faculty_name'=>'Ms. Dhindale S. S.',
                        'email'=>'sulochana.dhindale11@gmail.com',
                        'mobile_no'=>'9762945941',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$sWV.pDYo0QvS83Cg0HVSXeNfkLnkaIicl1CPpJ6uzz6/9aG96sQeO',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>3,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-02 06:02:48',
                        'updated_at'=>'2023-10-02 06:02:48'
                        ] );

                        Faculty::create( [
                        'id'=>819,
                        'faculty_name'=>'Varsha Sadashiv Patil',
                        'email'=>'varshabot11@gmail.com',
                        'mobile_no'=>'7744051337',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$1puzBr.8erLMRxQK9F6mdet.hElmrVQUKdXarqt/2qzgK4WgWzC5i',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>5,
                        'college_id'=>85,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-02 08:00:36',
                        'updated_at'=>'2023-10-02 08:00:36'
                        ] );

                        Faculty::create( [
                        'id'=>820,
                        'faculty_name'=>'Male Dnyaneshwar Bhagwan',
                        'email'=>'dnyanumale11@gmail.com',
                        'mobile_no'=>'7385697752',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$FwQzVCQX9lzbpys7zZzg0u5DYBu46GZ9cKF2KbvRSGC7RhvFsqP8e',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>16,
                        'college_id'=>53,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-02 11:07:31',
                        'updated_at'=>'2023-10-02 11:07:31'
                        ] );

                        Faculty::create( [
                        'id'=>821,
                        'faculty_name'=>'Dr. Ravindra Ashok Jadhav',
                        'email'=>'ravindrajadhacitc@gmail.com',
                        'mobile_no'=>'7057328879',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$WiPbP5JxoxZRC3l.ZrhhAeHyeD7MAC4WeVMk43mPH8ei5Ii.VwS3y',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>11,
                        'department_id'=>11,
                        'college_id'=>36,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-03 04:44:17',
                        'updated_at'=>'2023-10-03 04:44:17'
                        ] );

                        Faculty::create( [
                        'id'=>822,
                        'faculty_name'=>'Dr. Sanjay Laxman Argade',
                        'email'=>'slargade@rediffmail.com',
                        'mobile_no'=>'9922720270',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$vylIy.eRPs0W29aYmJg0He6U/zhH7GXOd7fmK5fFCRRw42oDnDtPO',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>13,
                        'department_id'=>11,
                        'college_id'=>36,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-03 04:46:58',
                        'updated_at'=>'2023-10-03 04:46:58'
                        ] );

                        Faculty::create( [
                        'id'=>825,
                        'faculty_name'=>'Mr. Yogesh Bhausaheb Aher',
                        'email'=>'yogeshaher00@gmail.com',
                        'mobile_no'=>'9881744569',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$ZfBuGEbQ7MviVfaKey4M5uON5VYA2NG9y8R/UGEdShJgniUuNUI3e',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>11,
                        'college_id'=>108,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-03 08:12:54',
                        'updated_at'=>'2023-10-03 08:12:54'
                        ] );

                        Faculty::create( [
                        'id'=>840,
                        'faculty_name'=>'Dr.Dnyaneshwar S.Sanap',
                        'email'=>'sanapdnyanu90258@gmail.com',
                        'mobile_no'=>'9923915299',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$UkCmMwDgUJIPFtV30/8wD.W0abd3es4qjtSmNQXWZOf0Y0lSmtcpi',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>6,
                        'college_id'=>53,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-05 09:28:38',
                        'updated_at'=>'2023-10-05 09:28:38'
                        ] );

                        Faculty::create( [
                        'id'=>842,
                        'faculty_name'=>'Mr. Balasaheb Shrimantrao Sable',
                        'email'=>'balasaheb.sable@gmail.com',
                        'mobile_no'=>'8975028224',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$fgutiPHNiUQv1RM1MrZ8DeGkuPLA4HUKGx.3cjaKC5r0Qu.frA4zO',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>23,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>NULL,
                        'created_at'=>'2023-10-13 05:20:41',
                        'updated_at'=>'2023-10-13 05:20:41'
                        ] );

                        Faculty::create( [
                        'id'=>843,
                        'faculty_name'=>'Kolhe Pratiksha Ravindra',
                        'email'=>'pratikshakolhe@sangamnercollege.edu.in',
                        'mobile_no'=>'9309549722',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$XwN7bDT0G6zszto3.epATOF7Ov9cRq7VfpFNMBVUJosCIq9fx/kgO',
                        'remember_token'=>NULL,
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>8,
                        'department_id'=>1,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2024-01-24 10:52:44',
                        'created_at'=>'2023-10-17 16:31:23',
                        'updated_at'=>'2024-01-24 10:52:44'
                        ] );

                        Faculty::create( [
                        'id'=>849,
                        'faculty_name'=>'AISHWARYA SUNIL DANDAGE',
                        'email'=>'aishwarya@sangamnercollege.edu.in',
                        'mobile_no'=>'7391802985',
                        'email_verified_at'=>NULL,
                        'password'=>'$2y$10$aeIQnPeGWEuKtpruiaiwnezGDVsnlATM40fUWm5Coueki15ZPGF5m',
                        'remember_token'=>'2UEOEAftAtz3o0ga7xCvNYyvS3QYZty0wQ9vlGMJuWjyR2mZOTI3PYgbg6kV',
                        'profile_photo_path'=>NULL,
                        'unipune_id'=>NULL,
                        'qualification'=>NULL,
                        'role_id'=>11,
                        'department_id'=>6,
                        'college_id'=>1,
                        'active'=>1,
                        'last_login'=>'2023-12-07 07:15:04',
                        'created_at'=>'2023-11-03 08:44:37',
                        'updated_at'=>'2023-12-07 07:15:04'
                        ] );
    }
}
