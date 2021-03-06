<?php

$partShow=true;
$selects = array(
"medical_clinic_id" => 'select clinic_id as id,clinic_name as name from clinics order by name asc',
"medical_staff_id" => 'select contact_id as id, CONCAT_WS(" ",contact_first_name,contact_last_name) as name from contacts  where contact_id<>"13" and contact_active="1" order by name asc',
"medical_referral_old" => 'select contact_id as id, CONCAT_WS(" ",contact_first_name,contact_last_name) as name from contacts  where contact_id<>"13" and contact_active="1" order by name asc'
);

$fields = array(
// "medical_entry_date" => "Visit Date", 
// "medical_clinic_id" => array('title'=>"Center",'value'=>'sql','query'=>'select clinic_name from clinics where clinic_id="%d" limit 1','rquery'=>'select clinic_id from clinics where clinic_name="%s" limit 1'),
// "medical_staff_id" => array('title'=>"Clinician",'value'=>'sql','query'=>'select CONCAT_WS(", ",contact_last_name,contact_first_name) from contacts where contact_id="%d" limit 1','rquery'=>'select contact_id from contacts where lower(CONCAT_WS(", ",contact_last_name,contact_first_name))="%s" limit 1'),
"medical_transferred" => array('title'=>"4a.Transferred?", 'value'=>'sysval','query'=>'YesNo'),
"medical_other_programme" => "4b.Programme transferred from", 
"medical_birth_weight" => "5a.Birth weight", 
"medical_pmtct" => array('title'=>"5b.PMTCT",'value'=>'sysval','query'=>'YesNo'),
"medical_mother_arv_given" => array('title'=>"5c.Mother given ARV", 'value'=>'sysval','query'=>'YesNo'),
"medical_child_arv_given" => array('title'=>"5d.Child given ARV", 'value'=>'sysval','query'=>'YesNo'),
"medical_birth_location" => array('title'=>"6a.Born", 'value'=>'sysval','query'=>'BirthTypes'),
"medical_delivery" => "6b.Delivery", 
"medical_birth_problems" => "6c.Problems at or after birth", 
"medical_immunization_status" => array('title'=>"7a.Immunization status", 'value'=>'sysval','query'=>'ImmunizationStatus'),
"medical_card_seen" => array('title'=>"7b.Card seen",  'value'=>'sysval','query'=>'YesNo'),
"medical_breastfeeding" => array('title'=>"8a.Breastfeeding", 'value'=>'sysval','query'=>'YesNo'),
"medical_exclusive_breastfeeding" => array('title'=>"8b.Exclusive BF", 'value'=>'sysval','query'=>'YesNo'),
"medical_bf_duration" => "8c.Duration of BF", 
"medical_father_hiv_status" =>  array('title'=>"9a.Father HIV Status", 'value'=>'sysval','query'=>'HIVStatusTypes'),
"medical_father_arv" => array('title'=>"9b.Father On ARVs", 'value'=>'sysval','query'=>'YesNo'),
"medical_mother_hiv_status" => array('title'=>"10a.Mother HIV Status", 'value'=>'sysval','query'=>'HIVStatusTypes'),
"medical_mother_arv" => array('title'=>"10b.Mother On ARVs", 'value'=>'sysval','query'=>'YesNo'),
"medical_no_siblings_alive" => "11a.Number of siblings alive", 
"medical_no_siblings_deceased" => "11b.Number of siblings deceased", 
"medical_tb_contact" => array('title'=>"12a.TB Household Contact", 'value'=>'sysval','query'=>'YesNo'),
"medical_tb_contact_person" => "12b.Who", 
"medical_tb_date_diagnosed" => array('title'=>"12c.Date diagnosed",'xtype'=>'date'), 
'medical_history'=>array('title'=>'13.Medical History','value'=>'plural',
					'query'=>array(
						'set'=>'select * from medical_history where medical_history_medical_id="%d"',
						'fields'=>array(
							'medical_history_hospital'=>'Hospital',
							'medical_history_date'=>array('title'=>'Date','xtype'=>'date'),
							'medical_history_diagnosis'=>'Reason/Diagnosis'
						)
				)
),
"medical_tb_pulmonary" =>  array('title'=>"16a.Pulmonary/Extrapulmonary",'value'=>'sysval','query'=>'TBPulmonaryType'), 
"medical_tb_type" => array('title'=>"16b.TB type", 'value'=>'sysval','query'=>'TBType'),
"medical_tb_type_desc" => "16c.Other type", 
"medical_tb_date1" => array('title'=>"17a.1st treatment",'xtype'=>'date'), 
"medical_tb_date2" => array('title'=>"17b.2nd treatment",'xtype'=>'date'), 
"medical_tb_date3" => array('title'=>"17c.3rd treatment",'xtype'=>'date'), 
"medical_history_pneumonia" => array('title'=>"18a.Pneumonia", 'value'=>'sysval','query'=>'YesNo'),
"medical_history_diarrhoea" => array('title'=>"18b.Diarrhoeal episodes", 'value'=>'sysval','query'=>'YesNo'),
"medical_history_skin_rash" => array('title'=>"18c.Skin rashes", 'value'=>'sysval','query'=>'YesNo'),
"medical_history_ear_discharge" => array('title'=>"18d.Ear discharge", 'value'=>'sysval','query'=>'YesNo'),
"medical_history_fever" => array('title'=>"18e.Fever",  'value'=>'sysval','query'=>'YesNo'),
"medical_history_oral_rush" => array('title'=>"18f.Persistent oral thrush",  'value'=>'sysval','query'=>'YesNo'),
"medical_history_mouth_ulcers" => array('title'=>"18g.Mouth ulcers",  'value'=>'sysval','query'=>'YesNo'),
"medical_history_malnutrition" => array('title'=>"19a.Malnutrition",  'value'=>'sysval','query'=>'MalnutritionType'),
"medical_history_prev_nutrition" => array('title'=>"19b.Previous nutritional rehabilitation", 'value'=>'sysval','query'=>'YesNo'),
"medical_history_notes" => "20.Current nutritional rehabilitation", 
"medical_arv_status" => array('title'=>"21.ARVs", 'value'=>'sysval','query'=>'ARVTreatmentTypes'),
"medical_arv1" => "22a.1st line", 
"medical_arv1_startdate" => array('title'=>"22b.1st line Started",'xtype'=>'date'), 
"medical_arv1_enddate" => array('title'=>"22c.1st line  Stopped",'xtype'=>'date'), 
"medical_arv2" => "22d.2nd line", 
"medical_arv2_startdate" => array('title'=>"22e.2nd line Started",'xtype'=>'date'), 
"medical_arv2_enddate" => array('title'=>"22f.2nd line Stopped",'xtype'=>'date'),
"medical_salvage" => "22g.Salvage", 
"medical_salvage_startdate" => array('title'=>"22h.Salvage Started",'xtype'=>'date'), 
"medical_salvage_enddate" => array('title'=>"22i.Salvage Stopped",'xtype'=>'date'), 
"medical_arv_side_effects" => "22j.Side effects", 
"medical_arv_adherence" => "22k.Adherence", 
'medical_medications'=>array('title'=>'23.Medications','value'=>'plural',
					'query'=>array(
						'set'=>'select * from medications_history where medications_history_medical_id="%d"',
						'fields'=>array(
							'medications_history_drug'=>'Drug',
							'medications_history_dose'=>'Dose',
							'medications_history_frequency'=>'Frequency'
						)
				)
		),
"medical_school_attendance" => array('title'=>"29a.Attend School Regularly",  'value'=>'sysval','query'=>'YesNoND'),
"medical_school_class" => "29b.If Yes, class", 
"medical_educ_progress" => array('title'=>"29c.Progress",  'value'=>'sysval','query'=>'EducationProgressType'),
"medical_sensory_hearing" => array('title'=>"30a.Hearing",  'value'=>'sysval','query'=>'YesNo'),
"medical_sensory_vision" => array('title'=>"30b.vision", 'value'=>'sysval','query'=>'YesNo'),
"medical_sensory_motor_ability" => array('title'=>"30c.motor ability", 'value'=>'sysval','query'=>'MotorAbilityType','mode'=>'multi'),
"medical_sensory_speech_language" => array('title'=>"30d.speech and language", 'value'=>'sysval','query'=>'YesNo'),
"medical_sensory_social_skills" => array('title'=>"30e.social skills", 'value'=>'sysval','query'=>'YesNo'),
"medical_meals_per_day" => "31a.Number of meals per day", 
"medical_food_types" => "31b.Types of food", 
"medical_current_complaints" => "32.Current complaints", 
"medical_weight" => "33a.Weight (kg)", 
"medical_height" => "33b.Height (cm)", 
"medical_zscore" => "33c.z score", 
"medical_muac" => "33d.MUAC (mm)", 
"medical_hc" => "33e.Head Circum (cm)", 
"medical_condition" => array('title'=>"34a.Is child unwell", 'value'=>'sysval','query'=>'NoYes'),
"medical_temp" => "34b.Temperature (Celcius)", 
'medical_resp_rate' => '34c.Respiratory rate',
'medical_heart_rate' => '34d.Heart rate',
"medical_conditions" => array('title'=>"35.Identify",'value'=>'sysval','query'=>'ExaminationType','mode'=>'multi'), 
"medical_dehydration" => array('title'=>"36a.Dehydration", 'value'=>'sysval','query'=>'DehydrationType'),
"medical_parotids" => array('title'=>"36b.Parotids", 'value'=>'sysval','query'=>'EnlargementTypes'),
"medical_lymph" => array('title'=>"37a.Enlarged lymph nodes",'value'=>'sysval','query'=>'LymphType','mode'=>'multi'),
"medical_eyes" => array('title'=>"37b.Eyes",'value'=>'sysval','query'=>'EyeStatusTypes'), 
"medical_eyes_notes" => "37c.Specify Eyes condition", 
"medical_ear_discharge" => array('title'=>"38a.Ear discharge", 'value'=>'sysval','query'=>'EarType'),
"medical_ear_discharge_location" => array('title'=>"38b.Throat",'value'=>'sysval','query'=>'ThroatType'),
"medical_mouth_thrush" => array('title'=>"39a.Mouth thrush", 'value'=>'sysval','query'=>'YesNo'),
"medical_mouth_ulcers" => array('title'=>"39b.Mouth ulcers", 'value'=>'sysval','query'=>'YesNo'),
"medical_mouth_teeth" => array('title'=>"39c.teeth", 'value'=>'sysval','query'=>'TeethType'),
'medical_skin_type' => array('title'=>"40a.Skin",'value'=>'sysval','query'=>'ClearTypes'),
'medical_skin_note' =>'40b.Skin - other', 


//"medical_oldlesions" => "Skin Old lesion", 

//"medical_currentlesions" => "Skin Current lesion", 
'medical_heartrate' => '41a.Respiratory rate',
"medical_recession" => array('title'=>"41b.recession", 'value'=>'sysval','query'=>'YesNo'),
"medical_percussion" => array('title'=>"41c.percussion", 'value'=>'sysval','query'=>'PercussionType'),
"medical_location" => "41d.percussion location",
'medical_chest_shape' => array('title'=>"41e.Chest shape", 'value'=>'sysval','query'=>'ChestShape'), 
"medical_breath_sounds" => array('title'=>"42a.breath sounds", 'value'=>'sysval','query'=>'BreathSoundsType'), 
"medical_breathlocation" => "42b.breath sounds location", 
"medical_other_sounds" => array('title'=>"43a.added sounds",'value'=>'sysval','query'=>'SoundsType'),
"medical_soundlocation" => "43b.added sounds location", 
"medical_pulserate" => "44a.pulse rate",
"medical_apex_beat" => array('title'=>"44b.apex beat", 'value'=>'sysval','query'=>'NormalDisplacedType'),
"medical_precordial" => array('title'=>"44c.Precordial activity",'value'=>'sysval','query'=>'NormalIncreasedType'), 
"medical_femoral" => array('title'=>"45a.femoral pulses",'value'=>'sysval','query'=>'FemoralPulseType'), 
"medical_heart_sound" => array('title'=>"45b.heart", 'value'=>'sysval','query'=>'HeartType'),
"medical_heart_type" => "45c.type", 
"medical_abdomen_distended" => array('title'=>"46a.abdomen - distended",'value'=>'sysval','query'=>'YesNo'), 
"medical_adbomen_feel" => array('title'=>"46b.abdomen - feel", 'value'=>'sysval','query'=>'FeelTypes'),
"medical_abdomen_tender" => array('title'=>"46c.abdomen - tender",'value'=>'sysval','query'=>'YesNo'),
"medical_abdomen_fluid" => array('title'=>"46d.abdomen - fluid",'value'=>'sysval','query'=>'YesNo'),
"medical_liver_costal" => "47a.Liver (cm below costal margin)", 
"medical_spleen_costal" => "47b.Spleen (cm below costal margin)", 
"medical_masses" => "48a.Masses (specify)",
"medical_umbilical_hernia" => array('title'=>"48b.Umbilical hernia",'value'=>'sysval','query'=>'UmbilicalTypes'),  
"medical_testes" => array('title'=>"49a.Male testes", 'value'=>'sysval','query'=>'PalpableTypes'),
"medical_which_testes" => array('title'=>"49b.Right/left testes", 'value'=>'sysval','query'=>'DirectionTypes'),
//"medical_genitals_feel" => "49c.penis", 
"medical_penis" => array('title'=>"49c.penis", 'value'=>'sysval','query'=>'PenisTypes'),
"medical_genitals_female" => array('title'=>"49d.or female", 'value'=>'sysval','query'=>'FemaleConditionTypes'),
"medical_genitals_female_notes" => "49.Female - Other", 
"medical_pubertal" => array('title'=>"50.Pubertal development",  'value'=>'sysval','query'=>'DevelopmentTypes'),
'medical_cns' => array('title'=>"51a.CNS",  'value'=>'sysval','query'=>'CNSType'),
'medical_cns_note'=> '51a.CNS - specify',
'medical_muscle' => array('title'=>"51b.Musculoskeletal",  'value'=>'sysval','query'=>'CNSType'),
'medical_muscle_note' => '51b.Musculoskeletal - specify',
'medical_gait_opt' => array('title'=>"52a.Gait",  'value'=>'sysval','query'=>'BodySkeleton'),
"medical_gait" => "52a.Gait - other",
'medical_handuse_opt' => array('title'=>"52b.Hand use",  'value'=>'sysval','query'=>'BodySkeleton'),
"medical_handuse" => "52b.Hand use - other", 
"medical_weakness" => "53a.Weakness", 
"medical_tone" => array('title'=>"53b.Tone", 'value'=>'sysval','query'=>'NormalIncReducedType'),
"medical_tendon_legs" => array('title'=>"54.Tendon reflexes - legs", 'value'=>'sysval','query'=>'NormalIncReducedType'),
"medical_tendon_arms" => array('title'=>"55.Tendon reflexes - arms", 'value'=>'sysval','query'=>'NormalIncReducedType'),
"medical_abnormal_movts" => "56.Abnormal movements", 
"medical_movts_impaired" => array('title'=>"57a.Joints range of movement impaired",'value'=>'sysval','query'=>'YesNo'), 
"medical_movts_impaired_desc" => "57b.Details", 
"medical_joints_swelling" => array('title'=>"58a.Joints swelling", 'value'=>'sysval','query'=>'YesNo'),
"medical_joints_swelling_desc" => "58b.Details", 
"medical_motor" => array('title'=>"59.Motor",  'value'=>'sysval','query'=>'MotorTypes'),
"medical_musc_notes" => "60.Summary", 
"medical_hiv_status" => array('title'=>"61a.HIV status",  'value'=>'sysval','query'=>'ManagementHIVStatusTypes'),
"medical_cd4" => "61b.CD4", 
"medical_cd4_percentage" => "61c.CD4%", 
'medical_who_clinical_stage' => array('title'=>"62a.WHO stage",  'value'=>'sysval','query'=>'WHOStage'),
//"medical_who_clinical_stage" => "Clinical stage (WHO)", 
"medical_immuno_stage" => array('title'=>"62b.Immunological stage",  'value'=>'sysval','query'=>'ClinicalStage'),
'medical_request' =>  array('title'=>"63.Request Investigation", 'value'=>'sysval','query'=>'YesNo'),
'medical_request_opts' => array('title'=>"63.Investigations", 'value'=>'sysval','query'=>'RequestInvestigations','mode' => 'multi'),
"medical_tests" => "Tests (obsolete)", 
// "medical_referral" => array('title'=>"Referral to",'value'=>'sql','query'=>'select CONCAT_WS(", ",contact_last_name,contact_first_name) from contacts where contact_id="%d" limit 1','rquery'=>'select contact_id from contacts where lower(CONCAT_WS(", ",contact_last_name,contact_first_name))="%s" limit 1'),
"medical_notes" => "64.Treatment",
"medical_referral_old" => array('title'=>"65.Referral (staff)",'value'=>'preSQL','query'=>'staffName','rquery'=>'staffID'),
/* "medical_referral" => array('title'=>"Referral (position)",'value'=>'sysval','query'=>'ClinicalReference'),
'medical_next_visit' => array('title'=>'Next appointment','xtype'=>'date') */
);
?>
