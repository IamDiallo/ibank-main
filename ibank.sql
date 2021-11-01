--
-- PostgreSQL database dump
--

-- Dumped from database version 12.3
-- Dumped by pg_dump version 12.3



SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admi_compte; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.admi_compte (
    id_ad integer NOT NULL,
    id_compte integer NOT NULL,
    action_ character varying(50) NOT NULL,
    comment_ character varying(60),
    date_ date DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: administrateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.administrateur (
    id_ad integer NOT NULL,
    adresse_ad character(10) NOT NULL,
    id_agence integer NOT NULL
);


--
-- Name: adresse_c; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.adresse_c (
    id_adresse integer NOT NULL,
    rue character(20) NOT NULL,
    code_postal integer NOT NULL,
    ville character(20) NOT NULL,
    pays character(20) NOT NULL
);


--
-- Name: adresse_c_id_adresse_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.adresse_c_id_adresse_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: adresse_c_id_adresse_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.adresse_c_id_adresse_seq OWNED BY public.adresse_c.id_adresse;


--
-- Name: agence; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.agence (
    id_branch integer NOT NULL,
    adresse character(50) NOT NULL,
    code_postal_a integer NOT NULL
);


--
-- Name: agence_id_branch_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.agence_id_branch_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: agence_id_branch_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.agence_id_branch_seq OWNED BY public.agence.id_branch;


--
-- Name: client; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.client (
    id_client integer NOT NULL,
    num_tel integer NOT NULL,
    civilite character(10) NOT NULL,
    id_adresse integer NOT NULL
);


--
-- Name: compte; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.compte (
    id integer NOT NULL,
    num_compte integer NOT NULL,
    credi_compte double precision NOT NULL,
    status_compte integer NOT NULL,
    iban integer NOT NULL,
    cle_rib integer NOT NULL,
    num_carte integer,
    secret_code integer,
    id_client integer NOT NULL,
    date_ouverture date DEFAULT CURRENT_TIMESTAMP
);


--
-- Name: compte_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.compte_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: compte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.compte_id_seq OWNED BY public.compte.id;


--
-- Name: depot_argent; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.depot_argent (
    id_dep integer NOT NULL,
    montant_dept integer NOT NULL
);


--
-- Name: operation; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.operation (
    num_opera integer NOT NULL,
    statu_opera integer NOT NULL,
    montant double precision NOT NULL,
    num_compte_debit integer,
    num_compte_credit integer,
    date_opera date DEFAULT CURRENT_TIMESTAMP,
    type_opera character(10)
);


--
-- Name: operation_num_opera_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.operation_num_opera_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: operation_num_opera_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.operation_num_opera_seq OWNED BY public.operation.num_opera;


--
-- Name: retrait_argent; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.retrait_argent (
    id_ret integer NOT NULL,
    montant_ret integer NOT NULL
);


--
-- Name: transfert_argent; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.transfert_argent (
    id_trans integer NOT NULL,
    montant_trans integer NOT NULL,
    libelle_trans character varying NOT NULL,
    compt_envoi integer NOT NULL,
    compte_recoi integer NOT NULL
);


--
-- Name: utilisateur; Type: TABLE; Schema: public; Owner: -
--

CREATE TABLE public.utilisateur (
    id integer NOT NULL,
    prenom character varying(30) NOT NULL,
    nom character varying(30) NOT NULL,
    mail_utili character varying(50) NOT NULL,
    type_utili integer,
    created_at date DEFAULT CURRENT_TIMESTAMP,
    user_status integer,
    password character(20)
);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE public.utilisateur_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: utilisateur_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE public.utilisateur_id_seq OWNED BY public.utilisateur.id;


--
-- Name: adresse_c id_adresse; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.adresse_c ALTER COLUMN id_adresse SET DEFAULT nextval('public.adresse_c_id_adresse_seq'::regclass);


--
-- Name: agence id_branch; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agence ALTER COLUMN id_branch SET DEFAULT nextval('public.agence_id_branch_seq'::regclass);


--
-- Name: compte id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.compte ALTER COLUMN id SET DEFAULT nextval('public.compte_id_seq'::regclass);


--
-- Name: operation num_opera; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.operation ALTER COLUMN num_opera SET DEFAULT nextval('public.operation_num_opera_seq'::regclass);


--
-- Name: utilisateur id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur ALTER COLUMN id SET DEFAULT nextval('public.utilisateur_id_seq'::regclass);


--
-- Data for Name: admi_compte; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.admi_compte (id_ad, id_compte, action_, comment_, date_) FROM stdin;
\.


--
-- Data for Name: administrateur; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.administrateur (id_ad, adresse_ad, id_agence) FROM stdin;
1	Cergy     	33
2	Ceinture  	34
\.


--
-- Data for Name: adresse_c; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.adresse_c (id_adresse, rue, code_postal, ville, pays) FROM stdin;
23	Planète             	95000	Cergy               	France              
24	Capitaine           	95000	Pontoise            	France              
25	Rue Public          	95000	Cergy               	France              
26	Ceinture            	95000	Pontoise            	France              
27	les chenes          	78000	Paris               	France              
28	helloya             	78000	Paris               	France              
29	les chenes          	95000	Pontoise            	France              
30	les chenes          	78000	Paris               	France              
31	Ceinture            	95000	Cergy               	France              
32	Ceinture            	95000	Cergy               	France              
33	les chenes          	95000	Cergy               	France              
\.


--
-- Data for Name: agence; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.agence (id_branch, adresse, code_postal_a) FROM stdin;
1	Les chenes Cergy                                  	95000
2	Les chenes Cergy                                  	95000
3	Cergy                                             	95000
\.


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.client (id_client, num_tel, civilite, id_adresse) FROM stdin;
36	789657890	Mr        	23
37	978657832	Mr        	24
38	678936789	Mme       	25
39	879786775	Mr        	26
40	686623236	Mr        	27
41	789764545	Mr        	28
42	75678987	Mme       	29
43	6789076	Mme       	30
44	781288986	Mr        	31
45	6789756	Mr        	32
46	681286686	Mme       	33
\.


--
-- Data for Name: compte; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.compte (id, num_compte, credi_compte, status_compte, iban, cle_rib, num_carte, secret_code, id_client, date_ouverture) FROM stdin;
39	1953654335	3300	1	1611091850	465	291506	145	37	2020-12-02
40	582887126	3149	1	985644790	603	966828737	239	38	2020-12-02
41	1587863322	659	1	448803986	139	963354900	741	41	2020-12-02
43	1538302284	0	1	1104765874	88	665372659	945	42	2020-12-03
42	1366306108	1389	1	1060750178	882	162737278	622	36	2020-12-02
38	1660361707	1400	1	1754568006	353	1196102329	672	39	2020-12-02
37	1022984462	2167	1	1449849224	219	880387302	732	40	2020-12-02
\.


--
-- Data for Name: depot_argent; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.depot_argent (id_dep, montant_dept) FROM stdin;
41	567
44	789
46	1500
48	7600
52	3069
54	150
55	259
56	1500
58	500
67	0
68	0
69	300
\.


--
-- Data for Name: operation; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.operation (num_opera, statu_opera, montant, num_compte_debit, num_compte_credit, date_opera, type_opera) FROM stdin;
41	1	567	\N	37	2020-12-03	Depot     
42	1	100	37	\N	2020-12-03	Retrait   
43	1	100	37	\N	2020-12-03	Retrait   
44	1	789	\N	38	2020-12-03	Depot     
45	1	300	38	\N	2020-12-03	Retrait   
46	1	1500	\N	38	2020-12-03	Depot     
47	1	500	38	\N	2020-12-03	Retrait   
48	1	7600	\N	39	2020-12-03	Depot     
49	1	600	39	\N	2020-12-03	Retrait   
50	1	1000	39	\N	2020-12-03	Retrait   
51	1	200	39	\N	2020-12-03	Retrait   
52	1	3069	\N	40	2020-12-03	Depot     
53	1	570	40	\N	2020-12-03	Retrait   
54	1	150	\N	40	2020-12-03	Depot     
55	1	259	\N	41	2020-12-03	Depot     
56	1	1500	\N	41	2020-12-03	Depot     
57	1	500	41	\N	2020-12-03	Retrait   
58	1	500	\N	42	2020-12-03	Depot     
59	1	200	42	\N	2020-12-03	Retrait   
60	1	100	42	\N	2020-12-03	Retrait   
61	1	45	42	38	2020-12-03	Transfert 
62	1	1000	39	40	2020-12-03	Transfert 
63	1	1500	39	37	2020-12-03	Transfert 
64	1	500	40	38	2020-12-03	Transfert 
65	1	600	41	38	2020-12-03	Transfert 
66	1	1234	38	42	2020-12-03	Transfert 
67	1	0	\N	37	2020-12-03	Depot     
68	1	0	\N	37	2020-12-03	Depot     
69	1	300	\N	37	2020-12-03	Depot     
\.


--
-- Data for Name: retrait_argent; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.retrait_argent (id_ret, montant_ret) FROM stdin;
42	100
43	100
45	300
47	500
49	600
50	1000
51	200
53	570
57	500
59	200
60	100
\.


--
-- Data for Name: transfert_argent; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.transfert_argent (id_trans, montant_trans, libelle_trans, compt_envoi, compte_recoi) FROM stdin;
61	54	Valider	42	38
62	1000	Valider	39	40
63	1500	Valider	37	37
64	500	Valider	40	38
65	600	Valider	41	38
66	1234	Valider	38	42
\.


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: -
--

COPY public.utilisateur (id, prenom, nom, mail_utili, type_utili, created_at, user_status, password) FROM stdin;            
40	John	Ali	ali@gmail.com	0	2020-12-02	1	1234rt                         
37	Wilshere	Jack	jack@gmail.com	0	2020-12-02	1	12345               
38	Moubouche	Miriam	miriam@gmail.com	0	2020-12-02	1	123rgt              
41	Daniel	Peter	peter@gmail.com	0	2020-12-02	1	1234rt                      
36	Smith	Will	will@gmail.com	0	2020-11-26	1	12345               
43	Diouf	Fatoumata	fatou@gmail.com	0	2020-12-03	0	12345               
44	Douno	Emmanuel	douno@gmail.com	0	2020-12-03	0	12345                          
46	Kadi	diouf	diouf2@gmail.com	0	2020-12-03	0	12345               
\.

-- 9 Requête SQL les plus significatives explication données dans le rapport

-- 1
SELECT tochar(date_opera, 'Mon') as mon,
       extract(year from date_opera) as yyyy, 
       sum("montant") as "Transaction"
From operation 
Group by 1,2

--- 2

SELECT * FROM utilisateur JOIN client ON utilisateur.id = client.id_client
JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse 
WHERE user_status = 0 AND type_utili = 0

--- 2

SELECT * FROM utilisateur JOIN client ON utilisateur.id = client.id_client
JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse WHERE user_status = 1

--- 3

SELECT type_opera,  count(num_opera) as numbre_de_Transaction, sum(montant) as Montant_totak 
                  FROM operation group by type_opera;

--- 4
SELECT type_opera, avg(num_opera), avg(montant),date_opera FROM operation 
GROUP BY  DATE(date_opera),  type_opera ORDER BY date_opera DESC

--- 5

SELECT  count(id) as nombre, created_at ,  adresse_c.ville
FROM public.utilisateur JOIN client ON utilisateur.id = client.id_client 
JOIN adresse_c ON client.id_adresse = adresse_c.id_adresse
GROUP BY  DATE(created_at), adresse_c.ville
ORDER BY created_at DESC


--- 6
SELECT * FROM operation WHERE num_compte_debit = 12 OR  num_compte_credit = 12


-- 7

SELECT * FROM utilisateur WHERE mail_utili = diakite@gmail.com AND password = 12345

-- 8
Select * from adresse_c 
WHERE id_adresse = (SELECT id_adresse FROM client WHERE id_adresse = 24)

-- 9

SELECT type_opera, num_opera, montant FROM operation type_opera ORDER BY date_opera DESC





--
-- Name: adresse_c_id_adresse_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.adresse_c_id_adresse_seq', 33, true);


--
-- Name: agence_id_branch_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.agence_id_branch_seq', 3, true);


--
-- Name: compte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.compte_id_seq', 43, true);


--
-- Name: operation_num_opera_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.operation_num_opera_seq', 69, true);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('public.utilisateur_id_seq', 46, true);


--
-- Name: administrateur administrateur_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.administrateur
    ADD CONSTRAINT administrateur_pkey PRIMARY KEY (id_ad);


--
-- Name: adresse_c adresse_c_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.adresse_c
    ADD CONSTRAINT adresse_c_pkey PRIMARY KEY (id_adresse);


--
-- Name: agence agence_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.agence
    ADD CONSTRAINT agence_pkey PRIMARY KEY (id_branch);


--
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id_client);


