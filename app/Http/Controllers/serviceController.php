<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Provider;
use App\Rate;
class serviceController extends Controller
{
       public function index()
    {
        $data['Services'] = Service::get();
        return $data;
    }

    public function getCur()
    {
      $jsonurl = "http://apilayer.net/api/live?access_key=6c0e6a7c35e24215f422c8c10c3efb57&currencies=EUR,GBP,JPY,CHF,CAD,AUD,NZD,AED,EGP,KWD,BHD,SAR,SDG,KMF,LTL,AZN,CNH,MRO,JOD,DZD,IQD,LYD,MKD,TND,BYN,INR,OMR,QAR,YER,MYR,KHR&source=USD&format=1";

      $json = file_get_contents($jsonurl);
      $bitcoin = json_decode($json);
      //$data = response()->json($bitcoin->quotes->USDEUR);
      $data['currency'][0] = ['cur_en'=>'MYR','cur_ar'=>'رينغيت ماليزي','price'=>$bitcoin->quotes->USDMYR/$bitcoin->quotes->USDEGP];
      $data['currency'][1] = ['cur_en'=>'EUR','cur_ar'=>'يورو','price'=>$bitcoin->quotes->USDEUR/$bitcoin->quotes->USDEGP];
      $data['currency'][2] = ['cur_en'=>'GBP','cur_ar'=>'جنية إسترليني','price'=>$bitcoin->quotes->USDGBP/$bitcoin->quotes->USDEGP];
      $data['currency'][3] = ['cur_en'=>'JPY','cur_ar'=>'ين ياباني','price'=>$bitcoin->quotes->USDJPY/$bitcoin->quotes->USDEGP];
      $data['currency'][4] = ['cur_en'=>'CHF','cur_ar'=>'فرنك سويسري','price'=>$bitcoin->quotes->USDCHF/$bitcoin->quotes->USDEGP];
      $data['currency'][5] = ['cur_en'=>'CAD','cur_ar'=>'دولار كندي','price'=>$bitcoin->quotes->USDCAD/$bitcoin->quotes->USDEGP];
      $data['currency'][6] = ['cur_en'=>'AUD','cur_ar'=>'دولار أسترالي','price'=>$bitcoin->quotes->USDAUD/$bitcoin->quotes->USDEGP];
      $data['currency'][7] = ['cur_en'=>'NZD','cur_ar'=>'دولار نيوزيلندي','price'=>$bitcoin->quotes->USDNZD/$bitcoin->quotes->USDEGP];
      $data['currency'][8] = ['cur_en'=>'AED','cur_ar'=>'درهم اماراتي','price'=>$bitcoin->quotes->USDAED/$bitcoin->quotes->USDEGP];
      $data['currency'][9] = ['cur_en'=>'EGP','cur_ar'=>'جنية مصري','price'=>$bitcoin->quotes->USDEGP/$bitcoin->quotes->USDEGP];
      $data['currency'][10] = ['cur_en'=>'KWD','cur_ar'=>'دينار كويتي','price'=>$bitcoin->quotes->USDKWD/$bitcoin->quotes->USDEGP];
      $data['currency'][11] = ['cur_en'=>'BHD','cur_ar'=>'دينار بحريني','price'=>$bitcoin->quotes->USDBHD/$bitcoin->quotes->USDEGP];
      $data['currency'][12] = ['cur_en'=>'SAR','cur_ar'=>'ريال السعودي','price'=>$bitcoin->quotes->USDSAR/$bitcoin->quotes->USDEGP];
      $data['currency'][13] = ['cur_en'=>'SDG','cur_ar'=>'جنيه السوداني','price'=>$bitcoin->quotes->USDSDG/$bitcoin->quotes->USDEGP];
      $data['currency'][14] = ['cur_en'=>'KMF','cur_ar'=>'فرنك القمري','price'=>$bitcoin->quotes->USDKMF/$bitcoin->quotes->USDEGP];
      $data['currency'][15] = ['cur_en'=>'MRO','cur_ar'=>'اوقية موريتانية','price'=>$bitcoin->quotes->USDMRO/$bitcoin->quotes->USDEGP];
      $data['currency'][16] = ['cur_en'=>'JOD','cur_ar'=>'دينار اردني','price'=>$bitcoin->quotes->USDJOD/$bitcoin->quotes->USDEGP];
      $data['currency'][17] = ['cur_en'=>'DZD','cur_ar'=>'دينار جزائري','price'=>$bitcoin->quotes->USDDZD/$bitcoin->quotes->USDEGP];
      $data['currency'][18] = ['cur_en'=>'IQD','cur_ar'=>'دينار عراقي','price'=>$bitcoin->quotes->USDIQD/$bitcoin->quotes->USDEGP];
      $data['currency'][19] = ['cur_en'=>'LYD','cur_ar'=>'دينار ليبي','price'=>$bitcoin->quotes->USDLYD/$bitcoin->quotes->USDEGP];
      $data['currency'][20] = ['cur_en'=>'TND','cur_ar'=>'دينارتونسي','price'=>$bitcoin->quotes->USDTND/$bitcoin->quotes->USDEGP];
      $data['currency'][21] = ['cur_en'=>'BYN','cur_ar'=>'روبل روسيا البيضاء','price'=>$bitcoin->quotes->USDBYN/$bitcoin->quotes->USDEGP];
      $data['currency'][22] = ['cur_en'=>'INR','cur_ar'=>'روبيه هنديه','price'=>$bitcoin->quotes->USDINR/$bitcoin->quotes->USDEGP];
      $data['currency'][23] = ['cur_en'=>'OMR','cur_ar'=>'ريال عماني','price'=>$bitcoin->quotes->USDOMR/$bitcoin->quotes->USDEGP];
      $data['currency'][24] = ['cur_en'=>'QAR','cur_ar'=>'ريال قطري','price'=>$bitcoin->quotes->USDQAR/$bitcoin->quotes->USDEGP];
      $data['currency'][25] = ['cur_en'=>'YER','cur_ar'=>'ريال يمني','price'=>$bitcoin->quotes->USDYER/$bitcoin->quotes->USDEGP];

      return $data;

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if( $data['ServiceResponse'] = Service::create(
            [
                'name'=>$request['name'],
                'provider_id'=>$request['provider_id'],
                'price'=>$request['price'],
                'description'=>$request['description'],
                'servicetype_id'=>$request['servicetype_id']
            ]))
       {
       		$data['message_en'] = "successfule added";
       		$data['message_ar'] = "تم الاضافة بنجاح";
       }
       else
       {
       		$data['message'] = "error";
       }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $data['services'] = Service::where('provider_id','=',$id)->with('servicetype')->get();
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     public function getAllCountries($id)
     {
        if($id == 2)
   {
 $data['data'][0] = ['name'=> 'Zimbabwe', 'code'=> 'ZW'];

        $data['data'][1] = ['name'=> 'Afghanistan', 'code'=> 'AF']; 
 $data['data'][2] = ['name'=> 'Aland Islands', 'code'=> 'AX']; 
 $data['data'][3] = ['name'=> 'Albania', 'code'=> 'AL']; 
 $data['data'][4] = ['name'=> 'Algeria', 'code'=> 'DZ']; 
 $data['data'][5] = ['name'=> 'AndorrA', 'code'=> 'AD']; 
 $data['data'][6] = ['name'=> 'Angola', 'code'=> 'AO']; 
 $data['data'][7] = ['name'=> 'Anguilla', 'code'=> 'AI']; 
 $data['data'][8] = ['name'=> 'Antarctica', 'code'=> 'AQ']; 
 $data['data'][9] = ['name'=> 'Antigua and Barbuda', 'code'=> 'AG']; 
 $data['data'][10] = ['name'=> 'Argentina', 'code'=> 'AR']; 
 $data['data'][11] = ['name'=> 'Armenia', 'code'=> 'AM']; 
 $data['data'][12] = ['name'=> 'Aruba', 'code'=> 'AW']; 
 $data['data'][13] = ['name'=> 'Australia', 'code'=> 'AU']; 
 $data['data'][14] = ['name'=> 'Austria', 'code'=> 'AT']; 
 $data['data'][15] = ['name'=> 'Azerbaijan', 'code'=> 'AZ']; 
 $data['data'][16] = ['name'=> 'Bahamas', 'code'=> 'BS']; 
 $data['data'][17] = ['name'=> 'Bahrain', 'code'=> 'BH']; 
 $data['data'][18] = ['name'=> 'Bangladesh', 'code'=> 'BD']; 
 $data['data'][19] = ['name'=> 'Barbados', 'code'=> 'BB']; 
 $data['data'][20] = ['name'=> 'Belarus', 'code'=> 'BY']; 
 $data['data'][21] = ['name'=> 'Belgium', 'code'=> 'BE']; 
 $data['data'][22] = ['name'=> 'Belize', 'code'=> 'BZ']; 
 $data['data'][23] = ['name'=> 'Benin', 'code'=> 'BJ']; 
 $data['data'][24] = ['name'=> 'Bermuda', 'code'=> 'BM']; 
 $data['data'][25] = ['name'=> 'Bhutan', 'code'=> 'BT']; 
 $data['data'][26] = ['name'=> 'Bolivia', 'code'=> 'BO']; 
 $data['data'][27] = ['name'=> 'Bosnia and Herzegovina', 'code'=> 'BA']; 
 $data['data'][28] = ['name'=> 'Botswana', 'code'=> 'BW']; 
 $data['data'][29] = ['name'=> 'Bouvet Island', 'code'=> 'BV']; 
 $data['data'][30] = ['name'=> 'Brazil', 'code'=> 'BR']; 
 $data['data'][30] = ['name'=> 'British Indian Ocean Territory', 'code'=> 'IO']; 
 $data['data'][32] = ['name'=> 'Brunei Darussalam', 'code'=> 'BN']; 
 $data['data'][33] = ['name'=> 'Bulgaria', 'code'=> 'BG']; 
 $data['data'][34] = ['name'=> 'Burkina Faso', 'code'=> 'BF']; 
 $data['data'][35] = ['name'=> 'Burundi', 'code'=> 'BI']; 
 $data['data'][36] = ['name'=> 'Cambodia', 'code'=> 'KH']; 
 $data['data'][37] = ['name'=> 'Cameroon', 'code'=> 'CM']; 
 $data['data'][38] = ['name'=> 'Canada', 'code'=> 'CA']; 
 $data['data'][39] = ['name'=> 'Cape Verde', 'code'=> 'CV']; 
 $data['data'][40] = ['name'=> 'Cayman Islands', 'code'=> 'KY']; 
 $data['data'][41] = ['name'=> 'Central African Republic', 'code'=> 'CF']; 
 $data['data'][42] = ['name'=> 'Chad', 'code'=> 'TD']; 
 $data['data'][43] = ['name'=> 'Chile', 'code'=> 'CL']; 
 $data['data'][44] = ['name'=> 'China', 'code'=> 'CN']; 
 $data['data'][45] = ['name'=> 'Christmas Island', 'code'=> 'CX']; 
 $data['data'][46] = ['name'=> 'Cocos (Keeling) Islands', 'code'=> 'CC']; 
 $data['data'][47] = ['name'=> 'Colombia', 'code'=> 'CO']; 
 $data['data'][48] = ['name'=> 'Comoros', 'code'=> 'KM']; 
 $data['data'][49] = ['name'=> 'Congo', 'code'=> 'CG']; 
 $data['data'][50] = ['name'=> 'Congo, The Democratic Republic of the', 'code'=> 'CD']; 
 $data['data'][51] = ['name'=> 'Cook Islands', 'code'=> 'CK']; 
 $data['data'][52] = ['name'=> 'Costa Rica', 'code'=> 'CR']; 
 $data['data'][53] = ['name'=> 'Cote D\'Ivoire', 'code'=> 'CI']; 
 $data['data'][54] = ['name'=> 'Croatia', 'code'=> 'HR']; 
 $data['data'][55] = ['name'=> 'Cuba', 'code'=> 'CU']; 
 $data['data'][56] = ['name'=> 'Cyprus', 'code'=> 'CY']; 
 $data['data'][57] = ['name'=> 'Czech Republic', 'code'=> 'CZ']; 
 $data['data'][58] = ['name'=> 'Denmark', 'code'=> 'DK']; 
 $data['data'][59] = ['name'=> 'Djibouti', 'code'=> 'DJ']; 
 $data['data'][60] = ['name'=> 'Dominica', 'code'=> 'DM']; 
 $data['data'][61] = ['name'=> 'Dominican Republic', 'code'=> 'DO']; 
 $data['data'][62] = ['name'=> 'Ecuador', 'code'=> 'EC']; 
 $data['data'][63] = ['name'=> 'Egypt', 'code'=> 'EG']; 
 $data['data'][64] = ['name'=> 'El Salvador', 'code'=> 'SV']; 
 $data['data'][65] = ['name'=> 'Equatorial Guinea', 'code'=> 'GQ']; 
 $data['data'][66] = ['name'=> 'Eritrea', 'code'=> 'ER']; 
 $data['data'][67] = ['name'=> 'Estonia', 'code'=> 'EE']; 
 $data['data'][68] = ['name'=> 'Ethiopia', 'code'=> 'ET']; 
 $data['data'][69] = ['name'=> 'Falkland Islands (Malvinas)', 'code'=> 'FK']; 
 $data['data'][70] = ['name'=> 'Faroe Islands', 'code'=> 'FO']; 
 $data['data'][71] = ['name'=> 'Fiji', 'code'=> 'FJ']; 
 $data['data'][72] = ['name'=> 'Finland', 'code'=> 'FI']; 
 $data['data'][73] = ['name'=> 'France', 'code'=> 'FR']; 
 $data['data'][74] = ['name'=> 'French Guiana', 'code'=> 'GF']; 
 $data['data'][75] = ['name'=> 'French Polynesia', 'code'=> 'PF']; 
 $data['data'][76] = ['name'=> 'French Southern Territories', 'code'=> 'TF']; 
 $data['data'][77] = ['name'=> 'Gabon', 'code'=> 'GA']; 
 $data['data'][78] = ['name'=> 'Gambia', 'code'=> 'GM']; 
 $data['data'][79] = ['name'=> 'Georgia', 'code'=> 'GE']; 
 $data['data'][80] = ['name'=> 'Germany', 'code'=> 'DE']; 
 $data['data'][81] = ['name'=> 'Ghana', 'code'=> 'GH']; 
 $data['data'][82] = ['name'=> 'Gibraltar', 'code'=> 'GI']; 
 $data['data'][83] = ['name'=> 'Greece', 'code'=> 'GR']; 
 $data['data'][84] = ['name'=> 'Greenland', 'code'=> 'GL']; 
 $data['data'][85] = ['name'=> 'Grenada', 'code'=> 'GD']; 
 $data['data'][86] = ['name'=> 'Guadeloupe', 'code'=> 'GP']; 
 $data['data'][87] = ['name'=> 'Guam', 'code'=> 'GU']; 
 $data['data'][88] = ['name'=> 'Guatemala', 'code'=> 'GT']; 
 $data['data'][89] = ['name'=> 'Guernsey', 'code'=> 'GG']; 
 $data['data'][90] = ['name'=> 'Guinea', 'code'=> 'GN']; 
 $data['data'][91] = ['name'=> 'Guinea-Bissau', 'code'=> 'GW']; 
 $data['data'][92] = ['name'=> 'Guyana', 'code'=> 'GY']; 
 $data['data'][93] = ['name'=> 'Haiti', 'code'=> 'HT']; 
 $data['data'][94] = ['name'=> 'Heard Island and Mcdonald Islands', 'code'=> 'HM']; 
 $data['data'][95] = ['name'=> 'Holy See (Vatican City State)', 'code'=> 'VA']; 
 $data['data'][96] = ['name'=> 'Honduras', 'code'=> 'HN']; 
 $data['data'][97] = ['name'=> 'Hong Kong', 'code'=> 'HK']; 
 $data['data'][98] = ['name'=> 'Hungary', 'code'=> 'HU']; 
 $data['data'][99] = ['name'=> 'Iceland', 'code'=> 'IS']; 
 $data['data'][100] = ['name'=> 'India', 'code'=> 'IN']; 
 $data['data'][101] = ['name'=> 'Indonesia', 'code'=> 'ID']; 
 $data['data'][102] = ['name'=> 'Iran, Islamic Republic Of', 'code'=> 'IR']; 
 $data['data'][103] = ['name'=> 'Iraq', 'code'=> 'IQ']; 
 $data['data'][104] = ['name'=> 'Ireland', 'code'=> 'IE']; 
 $data['data'][105] = ['name'=> 'Isle of Man', 'code'=> 'IM']; 
 $data['data'][106] = ['name'=> 'Israel', 'code'=> 'IL']; 
 $data['data'][107] = ['name'=> 'Italy', 'code'=> 'IT']; 
 $data['data'][108] = ['name'=> 'Jamaica', 'code'=> 'JM']; 
 $data['data'][109] = ['name'=> 'Japan', 'code'=> 'JP']; 
 $data['data'][110] = ['name'=> 'Jersey', 'code'=> 'JE']; 
 $data['data'][111] = ['name'=> 'Jordan', 'code'=> 'JO']; 
 $data['data'][112] = ['name'=> 'Kazakhstan', 'code'=> 'KZ']; 
 $data['data'][113] = ['name'=> 'Kenya', 'code'=> 'KE']; 
 $data['data'][114] = ['name'=> 'Kiribati', 'code'=> 'KI']; 
 $data['data'][115] = ['name'=> 'Korea, Democratic People\'S Republic of', 'code'=> 'KP']; 
 $data['data'][116] = ['name'=> 'Korea, Republic of', 'code'=> 'KR']; 
 $data['data'][117] = ['name'=> 'Kuwait', 'code'=> 'KW']; 
 $data['data'][118] = ['name'=> 'Kyrgyzstan', 'code'=> 'KG']; 
 $data['data'][119] = ['name'=> 'Lao People\'S Democratic Republic', 'code'=> 'LA']; 
 $data['data'][120] = ['name'=> 'Latvia', 'code'=> 'LV']; 
 $data['data'][121] = ['name'=> 'Lebanon', 'code'=> 'LB']; 
 $data['data'][122] = ['name'=> 'Lesotho', 'code'=> 'LS']; 
 $data['data'][123] = ['name'=> 'Liberia', 'code'=> 'LR']; 
 $data['data'][124] = ['name'=> 'Libyan Arab Jamahiriya', 'code'=> 'LY']; 
 $data['data'][125] = ['name'=> 'Liechtenstein', 'code'=> 'LI']; 
 $data['data'][126] = ['name'=> 'Lithuania', 'code'=> 'LT']; 
 $data['data'][127] = ['name'=> 'Luxembourg', 'code'=> 'LU']; 
 $data['data'][128] = ['name'=> 'Macao', 'code'=> 'MO']; 
 $data['data'][129] = ['name'=> 'Macedonia, The Former Yugoslav Republic of', 'code'=> 'MK']; 
 $data['data'][130] = ['name'=> 'Madagascar', 'code'=> 'MG']; 
 $data['data'][131] = ['name'=> 'Malawi', 'code'=> 'MW']; 
 $data['data'][132] = ['name'=> 'Malaysia', 'code'=> 'MY']; 
 $data['data'][133] = ['name'=> 'Maldives', 'code'=> 'MV']; 
 $data['data'][134] = ['name'=> 'Mali', 'code'=> 'ML']; 
 $data['data'][135] = ['name'=> 'Malta', 'code'=> 'MT']; 
 $data['data'][136] = ['name'=> 'Marshall Islands', 'code'=> 'MH']; 
 $data['data'][137] = ['name'=> 'Martinique', 'code'=> 'MQ']; 
 $data['data'][138] = ['name'=> 'Mauritania', 'code'=> 'MR']; 
 $data['data'][139] = ['name'=> 'Mauritius', 'code'=> 'MU']; 
 $data['data'][140] = ['name'=> 'Mayotte', 'code'=> 'YT']; 
 $data['data'][141] = ['name'=> 'Mexico', 'code'=> 'MX']; 
 $data['data'][142] = ['name'=> 'Micronesia, Federated States of', 'code'=> 'FM']; 
 $data['data'][143] = ['name'=> 'Moldova, Republic of', 'code'=> 'MD']; 
 $data['data'][144] = ['name'=> 'Monaco', 'code'=> 'MC']; 
 $data['data'][145] = ['name'=> 'Mongolia', 'code'=> 'MN']; 
 $data['data'][146] = ['name'=> 'Montserrat', 'code'=> 'MS']; 
 $data['data'][147] = ['name'=> 'Morocco', 'code'=> 'MA']; 
 $data['data'][148] = ['name'=> 'Mozambique', 'code'=> 'MZ']; 
 $data['data'][149] = ['name'=> 'Myanmar', 'code'=> 'MM']; 
 $data['data'][150] = ['name'=> 'Namibia', 'code'=> 'NA']; 
 $data['data'][151] = ['name'=> 'Nauru', 'code'=> 'NR']; 
 $data['data'][152] = ['name'=> 'Nepal', 'code'=> 'NP']; 
 $data['data'][153] = ['name'=> 'Netherlands', 'code'=> 'NL']; 
 $data['data'][154] = ['name'=> 'Netherlands Antilles', 'code'=> 'AN']; 
 $data['data'][155] = ['name'=> 'New Caledonia', 'code'=> 'NC']; 
 $data['data'][156] = ['name'=> 'New Zealand', 'code'=> 'NZ']; 
 $data['data'][157] = ['name'=> 'Nicaragua', 'code'=> 'NI']; 
 $data['data'][158] = ['name'=> 'Niger', 'code'=> 'NE']; 
 $data['data'][159] = ['name'=> 'Nigeria', 'code'=> 'NG']; 
 $data['data'][160] = ['name'=> 'Niue', 'code'=> 'NU']; 
 $data['data'][161] = ['name'=> 'Norfolk Island', 'code'=> 'NF']; 
 $data['data'][162] = ['name'=> 'Northern Mariana Islands', 'code'=> 'MP']; 
 $data['data'][163] = ['name'=> 'Norway', 'code'=> 'NO']; 
 $data['data'][164] = ['name'=> 'Oman', 'code'=> 'OM']; 
 $data['data'][165] = ['name'=> 'Pakistan', 'code'=> 'PK']; 
 $data['data'][166] = ['name'=> 'Palau', 'code'=> 'PW']; 
 $data['data'][167] = ['name'=> 'Palestinian Territory, Occupied', 'code'=> 'PS']; 
 $data['data'][168] = ['name'=> 'Panama', 'code'=> 'PA']; 
 $data['data'][169] = ['name'=> 'Papua New Guinea', 'code'=> 'PG']; 
 $data['data'][170] = ['name'=> 'Paraguay', 'code'=> 'PY']; 
 $data['data'][171] = ['name'=> 'Peru', 'code'=> 'PE']; 
 $data['data'][172] = ['name'=> 'Philippines', 'code'=> 'PH']; 
 $data['data'][173] = ['name'=> 'Pitcairn', 'code'=> 'PN']; 
 $data['data'][174] = ['name'=> 'Poland', 'code'=> 'PL']; 
 $data['data'][175] = ['name'=> 'Portugal', 'code'=> 'PT']; 
 $data['data'][176] = ['name'=> 'Puerto Rico', 'code'=> 'PR']; 
 $data['data'][177] = ['name'=> 'Qatar', 'code'=> 'QA']; 
 $data['data'][178] = ['name'=> 'Reunion', 'code'=> 'RE']; 
 $data['data'][179] = ['name'=> 'Romania', 'code'=> 'RO']; 
 $data['data'][180] = ['name'=> 'Russian Federation', 'code'=> 'RU']; 
 $data['data'][181] = ['name'=> 'RWANDA', 'code'=> 'RW']; 
 $data['data'][182] = ['name'=> 'Saint Helena', 'code'=> 'SH']; 
 $data['data'][183] = ['name'=> 'Saint Kitts and Nevis', 'code'=> 'KN']; 
 $data['data'][184] = ['name'=> 'Saint Lucia', 'code'=> 'LC']; 
 $data['data'][185] = ['name'=> 'Saint Pierre and Miquelon', 'code'=> 'PM']; 
 $data['data'][186] = ['name'=> 'Saint Vincent and the Grenadines', 'code'=> 'VC']; 
 $data['data'][187] = ['name'=> 'Samoa', 'code'=> 'WS']; 
 $data['data'][188] = ['name'=> 'San Marino', 'code'=> 'SM']; 
 $data['data'][189] = ['name'=> 'Sao Tome and Principe', 'code'=> 'ST']; 
 $data['data'][190] = ['name'=> 'Saudi Arabia', 'code'=> 'SA']; 
 $data['data'][191] = ['name'=> 'Senegal', 'code'=> 'SN']; 
 $data['data'][192] = ['name'=> 'Serbia and Montenegro', 'code'=> 'CS']; 
 $data['data'][193] = ['name'=> 'Seychelles', 'code'=> 'SC']; 
 $data['data'][194] = ['name'=> 'Sierra Leone', 'code'=> 'SL']; 
 $data['data'][195] = ['name'=> 'Singapore', 'code'=> 'SG']; 
 $data['data'][196] = ['name'=> 'Slovakia', 'code'=> 'SK']; 
 $data['data'][197] = ['name'=> 'Slovenia', 'code'=> 'SI']; 
 $data['data'][198] = ['name'=> 'Solomon Islands', 'code'=> 'SB']; 
 $data['data'][199] = ['name'=> 'Somalia', 'code'=> 'SO']; 
 $data['data'][200] = ['name'=> 'South Africa', 'code'=> 'ZA']; 
 $data['data'][201] = ['name'=> 'South Georgia and the South Sandwich Islands', 'code'=> 'GS']; 
 $data['data'][202] = ['name'=> 'Spain', 'code'=> 'ES']; 
 $data['data'][203] = ['name'=> 'Sri Lanka', 'code'=> 'LK']; 
 $data['data'][204] = ['name'=> 'Sudan', 'code'=> 'SD']; 
 $data['data'][205] = ['name'=> 'Suriname', 'code'=> 'SR']; 
 $data['data'][206] = ['name'=> 'Svalbard and Jan Mayen', 'code'=> 'SJ']; 
 $data['data'][207] = ['name'=> 'Swaziland', 'code'=> 'SZ']; 
 $data['data'][208] = ['name'=> 'Sweden', 'code'=> 'SE']; 
 $data['data'][209] = ['name'=> 'Switzerland', 'code'=> 'CH']; 
 $data['data'][210] = ['name'=> 'Syrian Arab Republic', 'code'=> 'SY']; 
 $data['data'][211] = ['name'=> 'Taiwan, Province of China', 'code'=> 'TW']; 
 $data['data'][212] = ['name'=> 'Tajikistan', 'code'=> 'TJ']; 
 $data['data'][213] = ['name'=> 'Tanzania, United Republic of', 'code'=> 'TZ']; 
 $data['data'][214] = ['name'=> 'Thailand', 'code'=> 'TH']; 
 $data['data'][215] = ['name'=> 'Timor-Leste', 'code'=> 'TL']; 
 $data['data'][216] = ['name'=> 'Togo', 'code'=> 'TG']; 
 $data['data'][217] = ['name'=> 'Tokelau', 'code'=> 'TK']; 
 $data['data'][218] = ['name'=> 'Tonga', 'code'=> 'TO']; 
 $data['data'][219] = ['name'=> 'Trinidad and Tobago', 'code'=> 'TT']; 
 $data['data'][220] = ['name'=> 'Tunisia', 'code'=> 'TN']; 
 $data['data'][221] = ['name'=> 'Turkey', 'code'=> 'TR']; 
 $data['data'][222] = ['name'=> 'Turkmenistan', 'code'=> 'TM']; 
 $data['data'][223] = ['name'=> 'Turks and Caicos Islands', 'code'=> 'TC']; 
 $data['data'][224] = ['name'=> 'Tuvalu', 'code'=> 'TV']; 
 $data['data'][225] = ['name'=> 'Uganda', 'code'=> 'UG']; 
 $data['data'][226] = ['name'=> 'Ukraine', 'code'=> 'UA']; 
 $data['data'][227] = ['name'=> 'United Arab Emirates', 'code'=> 'AE']; 
 $data['data'][228] = ['name'=> 'United Kingdom', 'code'=> 'GB']; 
 $data['data'][229] = ['name'=> 'United States', 'code'=> 'US']; 
 $data['data'][230] = ['name'=> 'United States Minor Outlying Islands', 'code'=> 'UM']; 
 $data['data'][231] = ['name'=> 'Uruguay', 'code'=> 'UY']; 
 $data['data'][232] = ['name'=> 'Uzbekistan', 'code'=> 'UZ']; 
 $data['data'][233] = ['name'=> 'Vanuatu', 'code'=> 'VU']; 
 $data['data'][234] = ['name'=> 'Venezuela', 'code'=> 'VE']; 
 $data['data'][235] = ['name'=> 'Viet Nam', 'code'=> 'VN']; 
 $data['data'][236] = ['name'=> 'Virgin Islands, British', 'code'=> 'VG']; 
 $data['data'][237] = ['name'=> 'Virgin Islands, U.S.', 'code'=> 'VI']; 
 $data['data'][238] = ['name'=> 'Wallis and Futuna', 'code'=> 'WF']; 
 $data['data'][239] = ['name'=> 'Western Sahara', 'code'=> 'EH']; 
 $data['data'][240] = ['name'=> 'Yemen', 'code'=> 'YE']; 
 $data['data'][241] = ['name'=> 'Zambia', 'code'=> 'ZM']; 
   

    }
    
   elseif($id == 1)
   {
       $data['data'][0] =   ['name'=> 'زيمبابوي', 'code'=> 'ZW']; 
 $data['data'][1] =   ['name'=> 'أفغانستان', 'code'=> 'AF']; 
 $data['data'][2] =   ['name'=> 'جزر آلاند', 'code'=> 'AX']; 
 $data['data'][3] =   ['name'=> 'ألبانيا', 'code'=> 'AL']; 
 $data['data'][4] =   ['name'=> 'الجزائر', 'code'=> 'DZ']; 
 $data['data'][5] =   ['name'=> 'ساموا الأمريكية', 'code'=> 'AS']; 
 $data['data'][6] =   ['name'=> 'أندورا', 'code'=> 'AD']; 
 $data['data'][7] =   ['name'=> 'أنغولا', 'code'=> 'AO']; 
 $data['data'][8] =   ['name'=> 'أنغيلا', 'code'=> 'AI']; 
 $data['data'][9] =   ['name'=> 'القارة القطبية الجنوبية', 'code'=> 'AQ']; 
 $data['data'][10] =   ['name'=> 'أنتيغوا وبربودا', 'code'=> 'AG']; 
 $data['data'][11] =   ['name'=> 'الأرجنتين', 'code'=> 'AR']; 
 $data['data'][12] =   ['name'=> 'أرمينيا', 'code'=> 'AM']; 
 $data['data'][13] =   ['name'=> 'أروبا', 'code'=> 'AW']; 
 $data['data'][14] =   ['name'=> 'أستراليا', 'code'=> 'AU']; 
 $data['data'][15] =   ['name'=> 'النمسا', 'code'=> 'AT']; 
 $data['data'][16] =   ['name'=> 'أذربيجان', 'code'=> 'AZ']; 
 $data['data'][17] =   ['name'=> 'الباهاما', 'code'=> 'BS']; 
 $data['data'][18] =   ['name'=> 'البحرين', 'code'=> 'BH']; 
 $data['data'][19] =   ['name'=> 'بنغلاديش', 'code'=> 'BD']; 
 $data['data'][20] =   ['name'=> 'بربادوس', 'code'=> 'BB']; 
 $data['data'][21] =   ['name'=> 'روسيا البيضاء', 'code'=> 'BY']; 
 $data['data'][22] =   ['name'=> 'بلجيكا', 'code'=> 'BE']; 
 $data['data'][23] =   ['name'=> 'بليز', 'code'=> 'BZ']; 
 $data['data'][24] =   ['name'=> 'بنين', 'code'=> 'BJ']; 
 $data['data'][25] =   ['name'=> 'برمودا', 'code'=> 'BM']; 
 $data['data'][26] =   ['name'=> 'بوتان', 'code'=> 'BT']; 
 $data['data'][27] =   ['name'=> 'بوليفيا', 'code'=> 'BO']; 
 $data['data'][28] =   ['name'=> 'البوسنة والهرسك', 'code'=> 'BA']; 
 $data['data'][29] =   ['name'=> 'بوتسوانا', 'code'=> 'BW']; 
 $data['data'][30] =   ['name'=> 'جزيرة بوفيت', 'code'=> 'BV']; 
 $data['data'][30] =   ['name'=> 'البرازيل', 'code'=> 'BR']; 
 $data['data'][32] =   ['name'=> 'إقليم المحيط البريطاني الهندي', 'code'=> 'IO']; 
 $data['data'][33] =   ['name'=> 'بروناي دار السلام', 'code'=> 'BN']; 
 $data['data'][34] =   ['name'=> 'بلغاريا', 'code'=> 'BG']; 
 $data['data'][35] =   ['name'=> 'بوركينا فاسو', 'code'=> 'BF']; 
 $data['data'][36] =   ['name'=> 'بوروندي', 'code'=> 'BI']; 
 $data['data'][37] =   ['name'=> 'كمبوديا', 'code'=> 'KH']; 
 $data['data'][38] =   ['name'=> 'الكاميرون', 'code'=> 'CM']; 
 $data['data'][39] =   ['name'=> 'كندا', 'code'=> 'CA']; 
 $data['data'][40] =   ['name'=> 'الرأس الأخضر', 'code'=> 'CV']; 
 $data['data'][41] =   ['name'=> 'جزر كايمان', 'code'=> 'KY']; 
 $data['data'][42] =   ['name'=> 'جمهورية افريقيا الوسطى', 'code'=> 'CF']; 
 $data['data'][43] =   ['name'=> 'تشاد', 'code'=> 'TD']; 
 $data['data'][44] =   ['name'=> 'تشيلي', 'code'=> 'CL']; 
 $data['data'][45] =   ['name'=> 'الصين', 'code'=> 'CN']; 
 $data['data'][46] =   ['name'=> 'جزيرة الكريسماس', 'code'=> 'CX']; 
 $data['data'][47] =   ['name'=> 'جزر كوكوس (كيلينغ)', 'code'=> 'CC']; 
 $data['data'][48] =   ['name'=> 'كولومبيا', 'code'=> 'CO']; 
 $data['data'][49] =   ['name'=> 'جزر القمر', 'code'=> 'KM']; 
 $data['data'][50] =   ['name'=> 'الكونغو', 'code'=> 'CG']; 
 $data['data'][51] =   ['name'=> 'جمهورية الكونغو الديمقراطية', 'code'=> 'CD']; 
 $data['data'][52] =   ['name'=> 'جزر كوك', 'code'=> 'CK']; 
 $data['data'][53] =   ['name'=> 'كوستا ريكا', 'code'=> 'CR']; 
 $data['data'][54] =   ['name'=> 'كوت ديفوار', 'code'=> 'CI']; 
 $data['data'][55] =   ['name'=> 'كرواتيا', 'code'=> 'HR']; 
 $data['data'][56] =   ['name'=> 'كوبا', 'code'=> 'CU']; 
 $data['data'][57] =   ['name'=> 'قبرص', 'code'=> 'CY']; 
 $data['data'][58] =   ['name'=> 'جمهورية التشيك', 'code'=> 'CZ']; 
 $data['data'][59] =   ['name'=> 'الدنمارك', 'code'=> 'DK']; 
 $data['data'][60] =   ['name'=> 'جيبوتي', 'code'=> 'DJ']; 
 $data['data'][61] =   ['name'=> 'دومينيكا', 'code'=> 'DM']; 
 $data['data'][62] =   ['name'=> 'الدومينيكانRepublic', 'code'=> 'DO']; 
 $data['data'][63] =   ['name'=> 'الإكوادور', 'code'=> 'EC']; 
 $data['data'][64] =   ['name'=> 'مصر', 'code'=> 'EG']; 
 $data['data'][65] =   ['name'=> 'السلفادور', 'code'=> 'SV']; 
 $data['data'][66] =   ['name'=> 'غينيا الإستوائية', 'code'=> 'GQ']; 
 $data['data'][67] =   ['name'=> 'إريتريا', 'code'=> 'ER']; 
 $data['data'][68] =   ['name'=> 'استونيا', 'code'=> 'EE']; 
 $data['data'][69] =   ['name'=> 'أثيوبيا', 'code'=> 'ET']; 
 $data['data'][70] =   ['name'=> 'جزر فوكلاند (مالفيناس)', 'code'=> 'FK']; 
 $data['data'][71] =   ['name'=> 'جزر صناعية', 'code'=> 'FO']; 
 $data['data'][72] =   ['name'=> 'فيجي', 'code'=> 'FJ']; 
 $data['data'][73] =   ['name'=> 'فنلندا', 'code'=> 'FI']; 
 $data['data'][74] =   ['name'=> 'فرنسا', 'code'=> 'FR']; 
 $data['data'][75] =   ['name'=> 'غيانا الفرنسية', 'code'=> 'GF']; 
 $data['data'][76] =   ['name'=> 'بولينيزيا الفرنسية', 'code'=> 'PF']; 
 $data['data'][77] =   ['name'=> 'المناطق الجنوبية لفرنسا', 'code'=> 'TF']; 
 $data['data'][78] =   ['name'=> 'الغابون', 'code'=> 'GA']; 
 $data['data'][79] =   ['name'=> 'غامبيا', 'code'=> 'GM']; 
 $data['data'][80] =   ['name'=> 'جورجيا', 'code'=> 'GE']; 
 $data['data'][81] =   ['name'=> 'ألمانيا', 'code'=> 'DE']; 
 $data['data'][82] =   ['name'=> 'غانا', 'code'=> 'GH']; 
 $data['data'][83] =   ['name'=> 'جبل طارق', 'code'=> 'GI']; 
 $data['data'][84] =   ['name'=> 'اليونان', 'code'=> 'GR']; 
 $data['data'][85] =   ['name'=> 'الأرض الخضراء', 'code'=> 'GL']; 
 $data['data'][86] =   ['name'=> 'غرينادا', 'code'=> 'GD']; 
 $data['data'][87] =   ['name'=> 'جوادلوب', 'code'=> 'GP']; 
 $data['data'][88] =   ['name'=> 'غوام', 'code'=> 'GU']; 
 $data['data'][89] =   ['name'=> 'غواتيمالا', 'code'=> 'GT']; 
 $data['data'][90] =   ['name'=> 'غيرنسي', 'code'=> 'GG']; 
 $data['data'][91] =   ['name'=> 'غينيا', 'code'=> 'GN']; 
 $data['data'][92] =   ['name'=> 'غينيا بيساو', 'code'=> 'GW']; 
 $data['data'][93] =   ['name'=> 'غيانا', 'code'=> 'GY']; 
 $data['data'][94] =   ['name'=> 'هايتي', 'code'=> 'HT']; 
 $data['data'][95] =   ['name'=> 'قلب الجزيرة وجزر ماكدونالز', 'code'=> 'HM']; 
 $data['data'][96] =   ['name'=> 'الكرسي الرسولي (دولة الفاتيكان)', 'code'=> 'VA']; 
 $data['data'][97] =   ['name'=> 'هندوراس', 'code'=> 'HN']; 
 $data['data'][98] =   ['name'=> 'هونغ كونغ', 'code'=> 'HK']; 
 $data['data'][99] =   ['name'=> 'اليونان', 'code'=> 'HU']; 
 $data['data'][100] =   ['name'=> 'أيسلندا', 'code'=> 'IS']; 
 $data['data'][101] =   ['name'=> 'الهند', 'code'=> 'IN']; 
 $data['data'][102] =   ['name'=> 'أندونيسيا', 'code'=> 'ID']; 
 $data['data'][103] =   ['name'=> 'إيران, الجمهورية الإسلامية', 'code'=> 'IR']; 
 $data['data'][104] =   ['name'=> 'العراق', 'code'=> 'IQ']; 
 $data['data'][105] =   ['name'=> 'أيرلندا', 'code'=> 'IE']; 
 $data['data'][106] =   ['name'=> 'جزيرة آيل أوف مان', 'code'=> 'IM']; 
 $data['data'][107] =   ['name'=> 'إسرائيل', 'code'=> 'IL']; 
 $data['data'][108] =   ['name'=> 'إيطاليا', 'code'=> 'IT']; 
 $data['data'][109] =   ['name'=> 'جامايكا', 'code'=> 'JM']; 
 $data['data'][110] =   ['name'=> 'اليابان', 'code'=> 'JP']; 
 $data['data'][111] =   ['name'=> 'جيرسي', 'code'=> 'JE']; 
 $data['data'][112] =   ['name'=> 'الأردن', 'code'=> 'JO']; 
 $data['data'][113] =   ['name'=> 'كازاخستان', 'code'=> 'KZ']; 
 $data['data'][114] =   ['name'=> 'كينيا', 'code'=> 'KE']; 
 $data['data'][115] =   ['name'=> 'كيريباس', 'code'=> 'KI']; 
 $data['data'][116] =   ['name'=> 'كوريا، الجمهورية الشعبية الديمقراطية', 'code'=> 'KP']; 
 $data['data'][117] =   ['name'=> 'جمهورية كوريا', 'code'=> 'KR']; 
 $data['data'][118] =   ['name'=> 'الكويت', 'code'=> 'KW']; 
 $data['data'][119] =   ['name'=> 'قرغيزستان', 'code'=> 'KG']; 
 $data['data'][120] =   ['name'=> 'جمهورية لاو الديمقراطية الشعبية', 'code'=> 'LA']; 
 $data['data'][121] =   ['name'=> 'لاتفيا', 'code'=> 'LV']; 
 $data['data'][122] =   ['name'=> 'لبنان', 'code'=> 'LB']; 
 $data['data'][123] =   ['name'=> 'ليسوتو', 'code'=> 'LS']; 
 $data['data'][124] =   ['name'=> 'ليبيريا', 'code'=> 'LR']; 
 $data['data'][125] =   ['name'=> 'الجماهيرية العربية الليبية', 'code'=> 'LY']; 
 $data['data'][126] =   ['name'=> 'ليختنشتاين', 'code'=> 'LI']; 
 $data['data'][127] =   ['name'=> 'ليتوانيا', 'code'=> 'LT']; 
 $data['data'][128] =   ['name'=> 'لوكسمبورغ', 'code'=> 'LU']; 
 $data['data'][129] =   ['name'=> 'ماكاو', 'code'=> 'MO']; 
 $data['data'][130] =   ['name'=> 'مقدونيا، جمهورية يوغوسلافيا السابقة', 'code'=> 'MK']; 
 $data['data'][131] =   ['name'=> 'مدغشقر', 'code'=> 'MG']; 
 $data['data'][132] =   ['name'=> 'مالاوي', 'code'=> 'MW']; 
 $data['data'][133] =   ['name'=> 'ماليزيا', 'code'=> 'MY']; 
 $data['data'][134] =   ['name'=> 'جزر المالديف', 'code'=> 'MV']; 
 $data['data'][135] =   ['name'=> 'مالي', 'code'=> 'ML']; 
 $data['data'][136] =   ['name'=> 'مالطا', 'code'=> 'MT']; 
 $data['data'][137] =   ['name'=> 'جزر مارشال', 'code'=> 'MH']; 
 $data['data'][138] =   ['name'=> 'مارتينيك', 'code'=> 'MQ']; 
 $data['data'][139] =   ['name'=> 'موريتانيا', 'code'=> 'MR']; 
 $data['data'][140] =   ['name'=> 'موريشيوس', 'code'=> 'MU']; 
 $data['data'][141] =   ['name'=> 'مايوت', 'code'=> 'YT']; 
 $data['data'][142] =   ['name'=> 'المكسيك', 'code'=> 'MX']; 
 $data['data'][143] =   ['name'=> 'ميكرونيزيا، ولايات - الموحدة', 'code'=> 'FM']; 
 $data['data'][144] =   ['name'=> 'جمهورية مولدوفا', 'code'=> 'MD']; 
 $data['data'][145] =   ['name'=> 'موناكو', 'code'=> 'MC']; 
 $data['data'][146] =   ['name'=> 'منغوليا', 'code'=> 'MN']; 
 $data['data'][147] =   ['name'=> 'مونتسيرات', 'code'=> 'MS']; 
 $data['data'][148] =   ['name'=> 'المغرب', 'code'=> 'MA']; 
 $data['data'][149] =   ['name'=> 'موزمبيق', 'code'=> 'MZ']; 
 $data['data'][150] =   ['name'=> 'ميانمار', 'code'=> 'MM']; 
 $data['data'][151] =   ['name'=> 'ناميبيا', 'code'=> 'NA']; 
 $data['data'][152] =   ['name'=> 'ناورو', 'code'=> 'NR']; 
 $data['data'][153] =   ['name'=> 'نيبال', 'code'=> 'NP']; 
 $data['data'][154] =   ['name'=> 'هولندا', 'code'=> 'NL']; 
 $data['data'][155] =   ['name'=> 'جزر الأنتيل الهولندية', 'code'=> 'AN']; 
 $data['data'][156] =   ['name'=> 'كاليدونيا الجديدة', 'code'=> 'NC']; 
 $data['data'][157] =   ['name'=> 'نيوزيلاندا', 'code'=> 'NZ']; 
 $data['data'][158] =   ['name'=> 'نيكاراغوا', 'code'=> 'NI']; 
 $data['data'][159] =   ['name'=> 'النيجر', 'code'=> 'NE']; 
 $data['data'][160] =   ['name'=> 'نيجيريا', 'code'=> 'NG']; 
 $data['data'][161] =   ['name'=> 'نيوي', 'code'=> 'NU']; 
 $data['data'][162] =   ['name'=> 'جزيرة نورفولك', 'code'=> 'NF']; 
 $data['data'][163] =   ['name'=> 'جزر مريانا الشمالية', 'code'=> 'MP']; 
 $data['data'][164] =   ['name'=> 'النرويج', 'code'=> 'NO']; 
 $data['data'][165] =   ['name'=> 'سلطنة عمان', 'code'=> 'OM']; 
 $data['data'][166] =   ['name'=> 'باكستان', 'code'=> 'PK']; 
 $data['data'][167] =   ['name'=> 'بالاو', 'code'=> 'PW']; 
 $data['data'][168] =   ['name'=> 'الأراضي الفلسطينية المحتلة', 'code'=> 'PS']; 
 $data['data'][169] =   ['name'=> 'بناما', 'code'=> 'PA']; 
 $data['data'][170] =   ['name'=> 'بابوا غينيا الجديدة', 'code'=> 'PG']; 
 $data['data'][171] =   ['name'=> 'باراغواي', 'code'=> 'PY']; 
 $data['data'][172] =   ['name'=> 'بيرو', 'code'=> 'PE']; 
 $data['data'][173] =   ['name'=> 'الفلبين', 'code'=> 'PH']; 
 $data['data'][174] =   ['name'=> 'بيتكيرن', 'code'=> 'PN']; 
 $data['data'][175] =   ['name'=> 'بولندا', 'code'=> 'PL']; 
 $data['data'][176] =   ['name'=> 'البرتغال', 'code'=> 'PT']; 
 $data['data'][177] =   ['name'=> 'بورتوريكو', 'code'=> 'PR']; 
 $data['data'][178] =   ['name'=> 'دولة قطر', 'code'=> 'QA'];  
 $data['data'][179] =   ['name'=> 'رومانيا', 'code'=> 'RO']; 
 $data['data'][180] =   ['name'=> 'الروسية', 'code'=> 'RU']; 
 $data['data'][181] =   ['name'=> 'رواندا', 'code'=> 'RW']; 
 $data['data'][182] =   ['name'=> 'سانت هيلانة', 'code'=> 'SH']; 
 $data['data'][183] =   ['name'=> 'سانت كيتس ونيفيس', 'code'=> 'KN']; 
 $data['data'][184] =   ['name'=> 'القديسة لوسيا', 'code'=> 'LC']; 
 $data['data'][185] =   ['name'=> 'سانت بيير وميكلون', 'code'=> 'PM']; 
 $data['data'][186] =   ['name'=> 'سانت فنسنت وجزر غرينادين', 'code'=> 'VC']; 
 $data['data'][187] =   ['name'=> 'ساموا', 'code'=> 'WS']; 
 $data['data'][188] =   ['name'=> 'سان مارينو', 'code'=> 'SM']; 
 $data['data'][189] =   ['name'=> 'ساو تومي وبرينسيبي', 'code'=> 'ST']; 
 $data['data'][190] =   ['name'=> 'المملكة العربية السعودية', 'code'=> 'SA']; 
 $data['data'][191] =   ['name'=> 'السنغال', 'code'=> 'SN']; 
 $data['data'][192] =   ['name'=> 'صربيا والجبل الأسود', 'code'=> 'CS']; 
 $data['data'][193] =   ['name'=> 'سيشيل', 'code'=> 'SC']; 
 $data['data'][194] =   ['name'=> 'سيرا ليون', 'code'=> 'SL']; 
 $data['data'][195] =   ['name'=> 'سنغافورة', 'code'=> 'SG']; 
 $data['data'][196] =   ['name'=> 'سلوفاكيا', 'code'=> 'SK']; 
 $data['data'][197] =   ['name'=> 'سلوفينيا', 'code'=> 'SI']; 
 $data['data'][198] =   ['name'=> 'جزر سليمان', 'code'=> 'SB']; 
 $data['data'][199] =   ['name'=> 'الصومال', 'code'=> 'SO']; 
 $data['data'][200] =   ['name'=> 'جنوب أفريقيا', 'code'=> 'ZA']; 
 $data['data'][201] =   ['name'=> 'جورجيا الجنوبية وجزر ساندويتش الجنوبية', 'code'=> 'GS']; 
 $data['data'][202] =   ['name'=> 'إسبانيا', 'code'=> 'ES']; 
 $data['data'][203] =   ['name'=> 'سيريلانكا', 'code'=> 'LK']; 
 $data['data'][204] =   ['name'=> 'سودان', 'code'=> 'SD']; 
 $data['data'][205] =   ['name'=> 'سورينام', 'code'=> 'SR']; 
 $data['data'][206] =   ['name'=> 'سفالبارد وجان ماين', 'code'=> 'SJ']; 
 $data['data'][207] =   ['name'=> 'سوازيلاند', 'code'=> 'SZ']; 
 $data['data'][208] =   ['name'=> 'السويد', 'code'=> 'SE']; 
 $data['data'][209] =   ['name'=> 'سويسرا', 'code'=> 'CH']; 
 $data['data'][210] =   ['name'=> 'الجمهورية العربية السورية', 'code'=> 'SY']; 
 $data['data'][211] =   ['name'=> 'تايوان، مقاطعة الصين', 'code'=> 'TW']; 
 $data['data'][212] =   ['name'=> 'طاجيكستان', 'code'=> 'TJ']; 
 $data['data'][213] =   ['name'=> 'جمهورية تنزانيا المتحدة', 'code'=> 'TZ']; 
 $data['data'][214] =   ['name'=> 'تايلاند', 'code'=> 'TH']; 
 $data['data'][215] =   ['name'=> 'تيمور الشرقية', 'code'=> 'TL']; 
 $data['data'][216] =   ['name'=> 'توجو', 'code'=> 'TG']; 
 $data['data'][217] =   ['name'=> 'توكيلاو', 'code'=> 'TK']; 
 $data['data'][218] =   ['name'=> 'تونغا', 'code'=> 'TO']; 
 $data['data'][219] =   ['name'=> 'ترينداد وتوباغو', 'code'=> 'TT']; 
 $data['data'][220] =   ['name'=> 'تونس', 'code'=> 'TN']; 
 $data['data'][221] =   ['name'=> 'تركيا', 'code'=> 'TR']; 
 $data['data'][222] =   ['name'=> 'تركمانستان', 'code'=> 'TM']; 
 $data['data'][223] =   ['name'=> 'جزر تركس وكايكوس', 'code'=> 'TC']; 
 $data['data'][224] =   ['name'=> 'توفالو', 'code'=> 'TV']; 
 $data['data'][225] =   ['name'=> 'أوغندا', 'code'=> 'UG']; 
 $data['data'][226] =   ['name'=> 'أوكرانيا', 'code'=> 'UA']; 
 $data['data'][227] =   ['name'=> 'الإمارات العربية المتحدة', 'code'=> 'AE']; 
 $data['data'][228] =   ['name'=> 'المملكة المتحدة', 'code'=> 'GB']; 
 $data['data'][229] =   ['name'=> 'الولايات المتحدة الامريكانية', 'code'=> 'US']; 
 $data['data'][230] =   ['name'=> 'جزر الولايات المتحدة البعيدة الصغرى', 'code'=> 'UM']; 
 $data['data'][231] =   ['name'=> 'أوروغواي', 'code'=> 'UY']; 
 $data['data'][232] =   ['name'=> 'أوزبكستان', 'code'=> 'UZ']; 
 $data['data'][233] =   ['name'=> 'فانواتو', 'code'=> 'VU']; 
 $data['data'][234] =   ['name'=> 'فنزويلا', 'code'=> 'VE']; 
 $data['data'][235] =   ['name'=> 'فييت نام', 'code'=> 'VN']; 
 $data['data'][236] =   ['name'=> 'جزر العذراء البريطانية', 'code'=> 'VG']; 
 $data['data'][237] =   ['name'=> 'جزر فيرجن, U.S.', 'code'=> 'VI']; 
 $data['data'][238] =   ['name'=> 'واليس وفوتونا', 'code'=> 'WF']; 
 $data['data'][239] =   ['name'=> 'الصحراء الغربية', 'code'=> 'EH']; 
 $data['data'][240] =   ['name'=> 'اليمن', 'code'=> 'YE']; 
 $data['data'][241] =   ['name'=> 'زامبيا', 'code'=> 'ZM']; 
   

 
    }
    
        return $data;

     }
    public function search(Request $request)
    {
    
    $data['provider'] = Provider::with('rates')->withCount('rates')->with('services')->join('services', 'provider.id', '=', 'services.provider_id')->where('services.servicetype_id','=',$request['serviceType'])->where('name', 'LIKE', '%'.$request['search'].'%')->get();
    //whereBetween('price', [$min_price, $max_price])
	
    $data1 = array();
     $arr = array();
    $ix =0;
    foreach($data['provider'] as $data1)
    {
    	$sum = 0 ;
    	if(isset($request['to']))
	{
		
		$ddaa = Service::where('provider_id','=',$data1->id)->where('price', '>=',intval($request['from']))->where('price', '<=',intval($request['to']))->where('name', 'LIKE', '%'.$request['search'].'%')->get();
		if(sizeof($ddaa) != 0)
		{ 
			foreach($data1->rates as $dataRate)
		    	{
		    		$sum += $dataRate->rate;
		    	}
		    	if($data1->rates_count !=0)
		    	 $data1->rate = $sum / $data1->rates_count;
		    	 else
		    	 $data1->rate=0;
		    	 $arr[$ix] =  $data1;
		    	 $ix++;
		}
		
	}
	else
	{
		foreach($data1->rates as $dataRate)
		    	{
		    		$sum += $dataRate->rate;
		    	}
		    	if($data1->rates_count !=0)
		    	 $data1->rate = $sum / $data1->rates_count;
		    	 else
		    	 $data1->rate=0;
		    	 $arr[$ix] =  $data1;
		    	 $ix++;
	
	}
	
    	
    	
    }
    
        /* $data1['rates'] = Rate::where('provider_id','=',$id)->get();
	  $sum = 0;
	  $count = 0;
	  foreach ($data1['rates'] as $key => $value) {
	    $count++;
	   
	
	    $sum += $value->rate;
	  }
	if($sum == 0 || $count == 0)
	{
	$data['provider']->rate = 0;
	  }
	  else
	  {
	   $rate = $sum/$count;
	  $data['provider']->rate = $rate;
	  }*/
         ///
        //$providers= Provider::join('services', 'provider.id', '=', 'services.provider_id')->join('rate', 'rate.provider_id', '=','provider.id' )->where('services.servicetype_id','=',$type_id)->where('name', 'LIKE', '%'.$search.'%')->get();
        //$provider['data']=Provider::get();
        if(isset($request['sort']))
        {
            if($request['sort'] == 1)
            {
	        for($x = 0 ; $x < sizeof($arr) ; $x++)
	        {
	        	for($y = $x ; $y < sizeof($arr) ; $y++)
	        	{
	        		if($arr[$x]->rate < $arr[$y]->rate)
	        		{
	        		     $swap=$arr[$x] ;
	        		     $arr[$x] = $arr[$y];
	        		     $arr[$y] = $swap;
	        		}
	        	}
	        }
	     }
	     elseif($request['sort'] == 0)
	     {
	     	for($x = 0 ; $x < sizeof($arr) ; $x++)
	        {
	        	for($y = $x ; $y < sizeof($arr) ; $y++)
	        	{
	        		if($arr[$x]->rate > $arr[$y]->rate)
	        		{
	        		     $swap=$arr[$x] ;
	        		     $arr[$x] = $arr[$y];
	        		     $arr[$y] = $swap;
	        		}
	        	}
	        }
	     }
        }
     	$arrData['data'] = $arr;
        return $arrData;
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['ServiceTypeResponse'] = Service::where('id','=',$id)->update(
            [
                'name'=>$request['name'],
                'description'=>$request['description'],
                'servicetype_id'=>$request['servicetype_id'],
                'price'=>$request['price']
            ]);
            $data['message_en'] = 'successfully edit';
            $data['message_ar'] = 'تم التعديل بنجاح';
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['ServiceTypeResponse'] = Service::where('id','=',$id)->delete();
        $data['message_en'] = 'Delete Successfully';
        $data['message_ar'] = 'تم المسح بنجاح';
        return $data;
    }
}
