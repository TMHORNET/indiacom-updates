CREATE TABLE {wp_prefix}wpda_app_container{wpda_postfix}
(cnt_id		bigint unsigned		not null	auto_increment
,cnt_dbs	varchar(128)		not null
,cnt_tbl	varchar(128)		not null
,cnt_title	varchar(100)		not null
,app_id		bigint unsigned		not null
,settings	longtext
,seq_nr		smallint unsigned
,primary key (cnt_id)
) {wpda_collate};