--
-- Name: compte compte_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.compte
    ADD CONSTRAINT compte_pkey PRIMARY KEY (id);


--
-- Name: admi_compte id_compte; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admi_compte
    ADD CONSTRAINT id_compte PRIMARY KEY (id_compte, id_ad);


--
-- Name: depot_argent id_dep; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.depot_argent
    ADD CONSTRAINT id_dep PRIMARY KEY (id_dep);


--
-- Name: retrait_argent id_ret; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.retrait_argent
    ADD CONSTRAINT id_ret PRIMARY KEY (id_ret);


--
-- Name: transfert_argent id_trans; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.transfert_argent
    ADD CONSTRAINT id_trans PRIMARY KEY (id_trans);


--
-- Name: operation opera_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.operation
    ADD CONSTRAINT opera_pkey PRIMARY KEY (num_opera);


--
-- Name: utilisateur utilisateur_pkey; Type: CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.utilisateur
    ADD CONSTRAINT utilisateur_pkey PRIMARY KEY (id);


--
-- Name: client fk_adresse; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT fk_adresse FOREIGN KEY (id_adresse) REFERENCES public.adresse_c(id_adresse);


--
-- Name: compte fk_client; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.compte
    ADD CONSTRAINT fk_client FOREIGN KEY (id_client) REFERENCES public.client(id_client);


--
-- Name: operation fk_compte_c; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.operation
    ADD CONSTRAINT fk_compte_c FOREIGN KEY (num_compte_credit) REFERENCES public.compte(id);


--
-- Name: operation fk_compte_d; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.operation
    ADD CONSTRAINT fk_compte_d FOREIGN KEY (num_compte_debit) REFERENCES public.compte(id);


--
-- Name: admi_compte id_ad_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admi_compte
    ADD CONSTRAINT id_ad_fk FOREIGN KEY (id_ad) REFERENCES public.administrateur(id_ad);


--
-- Name: administrateur id_agence; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.administrateur
    ADD CONSTRAINT id_agence FOREIGN KEY (id_ad) REFERENCES public.agence(id_branch) NOT VALID;


--
-- Name: admi_compte id_compte_fk; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY public.admi_compte
    ADD CONSTRAINT id_compte_fk FOREIGN KEY (id_compte) REFERENCES public.compte(id);


--
-- PostgreSQL database dump complete
--

