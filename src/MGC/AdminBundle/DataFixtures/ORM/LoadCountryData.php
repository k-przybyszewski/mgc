<?php

namespace MGC\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use MGC\AdminBundle\Entity\Country;

class LoadCountryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }

    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
       $country = new Country();
       $country->setName("Afghanistan");
       $country->setNationality("Afghanistan");
       $country->setIso("AF");
       $country->setIso3("AFG");
       $country->setNumCode("4 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Albania");
       $country->setNationality("Albania");
       $country->setIso("AL");
       $country->setIso3("ALB");
       $country->setNumCode("8 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Algeria");
       $country->setNationality("Algeria");
       $country->setIso("DZ");
       $country->setIso3("DZA");
       $country->setNumCode("12 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("American Samoa");
       $country->setNationality("American Samoa");
       $country->setIso("AS");
       $country->setIso3("ASM");
       $country->setNumCode("16 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Andorra");
       $country->setNationality("Andorra");
       $country->setIso("AD");
       $country->setIso3("AND");
       $country->setNumCode("20 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Angola");
       $country->setNationality("Angola");
       $country->setIso("AO");
       $country->setIso3("AGO");
       $country->setNumCode("24 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Anguilla");
       $country->setNationality("Anguilla");
       $country->setIso("AI");
       $country->setIso3("AIA");
       $country->setNumCode("660 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Antarctica");
       $country->setNationality("Antarctica");
       $country->setIso("AQ");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Antigua and Barbuda");
       $country->setNationality("Antigua and Barbuda");
       $country->setIso("AG");
       $country->setIso3("ATG");
       $country->setNumCode("28 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Argentina");
       $country->setNationality("Argentina");
       $country->setIso("AR");
       $country->setIso3("ARG");
       $country->setNumCode("32 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Armenia");
       $country->setNationality("Armenia");
       $country->setIso("AM");
       $country->setIso3("ARM");
       $country->setNumCode("51 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Aruba");
       $country->setNationality("Aruba");
       $country->setIso("AW");
       $country->setIso3("ABW");
       $country->setNumCode("533 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Australia");
       $country->setNationality("Australia");
       $country->setIso("AU");
       $country->setIso3("AUS");
       $country->setNumCode("36 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Austria");
       $country->setNationality("Austria");
       $country->setIso("AT");
       $country->setIso3("AUT");
       $country->setNumCode("40 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Azerbaijan");
       $country->setNationality("Azerbaijan");
       $country->setIso("AZ");
       $country->setIso3("AZE");
       $country->setNumCode("31 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bahamas");
       $country->setNationality("Bahamas");
       $country->setIso("BS");
       $country->setIso3("BHS");
       $country->setNumCode("44 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bahrain");
       $country->setNationality("Bahrain");
       $country->setIso("BH");
       $country->setIso3("BHR");
       $country->setNumCode("48 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bangladesh");
       $country->setNationality("Bangladesh");
       $country->setIso("BD");
       $country->setIso3("BGD");
       $country->setNumCode("50 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Barbados");
       $country->setNationality("Barbados");
       $country->setIso("BB");
       $country->setIso3("BRB");
       $country->setNumCode("52 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Belarus");
       $country->setNationality("Belarus");
       $country->setIso("BY");
       $country->setIso3("BLR");
       $country->setNumCode("112 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Belgium");
       $country->setNationality("Belgium");
       $country->setIso("BE");
       $country->setIso3("BEL");
       $country->setNumCode("56 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Belize");
       $country->setNationality("Belize");
       $country->setIso("BZ");
       $country->setIso3("BLZ");
       $country->setNumCode("84 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Benin");
       $country->setNationality("Benin");
       $country->setIso("BJ");
       $country->setIso3("BEN");
       $country->setNumCode("204 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bermuda");
       $country->setNationality("Bermuda");
       $country->setIso("BM");
       $country->setIso3("BMU");
       $country->setNumCode("60 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bhutan");
       $country->setNationality("Bhutan");
       $country->setIso("BT");
       $country->setIso3("BTN");
       $country->setNumCode("64 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bolivia");
       $country->setNationality("Bolivia");
       $country->setIso("BO");
       $country->setIso3("BOL");
       $country->setNumCode("68 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bosnia and Herzegovina");
       $country->setNationality("Bosnia and Herzegovina");
       $country->setIso("BA");
       $country->setIso3("BIH");
       $country->setNumCode("70 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Botswana");
       $country->setNationality("Botswana");
       $country->setIso("BW");
       $country->setIso3("BWA");
       $country->setNumCode("72 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bouvet Island");
       $country->setNationality("Bouvet Island");
       $country->setIso("BV");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Brazil");
       $country->setNationality("Brazil");
       $country->setIso("BR");
       $country->setIso3("BRA");
       $country->setNumCode("76 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("British Indian Ocean Territory");
       $country->setNationality("British Indian Ocean Territory");
       $country->setIso("IO");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Brunei Darussalam");
       $country->setNationality("Brunei Darussalam");
       $country->setIso("BN");
       $country->setIso3("BRN");
       $country->setNumCode("96 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Bulgaria");
       $country->setNationality("Bulgaria");
       $country->setIso("BG");
       $country->setIso3("BGR");
       $country->setNumCode("100 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Burkina Faso");
       $country->setNationality("Burkina Faso");
       $country->setIso("BF");
       $country->setIso3("BFA");
       $country->setNumCode("854 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Burundi");
       $country->setNationality("Burundi");
       $country->setIso("BI");
       $country->setIso3("BDI");
       $country->setNumCode("108 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cambodia");
       $country->setNationality("Cambodia");
       $country->setIso("KH");
       $country->setIso3("KHM");
       $country->setNumCode("116 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cameroon");
       $country->setNationality("Cameroon");
       $country->setIso("CM");
       $country->setIso3("CMR");
       $country->setNumCode("120 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Canada");
       $country->setNationality("Canada");
       $country->setIso("CA");
       $country->setIso3("CAN");
       $country->setNumCode("124 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cape Verde");
       $country->setNationality("Cape Verde");
       $country->setIso("CV");
       $country->setIso3("CPV");
       $country->setNumCode("132 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cayman Islands");
       $country->setNationality("Cayman Islands");
       $country->setIso("KY");
       $country->setIso3("CYM");
       $country->setNumCode("136 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Central African Republic");
       $country->setNationality("Central African Republic");
       $country->setIso("CF");
       $country->setIso3("CAF");
       $country->setNumCode("140 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Chad");
       $country->setNationality("Chad");
       $country->setIso("TD");
       $country->setIso3("TCD");
       $country->setNumCode("148 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Chile");
       $country->setNationality("Chile");
       $country->setIso("CL");
       $country->setIso3("CHL");
       $country->setNumCode("152 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("China");
       $country->setNationality("China");
       $country->setIso("CN");
       $country->setIso3("CHN");
       $country->setNumCode("156 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Christmas Island");
       $country->setNationality("Christmas Island");
       $country->setIso("CX");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cocos (Keeling) Islands");
       $country->setNationality("Cocos (Keeling) Islands");
       $country->setIso("CC");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Colombia");
       $country->setNationality("Colombia");
       $country->setIso("CO");
       $country->setIso3("COL");
       $country->setNumCode("170 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Comoros");
       $country->setNationality("Comoros");
       $country->setIso("KM");
       $country->setIso3("COM");
       $country->setNumCode("174 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Congo");
       $country->setNationality("Congo");
       $country->setIso("CG");
       $country->setIso3("COG");
       $country->setNumCode("178 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Congo, the Democratic Republic of the");
       $country->setNationality("Congo, the Democratic Republic of the");
       $country->setIso("CD");
       $country->setIso3("COD");
       $country->setNumCode("180 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cook Islands");
       $country->setNationality("Cook Islands");
       $country->setIso("CK");
       $country->setIso3("COK");
       $country->setNumCode("184 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Costa Rica");
       $country->setNationality("Costa Rica");
       $country->setIso("CR");
       $country->setIso3("CRI");
       $country->setNumCode("188 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cote D'Ivoire");
       $country->setNationality("Cote D'Ivoire");
       $country->setIso("CI");
       $country->setIso3("CIV");
       $country->setNumCode("384 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Croatia");
       $country->setNationality("Croatia");
       $country->setIso("HR");
       $country->setIso3("HRV");
       $country->setNumCode("191 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cuba");
       $country->setNationality("Cuba");
       $country->setIso("CU");
       $country->setIso3("CUB");
       $country->setNumCode("192 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Cyprus");
       $country->setNationality("Cyprus");
       $country->setIso("CY");
       $country->setIso3("CYP");
       $country->setNumCode("196 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Czech Republic");
       $country->setNationality("Czech Republic");
       $country->setIso("CZ");
       $country->setIso3("CZE");
       $country->setNumCode("203 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Denmark");
       $country->setNationality("Denmark");
       $country->setIso("DK");
       $country->setIso3("DNK");
       $country->setNumCode("208 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Djibouti");
       $country->setNationality("Djibouti");
       $country->setIso("DJ");
       $country->setIso3("DJI");
       $country->setNumCode("262 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Dominica");
       $country->setNationality("Dominica");
       $country->setIso("DM");
       $country->setIso3("DMA");
       $country->setNumCode("212 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Dominican Republic");
       $country->setNationality("Dominican Republic");
       $country->setIso("DO");
       $country->setIso3("DOM");
       $country->setNumCode("214 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Ecuador");
       $country->setNationality("Ecuador");
       $country->setIso("EC");
       $country->setIso3("ECU");
       $country->setNumCode("218 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Egypt");
       $country->setNationality("Egypt");
       $country->setIso("EG");
       $country->setIso3("EGY");
       $country->setNumCode("818 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("El Salvador");
       $country->setNationality("El Salvador");
       $country->setIso("SV");
       $country->setIso3("SLV");
       $country->setNumCode("222 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Equatorial Guinea");
       $country->setNationality("Equatorial Guinea");
       $country->setIso("GQ");
       $country->setIso3("GNQ");
       $country->setNumCode("226 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Eritrea");
       $country->setNationality("Eritrea");
       $country->setIso("ER");
       $country->setIso3("ERI");
       $country->setNumCode("232 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Estonia");
       $country->setNationality("Estonia");
       $country->setIso("EE");
       $country->setIso3("EST");
       $country->setNumCode("233 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Ethiopia");
       $country->setNationality("Ethiopia");
       $country->setIso("ET");
       $country->setIso3("ETH");
       $country->setNumCode("231 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Falkland Islands (Malvinas)");
       $country->setNationality("Falkland Islands (Malvinas)");
       $country->setIso("FK");
       $country->setIso3("FLK");
       $country->setNumCode("238 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Faroe Islands");
       $country->setNationality("Faroe Islands");
       $country->setIso("FO");
       $country->setIso3("FRO");
       $country->setNumCode("234 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Fiji");
       $country->setNationality("Fiji");
       $country->setIso("FJ");
       $country->setIso3("FJI");
       $country->setNumCode("242 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Finland");
       $country->setNationality("Finland");
       $country->setIso("FI");
       $country->setIso3("FIN");
       $country->setNumCode("246 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("France");
       $country->setNationality("France");
       $country->setIso("FR");
       $country->setIso3("FRA");
       $country->setNumCode("250 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("French Guiana");
       $country->setNationality("French Guiana");
       $country->setIso("GF");
       $country->setIso3("GUF");
       $country->setNumCode("254 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("French Polynesia");
       $country->setNationality("French Polynesia");
       $country->setIso("PF");
       $country->setIso3("PYF");
       $country->setNumCode("258 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("French Southern Territories");
       $country->setNationality("French Southern Territories");
       $country->setIso("TF");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Gabon");
       $country->setNationality("Gabon");
       $country->setIso("GA");
       $country->setIso3("GAB");
       $country->setNumCode("266 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Gambia");
       $country->setNationality("Gambia");
       $country->setIso("GM");
       $country->setIso3("GMB");
       $country->setNumCode("270 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Georgia");
       $country->setNationality("Georgia");
       $country->setIso("GE");
       $country->setIso3("GEO");
       $country->setNumCode("268 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Germany");
       $country->setNationality("Germany");
       $country->setIso("DE");
       $country->setIso3("DEU");
       $country->setNumCode("276 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Ghana");
       $country->setNationality("Ghana");
       $country->setIso("GH");
       $country->setIso3("GHA");
       $country->setNumCode("288 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Gibraltar");
       $country->setNationality("Gibraltar");
       $country->setIso("GI");
       $country->setIso3("GIB");
       $country->setNumCode("292 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Greece");
       $country->setNationality("Greece");
       $country->setIso("GR");
       $country->setIso3("GRC");
       $country->setNumCode("300 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Greenland");
       $country->setNationality("Greenland");
       $country->setIso("GL");
       $country->setIso3("GRL");
       $country->setNumCode("304 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Grenada");
       $country->setNationality("Grenada");
       $country->setIso("GD");
       $country->setIso3("GRD");
       $country->setNumCode("308 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Guadeloupe");
       $country->setNationality("Guadeloupe");
       $country->setIso("GP");
       $country->setIso3("GLP");
       $country->setNumCode("312 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Guam");
       $country->setNationality("Guam");
       $country->setIso("GU");
       $country->setIso3("GUM");
       $country->setNumCode("316 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Guatemala");
       $country->setNationality("Guatemala");
       $country->setIso("GT");
       $country->setIso3("GTM");
       $country->setNumCode("320 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Guinea");
       $country->setNationality("Guinea");
       $country->setIso("GN");
       $country->setIso3("GIN");
       $country->setNumCode("324 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Guinea-Bissau");
       $country->setNationality("Guinea-Bissau");
       $country->setIso("GW");
       $country->setIso3("GNB");
       $country->setNumCode("624 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Guyana");
       $country->setNationality("Guyana");
       $country->setIso("GY");
       $country->setIso3("GUY");
       $country->setNumCode("328 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Haiti");
       $country->setNationality("Haiti");
       $country->setIso("HT");
       $country->setIso3("HTI");
       $country->setNumCode("332 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Heard Island and Mcdonald Islands");
       $country->setNationality("Heard Island and Mcdonald Islands");
       $country->setIso("HM");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Holy See (Vatican City State)");
       $country->setNationality("Holy See (Vatican City State)");
       $country->setIso("VA");
       $country->setIso3("VAT");
       $country->setNumCode("336 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Honduras");
       $country->setNationality("Honduras");
       $country->setIso("HN");
       $country->setIso3("HND");
       $country->setNumCode("340 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Hong Kong");
       $country->setNationality("Hong Kong");
       $country->setIso("HK");
       $country->setIso3("HKG");
       $country->setNumCode("344 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Hungary");
       $country->setNationality("Hungary");
       $country->setIso("HU");
       $country->setIso3("HUN");
       $country->setNumCode("348 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Iceland");
       $country->setNationality("Iceland");
       $country->setIso("IS");
       $country->setIso3("ISL");
       $country->setNumCode("352 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("India");
       $country->setNationality("India");
       $country->setIso("IN");
       $country->setIso3("IND");
       $country->setNumCode("356 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Indonesia");
       $country->setNationality("Indonesia");
       $country->setIso("ID");
       $country->setIso3("IDN");
       $country->setNumCode("360 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Iran, Islamic Republic of");
       $country->setNationality("Iran, Islamic Republic of");
       $country->setIso("IR");
       $country->setIso3("IRN");
       $country->setNumCode("364 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Iraq");
       $country->setNationality("Iraq");
       $country->setIso("IQ");
       $country->setIso3("IRQ");
       $country->setNumCode("368 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Ireland");
       $country->setNationality("Ireland");
       $country->setIso("IE");
       $country->setIso3("IRL");
       $country->setNumCode("372 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Israel");
       $country->setNationality("Israel");
       $country->setIso("IL");
       $country->setIso3("ISR");
       $country->setNumCode("376 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Italy");
       $country->setNationality("Italy");
       $country->setIso("IT");
       $country->setIso3("ITA");
       $country->setNumCode("380 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Jamaica");
       $country->setNationality("Jamaica");
       $country->setIso("JM");
       $country->setIso3("JAM");
       $country->setNumCode("388 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Japan");
       $country->setNationality("Japan");
       $country->setIso("JP");
       $country->setIso3("JPN");
       $country->setNumCode("392 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Jordan");
       $country->setNationality("Jordan");
       $country->setIso("JO");
       $country->setIso3("JOR");
       $country->setNumCode("400 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Kazakhstan");
       $country->setNationality("Kazakhstan");
       $country->setIso("KZ");
       $country->setIso3("KAZ");
       $country->setNumCode("398 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Kenya");
       $country->setNationality("Kenya");
       $country->setIso("KE");
       $country->setIso3("KEN");
       $country->setNumCode("404 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Kiribati");
       $country->setNationality("Kiribati");
       $country->setIso("KI");
       $country->setIso3("KIR");
       $country->setNumCode("296 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Korea, Democratic People's Republic of");
       $country->setNationality("Korea, Democratic People's Republic of");
       $country->setIso("KP");
       $country->setIso3("PRK");
       $country->setNumCode("408 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Korea, Republic of");
       $country->setNationality("Korea, Republic of");
       $country->setIso("KR");
       $country->setIso3("KOR");
       $country->setNumCode("410 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Kuwait");
       $country->setNationality("Kuwait");
       $country->setIso("KW");
       $country->setIso3("KWT");
       $country->setNumCode("414 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Kyrgyzstan");
       $country->setNationality("Kyrgyzstan");
       $country->setIso("KG");
       $country->setIso3("KGZ");
       $country->setNumCode("417 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Lao People's Democratic Republic");
       $country->setNationality("Lao People's Democratic Republic");
       $country->setIso("LA");
       $country->setIso3("LAO");
       $country->setNumCode("418 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Latvia");
       $country->setNationality("Latvia");
       $country->setIso("LV");
       $country->setIso3("LVA");
       $country->setNumCode("428 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Lebanon");
       $country->setNationality("Lebanon");
       $country->setIso("LB");
       $country->setIso3("LBN");
       $country->setNumCode("422 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Lesotho");
       $country->setNationality("Lesotho");
       $country->setIso("LS");
       $country->setIso3("LSO");
       $country->setNumCode("426 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Liberia");
       $country->setNationality("Liberia");
       $country->setIso("LR");
       $country->setIso3("LBR");
       $country->setNumCode("430 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Libyan Arab Jamahiriya");
       $country->setNationality("Libyan Arab Jamahiriya");
       $country->setIso("LY");
       $country->setIso3("LBY");
       $country->setNumCode("434 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Liechtenstein");
       $country->setNationality("Liechtenstein");
       $country->setIso("LI");
       $country->setIso3("LIE");
       $country->setNumCode("438 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Lithuania");
       $country->setNationality("Lithuania");
       $country->setIso("LT");
       $country->setIso3("LTU");
       $country->setNumCode("440 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Luxembourg");
       $country->setNationality("Luxembourg");
       $country->setIso("LU");
       $country->setIso3("LUX");
       $country->setNumCode("442 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Macao");
       $country->setNationality("Macao");
       $country->setIso("MO");
       $country->setIso3("MAC");
       $country->setNumCode("446 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Macedonia, the Former Yugoslav Republic of");
       $country->setNationality("Macedonia, the Former Yugoslav Republic of");
       $country->setIso("MK");
       $country->setIso3("MKD");
       $country->setNumCode("807 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Madagascar");
       $country->setNationality("Madagascar");
       $country->setIso("MG");
       $country->setIso3("MDG");
       $country->setNumCode("450 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Malawi");
       $country->setNationality("Malawi");
       $country->setIso("MW");
       $country->setIso3("MWI");
       $country->setNumCode("454 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Malaysia");
       $country->setNationality("Malaysia");
       $country->setIso("MY");
       $country->setIso3("MYS");
       $country->setNumCode("458 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Maldives");
       $country->setNationality("Maldives");
       $country->setIso("MV");
       $country->setIso3("MDV");
       $country->setNumCode("462 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mali");
       $country->setNationality("Mali");
       $country->setIso("ML");
       $country->setIso3("MLI");
       $country->setNumCode("466 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Malta");
       $country->setNationality("Malta");
       $country->setIso("MT");
       $country->setIso3("MLT");
       $country->setNumCode("470 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Marshall Islands");
       $country->setNationality("Marshall Islands");
       $country->setIso("MH");
       $country->setIso3("MHL");
       $country->setNumCode("584 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Martinique");
       $country->setNationality("Martinique");
       $country->setIso("MQ");
       $country->setIso3("MTQ");
       $country->setNumCode("474 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mauritania");
       $country->setNationality("Mauritania");
       $country->setIso("MR");
       $country->setIso3("MRT");
       $country->setNumCode("478 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mauritius");
       $country->setNationality("Mauritius");
       $country->setIso("MU");
       $country->setIso3("MUS");
       $country->setNumCode("480 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mayotte");
       $country->setNationality("Mayotte");
       $country->setIso("YT");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mexico");
       $country->setNationality("Mexico");
       $country->setIso("MX");
       $country->setIso3("MEX");
       $country->setNumCode("484 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Micronesia, Federated States of");
       $country->setNationality("Micronesia, Federated States of");
       $country->setIso("FM");
       $country->setIso3("FSM");
       $country->setNumCode("583 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Moldova, Republic of");
       $country->setNationality("Moldova, Republic of");
       $country->setIso("MD");
       $country->setIso3("MDA");
       $country->setNumCode("498 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Monaco");
       $country->setNationality("Monaco");
       $country->setIso("MC");
       $country->setIso3("MCO");
       $country->setNumCode("492 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mongolia");
       $country->setNationality("Mongolia");
       $country->setIso("MN");
       $country->setIso3("MNG");
       $country->setNumCode("496 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Montserrat");
       $country->setNationality("Montserrat");
       $country->setIso("MS");
       $country->setIso3("MSR");
       $country->setNumCode("500 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Morocco");
       $country->setNationality("Morocco");
       $country->setIso("MA");
       $country->setIso3("MAR");
       $country->setNumCode("504 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Mozambique");
       $country->setNationality("Mozambique");
       $country->setIso("MZ");
       $country->setIso3("MOZ");
       $country->setNumCode("508 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Myanmar");
       $country->setNationality("Myanmar");
       $country->setIso("MM");
       $country->setIso3("MMR");
       $country->setNumCode("104 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Namibia");
       $country->setNationality("Namibia");
       $country->setIso("NA");
       $country->setIso3("NAM");
       $country->setNumCode("516 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Nauru");
       $country->setNationality("Nauru");
       $country->setIso("NR");
       $country->setIso3("NRU");
       $country->setNumCode("520 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Nepal");
       $country->setNationality("Nepal");
       $country->setIso("NP");
       $country->setIso3("NPL");
       $country->setNumCode("524 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Netherlands");
       $country->setNationality("Netherlands");
       $country->setIso("NL");
       $country->setIso3("NLD");
       $country->setNumCode("528 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Netherlands Antilles");
       $country->setNationality("Netherlands Antilles");
       $country->setIso("AN");
       $country->setIso3("ANT");
       $country->setNumCode("530 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("New Caledonia");
       $country->setNationality("New Caledonia");
       $country->setIso("NC");
       $country->setIso3("NCL");
       $country->setNumCode("540 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("New Zealand");
       $country->setNationality("New Zealand");
       $country->setIso("NZ");
       $country->setIso3("NZL");
       $country->setNumCode("554 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Nicaragua");
       $country->setNationality("Nicaragua");
       $country->setIso("NI");
       $country->setIso3("NIC");
       $country->setNumCode("558 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Niger");
       $country->setNationality("Niger");
       $country->setIso("NE");
       $country->setIso3("NER");
       $country->setNumCode("562 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Nigeria");
       $country->setNationality("Nigeria");
       $country->setIso("NG");
       $country->setIso3("NGA");
       $country->setNumCode("566 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Niue");
       $country->setNationality("Niue");
       $country->setIso("NU");
       $country->setIso3("NIU");
       $country->setNumCode("570 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Norfolk Island");
       $country->setNationality("Norfolk Island");
       $country->setIso("NF");
       $country->setIso3("NFK");
       $country->setNumCode("574 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Northern Mariana Islands");
       $country->setNationality("Northern Mariana Islands");
       $country->setIso("MP");
       $country->setIso3("MNP");
       $country->setNumCode("580 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Norway");
       $country->setNationality("Norway");
       $country->setIso("NO");
       $country->setIso3("NOR");
       $country->setNumCode("578 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Oman");
       $country->setNationality("Oman");
       $country->setIso("OM");
       $country->setIso3("OMN");
       $country->setNumCode("512 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Pakistan");
       $country->setNationality("Pakistan");
       $country->setIso("PK");
       $country->setIso3("PAK");
       $country->setNumCode("586 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Palau");
       $country->setNationality("Palau");
       $country->setIso("PW");
       $country->setIso3("PLW");
       $country->setNumCode("585 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Palestinian Territory, Occupied");
       $country->setNationality("Palestinian Territory, Occupied");
       $country->setIso("PS");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Panama");
       $country->setNationality("Panama");
       $country->setIso("PA");
       $country->setIso3("PAN");
       $country->setNumCode("591 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Papua New Guinea");
       $country->setNationality("Papua New Guinea");
       $country->setIso("PG");
       $country->setIso3("PNG");
       $country->setNumCode("598 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Paraguay");
       $country->setNationality("Paraguay");
       $country->setIso("PY");
       $country->setIso3("PRY");
       $country->setNumCode("600 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Peru");
       $country->setNationality("Peru");
       $country->setIso("PE");
       $country->setIso3("PER");
       $country->setNumCode("604 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Philippines");
       $country->setNationality("Philippines");
       $country->setIso("PH");
       $country->setIso3("PHL");
       $country->setNumCode("608 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Pitcairn");
       $country->setNationality("Pitcairn");
       $country->setIso("PN");
       $country->setIso3("PCN");
       $country->setNumCode("612 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Poland");
       $country->setNationality("Poland");
       $country->setIso("PL");
       $country->setIso3("POL");
       $country->setNumCode("616 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Portugal");
       $country->setNationality("Portugal");
       $country->setIso("PT");
       $country->setIso3("PRT");
       $country->setNumCode("620 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Puerto Rico");
       $country->setNationality("Puerto Rico");
       $country->setIso("PR");
       $country->setIso3("PRI");
       $country->setNumCode("630 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Qatar");
       $country->setNationality("Qatar");
       $country->setIso("QA");
       $country->setIso3("QAT");
       $country->setNumCode("634 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Reunion");
       $country->setNationality("Reunion");
       $country->setIso("RE");
       $country->setIso3("REU");
       $country->setNumCode("638 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Romania");
       $country->setNationality("Romania");
       $country->setIso("RO");
       $country->setIso3("ROM");
       $country->setNumCode("642 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Russian Federation");
       $country->setNationality("Russian Federation");
       $country->setIso("RU");
       $country->setIso3("RUS");
       $country->setNumCode("643 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Rwanda");
       $country->setNationality("Rwanda");
       $country->setIso("RW");
       $country->setIso3("RWA");
       $country->setNumCode("646 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Saint Helena");
       $country->setNationality("Saint Helena");
       $country->setIso("SH");
       $country->setIso3("SHN");
       $country->setNumCode("654 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Saint Kitts and Nevis");
       $country->setNationality("Saint Kitts and Nevis");
       $country->setIso("KN");
       $country->setIso3("KNA");
       $country->setNumCode("659 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Saint Lucia");
       $country->setNationality("Saint Lucia");
       $country->setIso("LC");
       $country->setIso3("LCA");
       $country->setNumCode("662 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Saint Pierre and Miquelon");
       $country->setNationality("Saint Pierre and Miquelon");
       $country->setIso("PM");
       $country->setIso3("SPM");
       $country->setNumCode("666 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Saint Vincent and the Grenadines");
       $country->setNationality("Saint Vincent and the Grenadines");
       $country->setIso("VC");
       $country->setIso3("VCT");
       $country->setNumCode("670 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Samoa");
       $country->setNationality("Samoa");
       $country->setIso("WS");
       $country->setIso3("WSM");
       $country->setNumCode("882 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("San Marino");
       $country->setNationality("San Marino");
       $country->setIso("SM");
       $country->setIso3("SMR");
       $country->setNumCode("674 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Sao Tome and Principe");
       $country->setNationality("Sao Tome and Principe");
       $country->setIso("ST");
       $country->setIso3("STP");
       $country->setNumCode("678 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Saudi Arabia");
       $country->setNationality("Saudi Arabia");
       $country->setIso("SA");
       $country->setIso3("SAU");
       $country->setNumCode("682 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Senegal");
       $country->setNationality("Senegal");
       $country->setIso("SN");
       $country->setIso3("SEN");
       $country->setNumCode("686 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Serbia and Montenegro");
       $country->setNationality("Serbia and Montenegro");
       $country->setIso("CS");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Seychelles");
       $country->setNationality("Seychelles");
       $country->setIso("SC");
       $country->setIso3("SYC");
       $country->setNumCode("690 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Sierra Leone");
       $country->setNationality("Sierra Leone");
       $country->setIso("SL");
       $country->setIso3("SLE");
       $country->setNumCode("694 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Singapore");
       $country->setNationality("Singapore");
       $country->setIso("SG");
       $country->setIso3("SGP");
       $country->setNumCode("702 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Slovakia");
       $country->setNationality("Slovakia");
       $country->setIso("SK");
       $country->setIso3("SVK");
       $country->setNumCode("703 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Slovenia");
       $country->setNationality("Slovenia");
       $country->setIso("SI");
       $country->setIso3("SVN");
       $country->setNumCode("705 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Solomon Islands");
       $country->setNationality("Solomon Islands");
       $country->setIso("SB");
       $country->setIso3("SLB");
       $country->setNumCode("90 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Somalia");
       $country->setNationality("Somalia");
       $country->setIso("SO");
       $country->setIso3("SOM");
       $country->setNumCode("706 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("South Africa");
       $country->setNationality("South Africa");
       $country->setIso("ZA");
       $country->setIso3("ZAF");
       $country->setNumCode("710 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("South Georgia and the South Sandwich Islands");
       $country->setNationality("South Georgia and the South Sandwich Islands");
       $country->setIso("GS");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Spain");
       $country->setNationality("Spain");
       $country->setIso("ES");
       $country->setIso3("ESP");
       $country->setNumCode("724 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Sri Lanka");
       $country->setNationality("Sri Lanka");
       $country->setIso("LK");
       $country->setIso3("LKA");
       $country->setNumCode("144 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Sudan");
       $country->setNationality("Sudan");
       $country->setIso("SD");
       $country->setIso3("SDN");
       $country->setNumCode("736 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Suriname");
       $country->setNationality("Suriname");
       $country->setIso("SR");
       $country->setIso3("SUR");
       $country->setNumCode("740 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Svalbard and Jan Mayen");
       $country->setNationality("Svalbard and Jan Mayen");
       $country->setIso("SJ");
       $country->setIso3("SJM");
       $country->setNumCode("744 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Swaziland");
       $country->setNationality("Swaziland");
       $country->setIso("SZ");
       $country->setIso3("SWZ");
       $country->setNumCode("748 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Sweden");
       $country->setNationality("Sweden");
       $country->setIso("SE");
       $country->setIso3("SWE");
       $country->setNumCode("752 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Switzerland");
       $country->setNationality("Switzerland");
       $country->setIso("CH");
       $country->setIso3("CHE");
       $country->setNumCode("756 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Syrian Arab Republic");
       $country->setNationality("Syrian Arab Republic");
       $country->setIso("SY");
       $country->setIso3("SYR");
       $country->setNumCode("760 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Taiwan, Province of China");
       $country->setNationality("Taiwan, Province of China");
       $country->setIso("TW");
       $country->setIso3("TWN");
       $country->setNumCode("158 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Tajikistan");
       $country->setNationality("Tajikistan");
       $country->setIso("TJ");
       $country->setIso3("TJK");
       $country->setNumCode("762 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Tanzania, United Republic of");
       $country->setNationality("Tanzania, United Republic of");
       $country->setIso("TZ");
       $country->setIso3("TZA");
       $country->setNumCode("834 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Thailand");
       $country->setNationality("Thailand");
       $country->setIso("TH");
       $country->setIso3("THA");
       $country->setNumCode("764 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Timor-Leste");
       $country->setNationality("Timor-Leste");
       $country->setIso("TL");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Togo");
       $country->setNationality("Togo");
       $country->setIso("TG");
       $country->setIso3("TGO");
       $country->setNumCode("768 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Tokelau");
       $country->setNationality("Tokelau");
       $country->setIso("TK");
       $country->setIso3("TKL");
       $country->setNumCode("772 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Tonga");
       $country->setNationality("Tonga");
       $country->setIso("TO");
       $country->setIso3("TON");
       $country->setNumCode("776 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Trinidad and Tobago");
       $country->setNationality("Trinidad and Tobago");
       $country->setIso("TT");
       $country->setIso3("TTO");
       $country->setNumCode("780 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Tunisia");
       $country->setNationality("Tunisia");
       $country->setIso("TN");
       $country->setIso3("TUN");
       $country->setNumCode("788 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Turkey");
       $country->setNationality("Turkey");
       $country->setIso("TR");
       $country->setIso3("TUR");
       $country->setNumCode("792 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Turkmenistan");
       $country->setNationality("Turkmenistan");
       $country->setIso("TM");
       $country->setIso3("TKM");
       $country->setNumCode("795 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Turks and Caicos Islands");
       $country->setNationality("Turks and Caicos Islands");
       $country->setIso("TC");
       $country->setIso3("TCA");
       $country->setNumCode("796 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Tuvalu");
       $country->setNationality("Tuvalu");
       $country->setIso("TV");
       $country->setIso3("TUV");
       $country->setNumCode("798 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Uganda");
       $country->setNationality("Uganda");
       $country->setIso("UG");
       $country->setIso3("UGA");
       $country->setNumCode("800 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Ukraine");
       $country->setNationality("Ukraine");
       $country->setIso("UA");
       $country->setIso3("UKR");
       $country->setNumCode("804 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("United Arab Emirates");
       $country->setNationality("United Arab Emirates");
       $country->setIso("AE");
       $country->setIso3("ARE");
       $country->setNumCode("784 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("United Kingdom");
       $country->setNationality("United Kingdom");
       $country->setIso("GB");
       $country->setIso3("GBR");
       $country->setNumCode("826 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("United States");
       $country->setNationality("United States");
       $country->setIso("US");
       $country->setIso3("USA");
       $country->setNumCode("840 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("United States Minor Outlying Islands");
       $country->setNationality("United States Minor Outlying Islands");
       $country->setIso("UM");
       $country->setIso3("NULL");
       $country->setNumCode("NULL ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Uruguay");
       $country->setNationality("Uruguay");
       $country->setIso("UY");
       $country->setIso3("URY");
       $country->setNumCode("858 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Uzbekistan");
       $country->setNationality("Uzbekistan");
       $country->setIso("UZ");
       $country->setIso3("UZB");
       $country->setNumCode("860 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Vanuatu");
       $country->setNationality("Vanuatu");
       $country->setIso("VU");
       $country->setIso3("VUT");
       $country->setNumCode("548 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Venezuela");
       $country->setNationality("Venezuela");
       $country->setIso("VE");
       $country->setIso3("VEN");
       $country->setNumCode("862 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Viet Nam");
       $country->setNationality("Viet Nam");
       $country->setIso("VN");
       $country->setIso3("VNM");
       $country->setNumCode("704 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Virgin Islands, British");
       $country->setNationality("Virgin Islands, British");
       $country->setIso("VG");
       $country->setIso3("VGB");
       $country->setNumCode("92 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Virgin Islands, U.s.");
       $country->setNationality("Virgin Islands, U.s.");
       $country->setIso("VI");
       $country->setIso3("VIR");
       $country->setNumCode("850 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Wallis and Futuna");
       $country->setNationality("Wallis and Futuna");
       $country->setIso("WF");
       $country->setIso3("WLF");
       $country->setNumCode("876 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Western Sahara");
       $country->setNationality("Western Sahara");
       $country->setIso("EH");
       $country->setIso3("ESH");
       $country->setNumCode("732 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Yemen");
       $country->setNationality("Yemen");
       $country->setIso("YE");
       $country->setIso3("YEM");
       $country->setNumCode("887 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Zambia");
       $country->setNationality("Zambia");
       $country->setIso("ZM");
       $country->setIso3("ZMB");
       $country->setNumCode("894 ");
       $manager->persist($country);

       $country = new Country();
       $country->setName("Zimbabwe");
       $country->setNationality("Zimbabwe");
       $country->setIso("ZW");
       $country->setIso3("ZWE");
       $country->setNumCode("716 ");
       $manager->persist($country);

        $manager->flush();
    }

}
