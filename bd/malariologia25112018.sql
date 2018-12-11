--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.3
-- Dumped by pg_dump version 9.6.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- Name: caso_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE caso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE caso_id_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: caso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE caso (
    id_caso integer DEFAULT nextval('caso_id_seq'::regclass) NOT NULL,
    numero_caso integer,
    muerte character varying(2),
    recaida character varying(2),
    origen_parroquia integer,
    clasificacion_caso character varying(100)
);


ALTER TABLE caso OWNER TO postgres;

--
-- Name: caso_recaida_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE caso_recaida_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE caso_recaida_id_seq OWNER TO postgres;

--
-- Name: caso_recaida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE caso_recaida (
    id_caso_recaida integer DEFAULT nextval('caso_recaida_id_seq'::regclass) NOT NULL,
    id_caso integer,
    id_recaida integer
);


ALTER TABLE caso_recaida OWNER TO postgres;

--
-- Name: descripcion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE descripcion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE descripcion_id_seq OWNER TO postgres;

--
-- Name: descripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE descripcion (
    id_descripcion integer DEFAULT nextval('descripcion_id_seq'::regclass) NOT NULL,
    embarazada character varying(2),
    madre_lactante character varying(2)
);


ALTER TABLE descripcion OWNER TO postgres;

--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE estado (
    id_estado bigint NOT NULL,
    nombre character varying(100) NOT NULL,
    pais_id integer NOT NULL
);


ALTER TABLE estado OWNER TO postgres;

--
-- Name: COLUMN estado.id_estado; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN estado.id_estado IS 'Identificador de la tabla';


--
-- Name: COLUMN estado.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN estado.nombre IS 'Nombre del Estado';


--
-- Name: COLUMN estado.pais_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN estado.pais_id IS 'Identificador del pais al que pertenece el estado.';


--
-- Name: estado_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estado_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE estado_id_seq OWNER TO postgres;

--
-- Name: estado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE estado_id_seq OWNED BY estado.id_estado;


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE municipio (
    id_municipio bigint NOT NULL,
    nombre character varying(100) NOT NULL,
    estado_id bigint NOT NULL
);


ALTER TABLE municipio OWNER TO postgres;

--
-- Name: TABLE municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE municipio IS 'Entidad qu contendra los municipios. Desarrollado por Jose Rodriguez <josearodrigueze@gmail.com> @josearodrigueze';


--
-- Name: COLUMN municipio.id_municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN municipio.id_municipio IS 'Identificador de la tabla';


--
-- Name: COLUMN municipio.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN municipio.nombre IS 'Nombre del municipio.';


--
-- Name: COLUMN municipio.estado_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN municipio.estado_id IS 'Identificador del estado al que pertenece el municipio.';


--
-- Name: municipio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE municipio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE municipio_id_seq OWNER TO postgres;

--
-- Name: municipio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE municipio_id_seq OWNED BY municipio.id_municipio;


--
-- Name: paciente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paciente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_id_seq OWNER TO postgres;

--
-- Name: paciente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE paciente (
    id_paciente integer DEFAULT nextval('paciente_id_seq'::regclass) NOT NULL,
    numero_paciente character varying(12),
    nombre_paciente character varying(20),
    apellido_paciente character varying(20),
    cedula_paciente character varying(10),
    nacionalidad_paciente character varying(15),
    fecha_nacimiento date,
    direccion_paciente character varying(200),
    sexo_paciente character varying(10),
    telefono_paciente character varying(30),
    etnia_paciente character varying(20),
    id_parroquia integer,
    id_usuario_sistema integer,
    email_paciente character varying(30),
    estadocivil_paciente character varying(30),
    ocupacion character varying(50),
    peso_paciente integer,
    id_descripcion integer,
    fecha_creado date DEFAULT now(),
    estado character varying(30),
    municipio character varying(40),
    parroquia character varying(40)
);


ALTER TABLE paciente OWNER TO postgres;

--
-- Name: paciente_caso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE paciente_caso (
    id integer NOT NULL,
    fecha date,
    id_caso integer,
    id_paciente integer
);


ALTER TABLE paciente_caso OWNER TO postgres;

--
-- Name: paciente_caso_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paciente_caso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_caso_id_seq OWNER TO postgres;

--
-- Name: paciente_caso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE paciente_caso_id_seq OWNED BY paciente_caso.id;


--
-- Name: paciente_descripcion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paciente_descripcion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_descripcion_id_seq OWNER TO postgres;

--
-- Name: paciente_pruebas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paciente_pruebas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_pruebas_id_seq OWNER TO postgres;

--
-- Name: paciente_pruebas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE paciente_pruebas (
    id_paciente_pruebas integer DEFAULT nextval('paciente_pruebas_id_seq'::regclass) NOT NULL,
    id_paciente integer,
    id_pruebas integer,
    id_caso integer
);


ALTER TABLE paciente_pruebas OWNER TO postgres;

--
-- Name: paciente_tratamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE paciente_tratamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_tratamiento_id_seq OWNER TO postgres;

--
-- Name: paciente_tratamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE paciente_tratamiento (
    id_paciente_tratamiento integer DEFAULT nextval('paciente_tratamiento_id_seq'::regclass) NOT NULL,
    id_paciente integer,
    id_tratamiento integer
);


ALTER TABLE paciente_tratamiento OWNER TO postgres;

--
-- Name: pais; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pais (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL
);


ALTER TABLE pais OWNER TO postgres;

--
-- Name: TABLE pais; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE pais IS 'Entidad que contiene los paises. Desarrollado por Jose Rodriguez <josearodrigueze@gmail.com> @josearodrigueze';


--
-- Name: COLUMN pais.id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN pais.id IS 'Identificador de la tabla';


--
-- Name: COLUMN pais.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN pais.nombre IS 'Nombre del pais';


--
-- Name: pais_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pais_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pais_id_seq OWNER TO postgres;

--
-- Name: pais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pais_id_seq OWNED BY pais.id;


--
-- Name: parroquia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE parroquia (
    id_parroquia bigint NOT NULL,
    nombre character varying(100) NOT NULL,
    municipio_id bigint NOT NULL
);


ALTER TABLE parroquia OWNER TO postgres;

--
-- Name: TABLE parroquia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE parroquia IS 'Entidad qu contendra los parroquias. Desarrollado por Jose Rodriguez <josearodrigueze@gmail.com> @josearodrigueze';


--
-- Name: COLUMN parroquia.id_parroquia; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN parroquia.id_parroquia IS 'Identificador de la tabla';


--
-- Name: COLUMN parroquia.nombre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN parroquia.nombre IS 'Nombre del parroquia.';


--
-- Name: COLUMN parroquia.municipio_id; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN parroquia.municipio_id IS 'Identificador del municipio al que pertenece la parroquia.';


--
-- Name: parroquia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE parroquia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE parroquia_id_seq OWNER TO postgres;

--
-- Name: parroquia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE parroquia_id_seq OWNED BY parroquia.id_parroquia;


--
-- Name: pruebas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pruebas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pruebas_id_seq OWNER TO postgres;

--
-- Name: pruebas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pruebas (
    id_pruebas integer DEFAULT nextval('pruebas_id_seq'::regclass) NOT NULL,
    tipo_prueba character varying(50),
    codigo_notificacion integer,
    numero_lamina_pdrm integer,
    tipo_busqueda character varying(30),
    especie_plasmodium character varying(50),
    fecha_inicio_fiebre date,
    fecha_toma_lamina date,
    lugar_toma_lamina character varying(100),
    parroquia_id integer
);


ALTER TABLE pruebas OWNER TO postgres;

--
-- Name: recaida_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE recaida_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recaida_id_seq OWNER TO postgres;

--
-- Name: recaida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE recaida (
    id_recaida integer DEFAULT nextval('recaida_id_seq'::regclass) NOT NULL,
    descripcion character varying(50)
);


ALTER TABLE recaida OWNER TO postgres;

--
-- Name: rol_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE rol_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE rol_id_seq OWNER TO postgres;

--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE rol (
    id_rol integer DEFAULT nextval('rol_id_seq'::regclass) NOT NULL,
    descripcion character varying(15)
);


ALTER TABLE rol OWNER TO postgres;

--
-- Name: tratamiento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tratamiento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tratamiento_id_seq OWNER TO postgres;

--
-- Name: tratamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tratamiento (
    id_tratamiento integer DEFAULT nextval('tratamiento_id_seq'::regclass) NOT NULL,
    nombre character varying(30),
    cantidad integer,
    fecha_suministrado date
);


ALTER TABLE tratamiento OWNER TO postgres;

--
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 10000000
    CACHE 1;


ALTER TABLE usuario_id_seq OWNER TO postgres;

--
-- Name: usuario_sistema; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE usuario_sistema (
    id_usuario_sistema integer DEFAULT nextval('usuario_id_seq'::regclass) NOT NULL,
    usuario_sistema character varying(20),
    clave character varying(15),
    nombre character varying(15),
    apellido character varying(15),
    cedula character varying(10),
    id_rol integer,
    telefono_usuario character varying(15),
    email_usuario character varying(30),
    fecha_creado date DEFAULT now()
);


ALTER TABLE usuario_sistema OWNER TO postgres;

--
-- Name: estado id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado ALTER COLUMN id_estado SET DEFAULT nextval('estado_id_seq'::regclass);


--
-- Name: municipio id_municipio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio ALTER COLUMN id_municipio SET DEFAULT nextval('municipio_id_seq'::regclass);


--
-- Name: paciente_caso id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_caso ALTER COLUMN id SET DEFAULT nextval('paciente_caso_id_seq'::regclass);


--
-- Name: pais id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pais ALTER COLUMN id SET DEFAULT nextval('pais_id_seq'::regclass);


--
-- Name: parroquia id_parroquia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parroquia ALTER COLUMN id_parroquia SET DEFAULT nextval('parroquia_id_seq'::regclass);


--
-- Data for Name: caso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY caso (id_caso, numero_caso, muerte, recaida, origen_parroquia, clasificacion_caso) FROM stdin;
1	123	ff	ff	1	frfff
2	124	vv	ff	2	httyt
3	1			434	
\.


--
-- Name: caso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('caso_id_seq', 3, true);


--
-- Data for Name: caso_recaida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY caso_recaida (id_caso_recaida, id_caso, id_recaida) FROM stdin;
\.


--
-- Name: caso_recaida_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('caso_recaida_id_seq', 1, false);


--
-- Data for Name: descripcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY descripcion (id_descripcion, embarazada, madre_lactante) FROM stdin;
\.


--
-- Name: descripcion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('descripcion_id_seq', 1, false);


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY estado (id_estado, nombre, pais_id) FROM stdin;
1	DTTO. CAPITAL	1
2	ANZOATEGUI	1
3	APURE	1
4	ARAGUA	1
5	BARINAS	1
6	BOLIVAR	1
7	CARABOBO	1
8	COJEDES	1
9	FALCON	1
10	GUARICO	1
11	LARA	1
12	MERIDA	1
13	MIRANDA	1
14	MONAGAS	1
15	NUEVA ESPARTA	1
16	PORTUGUESA	1
17	SUCRE	1
18	TACHIRA	1
19	TRUJILLO	1
20	YARACUY	1
21	ZULIA	1
22	AMAZONAS	1
23	DELTA AMACURO	1
24	VARGAS	1
\.


--
-- Name: estado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estado_id_seq', 25, false);


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY municipio (id_municipio, nombre, estado_id) FROM stdin;
1	LIBERTADOR	1
2	ANACO	2
3	ARAGUA	2
4	BOLIVAR	2
5	BRUZUAL	2
6	CAJIGAL	2
7	FREITES	2
8	INDEPENDENCIA	2
9	LIBERTAD	2
10	MIRANDA	2
11	MONAGAS	2
12	PEÑALVER	2
13	SIMON RODRIGUEZ	2
14	SOTILLO	2
15	GUANIPA	2
16	GUANTA	2
17	PIRITU	2
18	M.L/DIEGO BAUTISTA U	2
19	CARVAJAL	2
20	SANTA ANA	2
21	MC GREGOR	2
22	S JUAN CAPISTRANO	2
23	ACHAGUAS	3
24	MUÑOZ	3
25	PAEZ	3
26	PEDRO CAMEJO	3
27	ROMULO GALLEGOS	3
28	SAN FERNANDO	3
29	BIRUACA	3
30	GIRARDOT	4
31	SANTIAGO MARIÑO	4
32	JOSE FELIX RIVAS	4
33	SAN CASIMIRO	4
34	SAN SEBASTIAN	4
35	SUCRE	4
36	URDANETA	4
37	ZAMORA	4
38	LIBERTADOR	4
39	JOSE ANGEL LAMAS	4
40	BOLIVAR	4
41	SANTOS MICHELENA	4
42	MARIO B IRAGORRY	4
43	TOVAR	4
44	CAMATAGUA	4
45	JOSE R REVENGA	4
46	FRANCISCO LINARES A.	4
47	M.OCUMARE D LA COSTA	4
48	ARISMENDI	5
49	BARINAS	5
50	BOLIVAR	5
51	EZEQUIEL ZAMORA	5
52	OBISPOS	5
53	PEDRAZA	5
54	ROJAS	5
55	SOSA	5
56	ALBERTO ARVELO T	5
57	A JOSE DE SUCRE	5
58	CRUZ PAREDES	5
59	ANDRES E. BLANCO	5
60	CARONI	6
61	CEDEÑO	6
62	HERES	6
63	PIAR	6
64	ROSCIO	6
65	SUCRE	6
66	SIFONTES	6
67	RAUL LEONI	6
68	GRAN SABANA	6
69	EL CALLAO	6
70	PADRE PEDRO CHIEN	6
71	BEJUMA	7
72	CARLOS ARVELO	7
73	DIEGO IBARRA	7
74	GUACARA	7
75	MONTALBAN	7
76	JUAN JOSE MORA	7
77	PUERTO CABELLO	7
78	SAN JOAQUIN	7
79	VALENCIA	7
80	MIRANDA	7
81	LOS GUAYOS	7
82	NAGUANAGUA	7
83	SAN DIEGO	7
84	LIBERTADOR	7
85	ANZOATEGUI	8
86	FALCON	8
87	GIRARDOT	8
88	MP PAO SN J BAUTISTA	8
89	RICAURTE	8
90	SAN CARLOS	8
91	TINACO	8
92	LIMA BLANCO	8
93	ROMULO GALLEGOS	8
94	ACOSTA	9
95	BOLIVAR	9
96	BUCHIVACOA	9
97	CARIRUBANA	9
98	COLINA	9
99	DEMOCRACIA	9
100	FALCON	9
101	FEDERACION	9
102	MAUROA	9
103	MIRANDA	9
104	PETIT	9
105	SILVA	9
106	ZAMORA	9
107	DABAJURO	9
108	MONS. ITURRIZA	9
109	LOS TAQUES	9
110	PIRITU	9
111	UNION	9
112	SAN FRANCISCO	9
113	JACURA	9
114	CACIQUE MANAURE	9
115	PALMA SOLA	9
116	SUCRE	9
117	URUMACO	9
118	TOCOPERO	9
119	INFANTE	10
120	MELLADO	10
121	MIRANDA	10
122	MONAGAS	10
123	RIBAS	10
124	ROSCIO	10
125	ZARAZA	10
126	CAMAGUAN	10
127	S JOSE DE GUARIBE	10
128	LAS MERCEDES	10
129	EL SOCORRO	10
130	ORTIZ	10
131	S MARIA DE IPIRE	10
132	CHAGUARAMAS	10
133	SAN GERONIMO DE G	10
134	CRESPO	11
135	IRIBARREN	11
136	JIMENEZ	11
137	MORAN	11
138	PALAVECINO	11
139	TORRES	11
140	URDANETA	11
141	ANDRES E BLANCO	11
142	SIMON PLANAS	11
143	ALBERTO ADRIANI	12
144	ANDRES BELLO	12
145	ARZOBISPO CHACON	12
146	CAMPO ELIAS	12
147	GUARAQUE	12
148	JULIO CESAR SALAS	12
149	JUSTO BRICEÑO	12
150	LIBERTADOR	12
151	SANTOS MARQUINA	12
152	MIRANDA	12
153	ANTONIO PINTO S.	12
154	OB. RAMOS DE LORA	12
155	CARACCIOLO PARRA	12
156	CARDENAL QUINTERO	12
157	PUEBLO LLANO	12
158	RANGEL	12
159	RIVAS DAVILA	12
160	SUCRE	12
161	TOVAR	12
162	TULIO F CORDERO	12
163	PADRE NOGUERA	12
164	ARICAGUA	12
165	ZEA	12
166	ACEVEDO	13
167	BRION	13
168	GUAICAIPURO	13
169	INDEPENDENCIA	13
170	LANDER	13
171	PAEZ	13
172	PAZ CASTILLO	13
173	PLAZA	13
174	SUCRE	13
175	URDANETA	13
176	ZAMORA	13
177	CRISTOBAL ROJAS	13
178	LOS SALIAS	13
179	ANDRES BELLO	13
180	SIMON BOLIVAR	13
181	BARUTA	13
182	CARRIZAL	13
183	CHACAO	13
184	EL HATILLO	13
185	BUROZ	13
186	PEDRO GUAL	13
187	ACOSTA	14
188	BOLIVAR	14
189	CARIPE	14
190	CEDEÑO	14
191	EZEQUIEL ZAMORA	14
192	LIBERTADOR	14
193	MATURIN	14
194	PIAR	14
195	PUNCERES	14
196	SOTILLO	14
197	AGUASAY	14
198	SANTA BARBARA	14
199	URACOA	14
200	ARISMENDI	15
201	DIAZ	15
202	GOMEZ	15
203	MANEIRO	15
204	MARCANO	15
205	MARIÑO	15
206	PENIN. DE MACANAO	15
207	VILLALBA(I.COCHE)	15
208	TUBORES	15
209	ANTOLIN DEL CAMPO	15
210	GARCIA	15
211	ARAURE	16
212	ESTELLER	16
213	GUANARE	16
214	GUANARITO	16
215	OSPINO	16
216	PAEZ	16
217	SUCRE	16
218	TUREN	16
219	M.JOSE V DE UNDA	16
220	AGUA BLANCA	16
221	PAPELON	16
222	GENARO BOCONOITO	16
223	S RAFAEL DE ONOTO	16
224	SANTA ROSALIA	16
225	ARISMENDI	17
226	BENITEZ	17
227	BERMUDEZ	17
228	CAJIGAL	17
229	MARIÑO	17
230	MEJIA	17
231	MONTES	17
232	RIBERO	17
233	SUCRE	17
234	VALDEZ	17
235	ANDRES E BLANCO	17
236	LIBERTADOR	17
237	ANDRES MATA	17
238	BOLIVAR	17
239	CRUZ S ACOSTA	17
240	AYACUCHO	18
241	BOLIVAR	18
242	INDEPENDENCIA	18
243	CARDENAS	18
244	JAUREGUI	18
245	JUNIN	18
246	LOBATERA	18
247	SAN CRISTOBAL	18
248	URIBANTE	18
249	CORDOBA	18
250	GARCIA DE HEVIA	18
251	GUASIMOS	18
252	MICHELENA	18
253	LIBERTADOR	18
254	PANAMERICANO	18
255	PEDRO MARIA UREÑA	18
256	SUCRE	18
257	ANDRES BELLO	18
258	FERNANDEZ FEO	18
259	LIBERTAD	18
260	SAMUEL MALDONADO	18
261	SEBORUCO	18
262	ANTONIO ROMULO C	18
263	FCO DE MIRANDA	18
264	JOSE MARIA VARGA	18
265	RAFAEL URDANETA	18
266	SIMON RODRIGUEZ	18
267	TORBES	18
268	SAN JUDAS TADEO	18
269	RAFAEL RANGEL	19
270	BOCONO	19
271	CARACHE	19
272	ESCUQUE	19
273	TRUJILLO	19
274	URDANETA	19
275	VALERA	19
276	CANDELARIA	19
277	MIRANDA	19
278	MONTE CARMELO	19
279	MOTATAN	19
280	PAMPAN	19
281	S RAFAEL CARVAJAL	19
282	SUCRE	19
283	ANDRES BELLO	19
284	BOLIVAR	19
285	JOSE F M CAÑIZAL	19
286	JUAN V CAMPO ELI	19
287	LA CEIBA	19
288	PAMPANITO	19
289	BOLIVAR	20
290	BRUZUAL	20
291	NIRGUA	20
292	SAN FELIPE	20
293	SUCRE	20
294	URACHICHE	20
295	PEÑA	20
296	JOSE ANTONIO PAEZ	20
297	LA TRINIDAD	20
298	COCOROTE	20
299	INDEPENDENCIA	20
300	ARISTIDES BASTID	20
301	MANUEL MONGE	20
302	VEROES	20
303	BARALT	21
304	SANTA RITA	21
305	COLON	21
306	MARA	21
307	MARACAIBO	21
308	MIRANDA	21
309	PAEZ	21
310	MACHIQUES DE P	21
311	SUCRE	21
312	LA CAÑADA DE U.	21
313	LAGUNILLAS	21
314	CATATUMBO	21
315	M/ROSARIO DE PERIJA	21
316	CABIMAS	21
317	VALMORE RODRIGUEZ	21
318	JESUS E LOSSADA	21
319	ALMIRANTE P	21
320	SAN FRANCISCO	21
321	JESUS M SEMPRUN	21
322	FRANCISCO J PULG	21
323	SIMON BOLIVAR	21
324	ATURES	22
325	ATABAPO	22
326	MAROA	22
327	RIO NEGRO	22
328	AUTANA	22
329	MANAPIARE	22
330	ALTO ORINOCO	22
331	TUCUPITA	23
332	PEDERNALES	23
333	ANTONIO DIAZ	23
334	CASACOIMA	23
335	VARGAS	24
\.


--
-- Name: municipio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('municipio_id_seq', 336, false);


--
-- Data for Name: paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY paciente (id_paciente, numero_paciente, nombre_paciente, apellido_paciente, cedula_paciente, nacionalidad_paciente, fecha_nacimiento, direccion_paciente, sexo_paciente, telefono_paciente, etnia_paciente, id_parroquia, id_usuario_sistema, email_paciente, estadocivil_paciente, ocupacion, peso_paciente, id_descripcion, fecha_creado, estado, municipio, parroquia) FROM stdin;
1	123	erly	heredia	fgf55	ffg	1990-03-19	fgffh	hghjg	453	ghghj	3	1	jhgjh	ghg	\N	\N	\N	2018-10-27	\N	\N	\N
42		jose	cadenas	6816938	2	2018-10-05	carrera 23	2	04266115101	41	429	1	jdcadenas@gmail.com	3	docebte	70	\N	2018-10-27	\N	\N	\N
44		Zoraira B	Cordero G	17784713	\N	2018-10-05	la playa santa isabel	\N	4152569636	\N	435	1	queyye@gm.com	\N	ama de casa	85	\N	2018-10-27	\N	\N	\N
45		juan	lopez	14852741	1	1991-03-13	santa isabel	Masculino	04158562341	41	435	1	dcdsd@gm.com	2	bhbhbh	96	\N	2018-10-27	\N	\N	\N
46		ramon	cuicas	7320991	1	1961-05-10	malecon	Masculino	04148529632	41	430	1	skksks@g.com	3	obrero	95	\N	2018-10-27	\N	\N	\N
53		jose	alvarez	85296321	1	1950-10-06	lara	Masculino	04859635674	41	156	1	jauaua@g.com	2	dfsfsdfs	90	\N	2018-10-27	\N	\N	\N
43		Josue David	Cordero Gonzalez	2023760710	2	2009-03-11	avenida 45 entre 99 y 77	Masculino	04788562363	41	232	1	mgmgm@gmai.com	2	informaticohghg	85	\N	2018-10-26	\N	\N	\N
47		luisa caceres	arismendi	20237854	2	1970-12-08	barrio union	Masculino	04247418532	41	283	1	edca@h.com	4	estudiante	65	\N	2018-10-24	\N	\N	\N
54		Hector	Alejos	15666173	1	1970-10-10	la pastora	Masculino	04268547663	41	250	1	alejos@g.com	2	Albañil	100	\N	2018-10-30	\N	\N	\N
55		jose	lopez	456123	1	1960-04-30	rosaleda	Masculino	45678922	41	\N	1	dsad@g.com	2	obrero	80	\N	2018-11-05	\N	\N	\N
56		jose	lopez	456123	1	1960-04-30	rosaleda	Masculino	45678922	41	\N	1	dsad@g.com	2	obrero	80	\N	2018-11-05	\N	\N	\N
57		jose	lopez	456123	1	1960-04-30	rosaleda	Masculino	45678922	41	\N	1	dsad@g.com	2	obrero	80	\N	2018-11-05	\N	\N	\N
58		jose	lopez	456123	1	1960-04-30	rosaleda	Masculino	45678922	41	\N	1	dsad@g.com	2	obrero	80	\N	2018-11-05	\N	\N	\N
59		ernesto	perez	74169685	1	1974-01-15	la paz	Masculino	sdaasdas	41	\N	1	wwaq@gmail.com	2	comerciante	96	\N	2018-11-06	\N	\N	\N
60		ernesto	perez	74169685	1	1974-01-15	la paz	Masculino	sdaasdas	41	\N	1	wwaq@gmail.com	2	comerciante	96	\N	2018-11-06	\N	\N	\N
61		ernesto	perez	74169685	1	1974-01-15	la paz	Masculino	sdaasdas	41	\N	1	wwaq@gmail.com	2	comerciante	96	\N	2018-11-06	\N	\N	\N
62		fdsdfs	fdssdf	errwerwe	1	1986-09-16	dfsfsf	Masculino	343423423	41	\N	1	fddsf@h.com	2	gdgdfg	54	\N	2018-11-06	\N	\N	\N
63		ernesto	alvarez	4152785	1	1970-10-10	oeste	Masculino	142578596	41	410	1	fsdfdsf@h.com	2	obrero	93	\N	2018-11-06	\N	\N	\N
64		yadira	bastidas	5240799	1	1978-12-14	san jose	Femenino	0478965855	41	432	1	jajaja@g.com	2	comerciante	80	\N	2018-11-07	\N	\N	\N
66		rafael	angulo	7458963	1	1962-03-07	centro	Masculino	0251963852	41	181	1	sasa@h.com	2	campesino	90	\N	2018-11-07	\N	\N	\N
69		paula	perez	8558767	1	1955-05-03	oeste	Femenino	74896666	41	224	1	yqyqyq@g.com	3	casa	70	\N	2018-11-07	\N	\N	\N
70		pedro	suarez	6378555	1	1950-08-24	este	Masculino	74185963	41	176	1	jjkjkj@g.com	2	obrera	85	\N	2018-11-07	\N	\N	\N
71		juan	perez	14785266	V	1955-08-22	santa rosa	Masculino	041526666	41	435	1	\N	2	obrero	90	\N	\N	\N	\N	\N
73		luis	angulo	74962588	V	1981-11-02	la caldera	Masculino	04155555555	41	430	1	\N	2	albañil	90	\N	\N	\N	\N	\N
75		hermes	joiuuu	56214741	V	1970-11-10	hghggh	Masculino	0114444444	41	440	1	\N	2	kjkjkjk	74	\N	\N	\N	\N	\N
20		francisco	suarez	9696969	Venezolano	2018-10-05	catedral	Masculino	4152222222	41	4	1	fran@g.com	Soltero(a)	comerciante	90	\N	2018-10-27	\N	\N	\N
79		armando	trampa	58749644	Venezolano	1980-04-22	en la trampa	Masculino	41526666666	41	143	1	latrampa@g.com	Soltero(a)	albañil	96	\N	2018-11-24	ARAGUA	SANTOS MICHELENA	TIARA
81		ana	suarez	15666666	Venezolano	1990-11-20	sanmta clara	Femenino	04147589666	41	274	1	suarez@g.com	Casado(a)	ama de casa	65	\N	2018-11-25	CARABOBO	SAN JOAQUIN	SAN JOAQUIN
\.


--
-- Data for Name: paciente_caso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY paciente_caso (id, fecha, id_caso, id_paciente) FROM stdin;
1	2000-10-01	1	1
2	2000-10-02	2	1
\.


--
-- Name: paciente_caso_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paciente_caso_id_seq', 2, true);


--
-- Name: paciente_descripcion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paciente_descripcion_id_seq', 1, false);


--
-- Name: paciente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paciente_id_seq', 81, true);


--
-- Data for Name: paciente_pruebas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY paciente_pruebas (id_paciente_pruebas, id_paciente, id_pruebas, id_caso) FROM stdin;
1	43	1	\N
2	43	2	\N
8	1	10	\N
9	1	11	\N
10	1	12	\N
12	54	14	\N
13	64	15	\N
14	20	16	\N
18	79	20	1
17	79	19	1
16	79	18	1
15	79	17	3
\.


--
-- Name: paciente_pruebas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paciente_pruebas_id_seq', 18, true);


--
-- Data for Name: paciente_tratamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY paciente_tratamiento (id_paciente_tratamiento, id_paciente, id_tratamiento) FROM stdin;
1	20	1
3	42	3
2	44	2
6	44	6
7	46	7
13	79	13
14	79	14
15	79	15
\.


--
-- Name: paciente_tratamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('paciente_tratamiento_id_seq', 15, true);


--
-- Data for Name: pais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pais (id, nombre) FROM stdin;
1	Venezuela
\.


--
-- Name: pais_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pais_id_seq', 2, false);


--
-- Data for Name: parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY parroquia (id_parroquia, nombre, municipio_id) FROM stdin;
1	ALTAGRACIA	1
2	CANDELARIA	1
3	CATEDRAL	1
4	LA PASTORA	1
5	SAN AGUSTIN	1
6	SAN JOSE	1
7	SAN JUAN	1
8	SANTA ROSALIA	1
9	SANTA TERESA	1
10	SUCRE	1
11	23 DE ENERO	1
12	ANTIMANO	1
13	EL RECREO	1
14	EL VALLE	1
15	LA VEGA	1
16	MACARAO	1
17	CARICUAO	1
18	EL JUNQUITO	1
19	COCHE	1
20	SAN PEDRO	1
21	SAN BERNARDINO	1
22	EL PARAISO	1
23	ANACO	2
24	SAN JOAQUIN	2
25	CM. ARAGUA DE BARCELONA	3
26	CACHIPO	3
27	EL CARMEN	4
28	SAN CRISTOBAL	4
29	BERGANTIN	4
30	CAIGUA	4
31	EL PILAR	4
32	NARICUAL	4
33	CM. CLARINES	5
34	GUANAPE	5
35	SABANA DE UCHIRE	5
36	CM. ONOTO	6
37	SAN PABLO	6
38	CM. CANTAURA	7
39	LIBERTADOR	7
40	SANTA ROSA	7
41	URICA	7
42	CM. SOLEDAD	8
43	MAMO	8
44	CM. SAN MATEO	9
45	EL CARITO	9
46	SANTA INES	9
47	CM. PARIAGUAN	10
48	ATAPIRIRE	10
49	BOCA DEL PAO	10
50	EL PAO	10
51	CM. MAPIRE	11
52	PIAR	11
53	SN DIEGO DE CABRUTICA	11
54	SANTA CLARA	11
55	UVERITO	11
56	ZUATA	11
57	CM. PUERTO PIRITU	12
58	SAN MIGUEL	12
59	SUCRE	12
60	CM. EL TIGRE	13
61	POZUELOS	14
62	CM PTO. LA CRUZ	14
63	CM. SAN JOSE DE GUANIPA	15
64	GUANTA	16
65	CHORRERON	16
66	PIRITU	17
67	SAN FRANCISCO	17
68	LECHERIAS	18
69	EL MORRO	18
70	VALLE GUANAPE	19
71	SANTA BARBARA	19
72	SANTA ANA	20
73	PUEBLO NUEVO	20
74	EL CHAPARRO	21
75	TOMAS ALFARO CALATRAVA	21
76	BOCA UCHIRE	22
77	BOCA DE CHAVEZ	22
78	ACHAGUAS	23
79	APURITO	23
80	EL YAGUAL	23
81	GUACHARA	23
82	MUCURITAS	23
83	QUESERAS DEL MEDIO	23
84	BRUZUAL	24
85	MANTECAL	24
86	QUINTERO	24
87	SAN VICENTE	24
88	RINCON HONDO	24
89	GUASDUALITO	25
90	ARAMENDI	25
91	EL AMPARO	25
92	SAN CAMILO	25
93	URDANETA	25
94	SAN JUAN DE PAYARA	26
95	CODAZZI	26
96	CUNAVICHE	26
97	ELORZA	27
98	LA TRINIDAD	27
99	SAN FERNANDO	28
100	PEÑALVER	28
101	EL RECREO	28
102	SN RAFAEL DE ATAMAICA	28
103	BIRUACA	29
104	CM. LAS DELICIAS	30
105	CHORONI	30
106	MADRE MA DE SAN JOSE	30
107	JOAQUIN CRESPO	30
108	PEDRO JOSE OVALLES	30
109	JOSE CASANOVA GODOY	30
110	ANDRES ELOY BLANCO	30
111	LOS TACARIGUAS	30
112	CM. TURMERO	31
113	SAMAN DE GUERE	31
114	ALFREDO PACHECO M	31
115	CHUAO	31
116	AREVALO APONTE	31
117	CM. LA VICTORIA	32
118	ZUATA	32
119	PAO DE ZARATE	32
120	CASTOR NIEVES RIOS	32
121	LAS GUACAMAYAS	32
122	CM. SAN CASIMIRO	33
123	VALLE MORIN	33
124	GUIRIPA	33
125	OLLAS DE CARAMACATE	33
126	CM. SAN SEBASTIAN	34
127	CM. CAGUA	35
128	BELLA VISTA	35
129	CM. BARBACOAS	36
130	SAN FRANCISCO DE CARA	36
131	TAGUAY	36
132	LAS PEÑITAS	36
133	CM. VILLA DE CURA	37
134	MAGDALENO	37
135	SAN FRANCISCO DE ASIS	37
136	VALLES DE TUCUTUNEMO	37
137	PQ AUGUSTO MIJARES	37
138	CM. PALO NEGRO	38
139	SAN MARTIN DE PORRES	38
140	CM. SANTA CRUZ	39
141	CM. SAN MATEO	40
142	CM. LAS TEJERIAS	41
143	TIARA	41
144	CM. EL LIMON	42
145	CA A DE AZUCAR	42
146	CM. COLONIA TOVAR	43
147	CM. CAMATAGUA	44
148	CARMEN DE CURA	44
149	CM. EL CONSEJO	45
150	CM. SANTA RITA	46
151	FRANCISCO DE MIRANDA	46
152	MONS FELICIANO G	46
153	OCUMARE DE LA COSTA	47
154	ARISMENDI	48
155	GUADARRAMA	48
156	LA UNION	48
157	SAN ANTONIO	48
158	ALFREDO A LARRIVA	49
159	BARINAS	49
160	SAN SILVESTRE	49
161	SANTA INES	49
162	SANTA LUCIA	49
163	TORUNOS	49
164	EL CARMEN	49
165	ROMULO BETANCOURT	49
166	CORAZON DE JESUS	49
167	RAMON I MENDEZ	49
168	ALTO BARINAS	49
169	MANUEL P FAJARDO	49
170	JUAN A RODRIGUEZ D	49
171	DOMINGA ORTIZ P	49
172	ALTAMIRA	50
173	BARINITAS	50
174	CALDERAS	50
175	SANTA BARBARA	51
176	JOSE IGNACIO DEL PUMAR	51
177	RAMON IGNACIO MENDEZ	51
178	PEDRO BRICEÑO MENDEZ	51
179	EL REAL	52
180	LA LUZ	52
181	OBISPOS	52
182	LOS GUASIMITOS	52
183	CIUDAD BOLIVIA	53
184	IGNACIO BRICEÑO	53
185	PAEZ	53
186	JOSE FELIX RIBAS	53
187	DOLORES	54
188	LIBERTAD	54
189	PALACIO FAJARDO	54
190	SANTA ROSA	54
191	CIUDAD DE NUTRIAS	55
192	EL REGALO	55
193	PUERTO DE NUTRIAS	55
194	SANTA CATALINA	55
195	RODRIGUEZ DOMINGUEZ	56
196	SABANETA	56
197	TICOPORO	57
198	NICOLAS PULIDO	57
199	ANDRES BELLO	57
200	BARRANCAS	58
201	EL SOCORRO	58
202	MASPARRITO	58
203	EL CANTON	59
204	SANTA CRUZ DE GUACAS	59
205	PUERTO VIVAS	59
206	SIMON BOLIVAR	60
207	ONCE DE ABRIL	60
208	VISTA AL SOL	60
209	CHIRICA	60
210	DALLA COSTA	60
211	CACHAMAY	60
212	UNIVERSIDAD	60
213	UNARE	60
214	YOCOIMA	60
215	POZO VERDE	60
216	CM. CAICARA DEL ORINOCO	61
217	ASCENSION FARRERAS	61
218	ALTAGRACIA	61
219	LA URBANA	61
220	GUANIAMO	61
221	PIJIGUAOS	61
222	CATEDRAL	62
223	AGUA SALADA	62
224	LA SABANITA	62
225	VISTA HERMOSA	62
226	MARHUANTA	62
227	JOSE ANTONIO PAEZ	62
228	ORINOCO	62
229	PANAPANA	62
230	ZEA	62
231	CM. UPATA	63
232	ANDRES ELOY BLANCO	63
233	PEDRO COVA	63
234	CM. GUASIPATI	64
235	SALOM	64
236	CM. MARIPA	65
237	ARIPAO	65
238	LAS MAJADAS	65
239	MOITACO	65
240	GUARATARO	65
241	CM. TUMEREMO	66
242	DALLA COSTA	66
243	SAN ISIDRO	66
244	CM. CIUDAD PIAR	67
245	SAN FRANCISCO	67
246	BARCELONETA	67
247	SANTA BARBARA	67
248	CM. SANTA ELENA DE UAIREN	68
249	IKABARU	68
250	CM. EL CALLAO	69
251	CM. EL PALMAR	70
252	BEJUMA	71
253	CANOABO	71
254	SIMON BOLIVAR	71
255	GUIGUE	72
256	BELEN	72
257	TACARIGUA	72
258	MARIARA	73
259	AGUAS CALIENTES	73
260	GUACARA	74
261	CIUDAD ALIANZA	74
262	YAGUA	74
263	MONTALBAN	75
264	MORON	76
265	URAMA	76
266	DEMOCRACIA	77
267	FRATERNIDAD	77
268	GOAIGOAZA	77
269	JUAN JOSE FLORES	77
270	BARTOLOME SALOM	77
271	UNION	77
272	BORBURATA	77
273	PATANEMO	77
274	SAN JOAQUIN	78
275	CANDELARIA	79
276	CATEDRAL	79
277	EL SOCORRO	79
278	MIGUEL PEÑA	79
279	SAN BLAS	79
280	SAN JOSE	79
281	SANTA ROSA	79
282	RAFAEL URDANETA	79
283	NEGRO PRIMERO	79
284	MIRANDA	80
285	U LOS GUAYOS	81
286	NAGUANAGUA	82
287	URB SAN DIEGO	83
288	U TOCUYITO	84
289	U INDEPENDENCIA	84
290	COJEDES	85
291	JUAN DE MATA SUAREZ	85
292	TINAQUILLO	86
293	EL BAUL	87
294	SUCRE	87
295	EL PAO	88
296	LIBERTAD DE COJEDES	89
297	EL AMPARO	89
298	SAN CARLOS DE AUSTRIA	90
299	JUAN ANGEL BRAVO	90
300	MANUEL MANRIQUE	90
301	GRL/JEFE JOSE L SILVA	91
302	MACAPO	92
303	LA AGUADITA	92
304	ROMULO GALLEGOS	93
305	SAN JUAN DE LOS CAYOS	94
306	CAPADARE	94
307	LA PASTORA	94
308	LIBERTADOR	94
309	SAN LUIS	95
310	ARACUA	95
311	LA PEÑA	95
312	CAPATARIDA	96
313	BOROJO	96
314	SEQUE	96
315	ZAZARIDA	96
316	BARIRO	96
317	GUAJIRO	96
318	NORTE	97
319	CARIRUBANA	97
320	PUNTA CARDON	97
321	SANTA ANA	97
322	LA VELA DE CORO	98
323	ACURIGUA	98
324	GUAIBACOA	98
325	MACORUCA	98
326	LAS CALDERAS	98
327	PEDREGAL	99
328	AGUA CLARA	99
329	AVARIA	99
330	PIEDRA GRANDE	99
331	PURURECHE	99
332	PUEBLO NUEVO	100
333	ADICORA	100
334	BARAIVED	100
335	BUENA VISTA	100
336	JADACAQUIVA	100
337	MORUY	100
338	EL VINCULO	100
339	EL HATO	100
340	ADAURE	100
341	CHURUGUARA	101
342	AGUA LARGA	101
343	INDEPENDENCIA	101
344	MAPARARI	101
345	EL PAUJI	101
346	MENE DE MAUROA	102
347	CASIGUA	102
348	SAN FELIX	102
349	SAN ANTONIO	103
350	SAN GABRIEL	103
351	SANTA ANA	103
352	GUZMAN GUILLERMO	103
353	MITARE	103
354	SABANETA	103
355	RIO SECO	103
356	CABURE	104
357	CURIMAGUA	104
358	COLINA	104
359	TUCACAS	105
360	BOCA DE AROA	105
361	PUERTO CUMAREBO	106
362	LA CIENAGA	106
363	LA SOLEDAD	106
364	PUEBLO CUMAREBO	106
365	ZAZARIDA	106
366	CM. DABAJURO	107
367	CHICHIRIVICHE	108
368	BOCA DE TOCUYO	108
369	TOCUYO DE LA COSTA	108
370	LOS TAQUES	109
371	JUDIBANA	109
372	PIRITU	110
373	SAN JOSE DE LA COSTA	110
374	STA.CRUZ DE BUCARAL	111
375	EL CHARAL	111
376	LAS VEGAS DEL TUY	111
377	CM. MIRIMIRE	112
378	JACURA	113
379	AGUA LINDA	113
380	ARAURIMA	113
381	CM. YARACAL	114
382	CM. PALMA SOLA	115
383	SUCRE	116
384	PECAYA	116
385	URUMACO	117
386	BRUZUAL	117
387	CM. TOCOPERO	118
388	VALLE DE LA PASCUA	119
389	ESPINO	119
390	EL SOMBRERO	120
391	SOSA	120
392	CALABOZO	121
393	EL CALVARIO	121
394	EL RASTRO	121
395	GUARDATINAJAS	121
396	ALTAGRACIA DE ORITUCO	122
397	LEZAMA	122
398	LIBERTAD DE ORITUCO	122
399	SAN FCO DE MACAIRA	122
400	SAN RAFAEL DE ORITUCO	122
401	SOUBLETTE	122
402	PASO REAL DE MACAIRA	122
403	TUCUPIDO	123
404	SAN RAFAEL DE LAYA	123
405	SAN JUAN DE LOS MORROS	124
406	PARAPARA	124
407	CANTAGALLO	124
408	ZARAZA	125
409	SAN JOSE DE UNARE	125
410	CAMAGUAN	126
411	PUERTO MIRANDA	126
412	UVERITO	126
413	SAN JOSE DE GUARIBE	127
414	LAS MERCEDES	128
415	STA RITA DE MANAPIRE	128
416	CABRUTA	128
417	EL SOCORRO	129
418	ORTIZ	130
419	SAN FCO. DE TIZNADOS	130
420	SAN JOSE DE TIZNADOS	130
421	S LORENZO DE TIZNADOS	130
422	SANTA MARIA DE IPIRE	131
423	ALTAMIRA	131
424	CHAGUARAMAS	132
425	GUAYABAL	133
426	CAZORLA	133
427	FREITEZ	134
428	JOSE MARIA BLANCO	134
429	CATEDRAL	135
430	LA CONCEPCION	135
431	SANTA ROSA	135
432	UNION	135
433	EL CUJI	135
434	TAMACA	135
435	JUAN DE VILLEGAS	135
436	AGUEDO F. ALVARADO	135
437	BUENA VISTA	135
438	JUAREZ	135
439	JUAN B RODRIGUEZ	136
440	DIEGO DE LOZADA	136
441	SAN MIGUEL	136
442	CUARA	136
443	PARAISO DE SAN JOSE	136
444	TINTORERO	136
445	JOSE BERNARDO DORANTE	136
446	CRNEL. MARIANO PERAZA	136
447	BOLIVAR	137
448	ANZOATEGUI	137
449	GUARICO	137
450	HUMOCARO ALTO	137
451	HUMOCARO BAJO	137
452	MORAN	137
453	HILARIO LUNA Y LUNA	137
454	LA CANDELARIA	137
455	CABUDARE	138
456	JOSE G. BASTIDAS	138
457	AGUA VIVA	138
458	TRINIDAD SAMUEL	139
459	ANTONIO DIAZ	139
460	CAMACARO	139
461	CASTAÑEDA	139
462	CHIQUINQUIRA	139
463	ESPINOZA LOS MONTEROS	139
464	LARA	139
465	MANUEL MORILLO	139
466	MONTES DE OCA	139
467	TORRES	139
468	EL BLANCO	139
469	MONTA A VERDE	139
470	HERIBERTO ARROYO	139
471	LAS MERCEDES	139
472	CECILIO ZUBILLAGA	139
473	REYES VARGAS	139
474	ALTAGRACIA	139
475	SIQUISIQUE	140
476	SAN MIGUEL	140
477	XAGUAS	140
478	MOROTURO	140
479	PIO TAMAYO	141
480	YACAMBU	141
481	QBDA. HONDA DE GUACHE	141
482	SARARE	142
483	GUSTAVO VEGAS LEON	142
484	BURIA	142
485	GABRIEL PICON G.	143
486	HECTOR AMABLE MORA	143
487	JOSE NUCETE SARDI	143
488	PULIDO MENDEZ	143
489	PTE. ROMULO GALLEGOS	143
490	PRESIDENTE BETANCOURT	143
491	PRESIDENTE PAEZ	143
492	CM. LA AZULITA	144
493	CM. CANAGUA	145
494	CAPURI	145
495	CHACANTA	145
496	EL MOLINO	145
497	GUAIMARAL	145
498	MUCUTUY	145
499	MUCUCHACHI	145
500	ACEQUIAS	146
501	JAJI	146
502	LA MESA	146
503	SAN JOSE	146
504	MONTALBAN	146
505	MATRIZ	146
506	FERNANDEZ PEÑA	146
507	CM. GUARAQUE	147
508	MESA DE QUINTERO	147
509	RIO NEGRO	147
510	CM. ARAPUEY	148
511	PALMIRA	148
512	CM. TORONDOY	149
513	SAN CRISTOBAL DE T	149
514	ARIAS	150
515	SAGRARIO	150
516	MILLA	150
517	EL LLANO	150
518	JUAN RODRIGUEZ SUAREZ	150
519	JACINTO PLAZA	150
520	DOMINGO PEÑA	150
521	GONZALO PICON FEBRES	150
522	OSUNA RODRIGUEZ	150
523	LASSO DE LA VEGA	150
524	CARACCIOLO PARRA P	150
525	MARIANO PICON SALAS	150
526	ANTONIO SPINETTI DINI	150
527	EL MORRO	150
528	LOS NEVADOS	150
529	CM. TABAY	151
530	CM. TIMOTES	152
531	ANDRES ELOY BLANCO	152
532	PIÑANGO	152
533	LA VENTA	152
534	CM. STA CRUZ DE MORA	153
535	MESA BOLIVAR	153
536	MESA DE LAS PALMAS	153
537	CM. STA ELENA DE ARENALES	154
538	ELOY PAREDES	154
539	PQ R DE ALCAZAR	154
540	CM. TUCANI	155
541	FLORENCIO RAMIREZ	155
542	CM. SANTO DOMINGO	156
543	LAS PIEDRAS	156
544	CM. PUEBLO LLANO	157
545	CM. MUCUCHIES	158
546	MUCURUBA	158
547	SAN RAFAEL	158
548	CACUTE	158
549	LA TOMA	158
550	CM. BAILADORES	159
551	GERONIMO MALDONADO	159
552	CM. LAGUNILLAS	160
553	CHIGUARA	160
554	ESTANQUES	160
555	SAN JUAN	160
556	PUEBLO NUEVO DEL SUR	160
557	LA TRAMPA	160
558	EL LLANO	161
559	TOVAR	161
560	EL AMPARO	161
561	SAN FRANCISCO	161
562	CM. NUEVA BOLIVIA	162
563	INDEPENDENCIA	162
564	MARIA C PALACIOS	162
565	SANTA APOLONIA	162
566	CM. STA MARIA DE CAPARO	163
567	CM. ARICAGUA	164
568	SAN ANTONIO	164
569	CM. ZEA	165
570	CAÑO EL TIGRE	165
571	CAUCAGUA	166
572	ARAGUITA	166
573	AREVALO GONZALEZ	166
574	CAPAYA	166
575	PANAQUIRE	166
576	RIBAS	166
577	EL CAFE	166
578	MARIZAPA	166
579	HIGUEROTE	167
580	CURIEPE	167
581	TACARIGUA	167
582	LOS TEQUES	168
583	CECILIO ACOSTA	168
584	PARACOTOS	168
585	SAN PEDRO	168
586	TACATA	168
587	EL JARILLO	168
588	ALTAGRACIA DE LA M	168
589	STA TERESA DEL TUY	169
590	EL CARTANAL	169
591	OCUMARE DEL TUY	170
592	LA DEMOCRACIA	170
593	SANTA BARBARA	170
594	RIO CHICO	171
595	EL GUAPO	171
596	TACARIGUA DE LA LAGUNA	171
597	PAPARO	171
598	SN FERNANDO DEL GUAPO	171
599	SANTA LUCIA	172
600	GUARENAS	173
601	PETARE	174
602	LEONCIO MARTINEZ	174
603	CAUCAGUITA	174
604	FILAS DE MARICHES	174
605	LA DOLORITA	174
606	CUA	175
607	NUEVA CUA	175
608	GUATIRE	176
609	BOLIVAR	176
610	CHARALLAVE	177
611	LAS BRISAS	177
612	SAN ANTONIO LOS ALTOS	178
613	SAN JOSE DE BARLOVENTO	179
614	CUMBO	179
615	SAN FCO DE YARE	180
616	S ANTONIO DE YARE	180
617	BARUTA	181
618	EL CAFETAL	181
619	LAS MINAS DE BARUTA	181
620	CARRIZAL	182
621	CHACAO	183
622	EL HATILLO	184
623	MAMPORAL	185
624	CUPIRA	186
625	MACHURUCUTO	186
626	CM. SAN ANTONIO	187
627	SAN FRANCISCO	187
628	CM. CARIPITO	188
629	CM. CARIPE	189
630	TERESEN	189
631	EL GUACHARO	189
632	SAN AGUSTIN	189
633	LA GUANOTA	189
634	SABANA DE PIEDRA	189
635	CM. CAICARA	190
636	AREO	190
637	SAN FELIX	190
638	VIENTO FRESCO	190
639	CM. PUNTA DE MATA	191
640	EL TEJERO	191
641	CM. TEMBLADOR	192
642	TABASCA	192
643	LAS ALHUACAS	192
644	CHAGUARAMAS	192
645	EL FURRIAL	193
646	JUSEPIN	193
647	EL COROZO	193
648	SAN VICENTE	193
649	LA PICA	193
650	ALTO DE LOS GODOS	193
651	BOQUERON	193
652	LAS COCUIZAS	193
653	SANTA CRUZ	193
654	SAN SIMON	193
655	CM. ARAGUA	194
656	CHAGUARAMAL	194
657	GUANAGUANA	194
658	APARICIO	194
659	TAGUAYA	194
660	EL PINTO	194
661	LA TOSCANA	194
662	CM. QUIRIQUIRE	195
663	CACHIPO	195
664	CM. BARRANCAS	196
665	LOS BARRANCOS DE FAJARDO	196
666	CM. AGUASAY	197
667	CM. SANTA BARBARA	198
668	CM. URACOA	199
669	CM. LA ASUNCION	200
670	CM. SAN JUAN BAUTISTA	201
671	ZABALA	201
672	CM. SANTA ANA	202
673	GUEVARA	202
674	MATASIETE	202
675	BOLIVAR	202
676	SUCRE	202
677	CM. PAMPATAR	203
678	AGUIRRE	203
679	CM. JUAN GRIEGO	204
680	ADRIAN	204
681	CM. PORLAMAR	205
682	CM. BOCA DEL RIO	206
683	SAN FRANCISCO	206
684	CM. SAN PEDRO DE COCHE	207
685	VICENTE FUENTES	207
686	CM. PUNTA DE PIEDRAS	208
687	LOS BARALES	208
688	CM.LA PLAZA DE PARAGUACHI	209
689	CM. VALLE ESP SANTO	210
690	FRANCISCO FAJARDO	210
691	CM. ARAURE	211
692	RIO ACARIGUA	211
693	CM. PIRITU	212
694	UVERAL	212
695	CM. GUANARE	213
696	CORDOBA	213
697	SAN JUAN GUANAGUANARE	213
698	VIRGEN DE LA COROMOTO	213
699	SAN JOSE DE LA MONTAÑA	213
700	CM. GUANARITO	214
701	TRINIDAD DE LA CAPILLA	214
702	DIVINA PASTORA	214
703	CM. OSPINO	215
704	APARICION	215
705	LA ESTACION	215
706	CM. ACARIGUA	216
707	PAYARA	216
708	PIMPINELA	216
709	RAMON PERAZA	216
710	CM. BISCUCUY	217
711	CONCEPCION	217
712	SAN RAFAEL PALO ALZADO	217
713	UVENCIO A VELASQUEZ	217
714	SAN JOSE DE SAGUAZ	217
715	VILLA ROSA	217
716	CM. VILLA BRUZUAL	218
717	CANELONES	218
718	SANTA CRUZ	218
719	SAN ISIDRO LABRADOR	218
720	CM. CHABASQUEN	219
721	PEÑA BLANCA	219
722	CM. AGUA BLANCA	220
723	CM. PAPELON	221
724	CAÑO DELGADITO	221
725	CM. BOCONOITO	222
726	ANTOLIN TOVAR AQUINO	222
727	CM. SAN RAFAEL DE ONOTO	223
728	SANTA FE	223
729	THERMO MORLES	223
730	CM. EL PLAYON	224
731	FLORIDA	224
732	RIO CARIBE	225
733	SAN JUAN GALDONAS	225
734	PUERTO SANTO	225
735	EL MORRO DE PTO SANTO	225
736	ANTONIO JOSE DE SUCRE	225
737	EL PILAR	226
738	EL RINCON	226
739	GUARAUNOS	226
740	TUNAPUICITO	226
741	UNION	226
742	GRAL FCO. A VASQUEZ	226
743	SANTA CATALINA	227
744	SANTA ROSA	227
745	SANTA TERESA	227
746	BOLIVAR	227
747	MACARAPANA	227
748	YAGUARAPARO	228
749	LIBERTAD	228
750	PAUJIL	228
751	IRAPA	229
752	CAMPO CLARO	229
753	SORO	229
754	SAN ANTONIO DE IRAPA	229
755	MARABAL	229
756	CM. SAN ANT DEL GOLFO	230
757	CUMANACOA	231
758	ARENAS	231
759	ARICAGUA	231
760	COCOLLAR	231
761	SAN FERNANDO	231
762	SAN LORENZO	231
763	CARIACO	232
764	CATUARO	232
765	RENDON	232
766	SANTA CRUZ	232
767	SANTA MARIA	232
768	ALTAGRACIA	233
769	AYACUCHO	233
770	SANTA INES	233
771	VALENTIN VALIENTE	233
772	SAN JUAN	233
773	GRAN MARISCAL	233
774	RAUL LEONI	233
775	GUIRIA	234
776	CRISTOBAL COLON	234
777	PUNTA DE PIEDRA	234
778	BIDEAU	234
779	MARIÑO	235
780	ROMULO GALLEGOS	235
781	TUNAPUY	236
782	CAMPO ELIAS	236
783	SAN JOSE DE AREOCUAR	237
784	TAVERA ACOSTA	237
785	CM. MARIGUITAR	238
786	ARAYA	239
787	MANICUARE	239
788	CHACOPATA	239
789	CM. COLON	240
790	RIVAS BERTI	240
791	SAN PEDRO DEL RIO	240
792	CM. SAN ANT DEL TACHIRA	241
793	PALOTAL	241
794	JUAN VICENTE GOMEZ	241
795	ISAIAS MEDINA ANGARIT	241
796	CM. CAPACHO NUEVO	242
797	JUAN GERMAN ROSCIO	242
798	ROMAN CARDENAS	242
799	CM. TARIBA	243
800	LA FLORIDA	243
801	AMENODORO RANGEL LAMU	243
802	CM. LA GRITA	244
803	EMILIO C. GUERRERO	244
804	MONS. MIGUEL A SALAS	244
805	CM. RUBIO	245
806	BRAMON	245
807	LA PETROLEA	245
808	QUINIMARI	245
809	CM. LOBATERA	246
810	CONSTITUCION	246
811	LA CONCORDIA	247
812	PEDRO MARIA MORANTES	247
813	SN JUAN BAUTISTA	247
814	SAN SEBASTIAN	247
815	DR. FCO. ROMERO LOBO	247
816	CM. PREGONERO	248
817	CARDENAS	248
818	POTOSI	248
819	JUAN PABLO PEÑALOZA	248
820	CM. STA. ANA  DEL TACHIRA	249
821	CM. LA FRIA	250
822	BOCA DE GRITA	250
823	JOSE ANTONIO PAEZ	250
824	CM. PALMIRA	251
825	CM. MICHELENA	252
826	CM. ABEJALES	253
827	SAN JOAQUIN DE NAVAY	253
828	DORADAS	253
829	EMETERIO OCHOA	253
830	CM. COLONCITO	254
831	LA PALMITA	254
832	CM. UREÑA	255
833	NUEVA ARCADIA	255
834	CM. QUENIQUEA	256
835	SAN PABLO	256
836	ELEAZAR LOPEZ CONTRERA	256
837	CM. CORDERO	257
838	CM.SAN RAFAEL DEL PINAL	258
839	SANTO DOMINGO	258
840	ALBERTO ADRIANI	258
841	CM. CAPACHO VIEJO	259
842	CIPRIANO CASTRO	259
843	MANUEL FELIPE RUGELES	259
844	CM. LA TENDIDA	260
845	BOCONO	260
846	HERNANDEZ	260
847	CM. SEBORUCO	261
848	CM. LAS MESAS	262
849	CM. SAN JOSE DE BOLIVAR	263
850	CM. EL COBRE	264
851	CM. DELICIAS	265
852	CM. SAN SIMON	266
853	CM. SAN JOSECITO	267
854	CM. UMUQUENA	268
855	BETIJOQUE	269
856	JOSE G HERNANDEZ	269
857	LA PUEBLITA	269
858	EL CEDRO	269
859	BOCONO	270
860	EL CARMEN	270
861	MOSQUEY	270
862	AYACUCHO	270
863	BURBUSAY	270
864	GENERAL RIVAS	270
865	MONSEÑOR JAUREGUI	270
866	RAFAEL RANGEL	270
867	SAN JOSE	270
868	SAN MIGUEL	270
869	GUARAMACAL	270
870	LA VEGA DE GUARAMACAL	270
871	CARACHE	271
872	LA CONCEPCION	271
873	CUICAS	271
874	PANAMERICANA	271
875	SANTA CRUZ	271
876	ESCUQUE	272
877	SABANA LIBRE	272
878	LA UNION	272
879	SANTA RITA	272
880	CRISTOBAL MENDOZA	273
881	CHIQUINQUIRA	273
882	MATRIZ	273
883	MONSEÑOR CARRILLO	273
884	CRUZ CARRILLO	273
885	ANDRES LINARES	273
886	TRES ESQUINAS	273
887	LA QUEBRADA	274
888	JAJO	274
889	LA MESA	274
890	SANTIAGO	274
891	CABIMBU	274
892	TUÑAME	274
893	MERCEDES DIAZ	275
894	JUAN IGNACIO MONTILLA	275
895	LA BEATRIZ	275
896	MENDOZA	275
897	LA PUERTA	275
898	SAN LUIS	275
899	CHEJENDE	276
900	CARRILLO	276
901	CEGARRA	276
902	BOLIVIA	276
903	MANUEL SALVADOR ULLOA	276
904	SAN JOSE	276
905	ARNOLDO GABALDON	276
906	EL DIVIDIVE	277
907	AGUA CALIENTE	277
908	EL CENIZO	277
909	AGUA SANTA	277
910	VALERITA	277
911	MONTE CARMELO	278
912	BUENA VISTA	278
913	STA MARIA DEL HORCON	278
914	MOTATAN	279
915	EL BAÑO	279
916	JALISCO	279
917	PAMPAN	280
918	SANTA ANA	280
919	LA PAZ	280
920	FLOR DE PATRIA	280
921	CARVAJAL	281
922	ANTONIO N BRICEÑO	281
923	CAMPO ALEGRE	281
924	JOSE LEONARDO SUAREZ	281
925	SABANA DE MENDOZA	282
926	JUNIN	282
927	VALMORE RODRIGUEZ	282
928	EL PARAISO	282
929	SANTA ISABEL	283
930	ARAGUANEY	283
931	EL JAGUITO	283
932	LA ESPERANZA	283
933	SABANA GRANDE	284
934	CHEREGUE	284
935	GRANADOS	284
936	EL SOCORRO	285
937	LOS CAPRICHOS	285
938	ANTONIO JOSE DE SUCRE	285
939	CAMPO ELIAS	286
940	ARNOLDO GABALDON	286
941	SANTA APOLONIA	287
942	LA CEIBA	287
943	EL PROGRESO	287
944	TRES DE FEBRERO	287
945	PAMPANITO	288
946	PAMPANITO II	288
947	LA CONCEPCION	288
948	CM. AROA	289
949	CM. CHIVACOA	290
950	CAMPO ELIAS	290
951	CM. NIRGUA	291
952	SALOM	291
953	TEMERLA	291
954	CM. SAN FELIPE	292
955	ALBARICO	292
956	SAN JAVIER	292
957	CM. GUAMA	293
958	CM. URACHICHE	294
959	CM. YARITAGUA	295
960	SAN ANDRES	295
961	CM. SABANA DE PARRA	296
962	CM. BORAURE	297
963	CM. COCOROTE	298
964	CM. INDEPENDENCIA	299
965	CM. SAN PABLO	300
966	CM. YUMARE	301
967	CM. FARRIAR	302
968	EL GUAYABO	302
969	GENERAL URDANETA	303
970	LIBERTADOR	303
971	MANUEL GUANIPA MATOS	303
972	MARCELINO BRICEÑO	303
973	SAN TIMOTEO	303
974	PUEBLO NUEVO	303
975	PEDRO LUCAS URRIBARRI	304
976	SANTA RITA	304
977	JOSE CENOVIO URRIBARR	304
978	EL MENE	304
979	SANTA CRUZ DEL ZULIA	305
980	URRIBARRI	305
981	MORALITO	305
982	SAN CARLOS DEL ZULIA	305
983	SANTA BARBARA	305
984	LUIS DE VICENTE	306
985	RICAURTE	306
986	MONS.MARCOS SERGIO G	306
987	SAN RAFAEL	306
988	LAS PARCELAS	306
989	TAMARE	306
990	LA SIERRITA	306
991	BOLIVAR	307
992	COQUIVACOA	307
993	CRISTO DE ARANZA	307
994	CHIQUINQUIRA	307
995	SANTA LUCIA	307
996	OLEGARIO VILLALOBOS	307
997	JUANA DE AVILA	307
998	CARACCIOLO PARRA PEREZ	307
999	IDELFONZO VASQUEZ	307
1000	CACIQUE MARA	307
1001	CECILIO ACOSTA	307
1002	RAUL LEONI	307
1003	FRANCISCO EUGENIO B	307
1004	MANUEL DAGNINO	307
1005	LUIS HURTADO HIGUERA	307
1006	VENANCIO PULGAR	307
1007	ANTONIO BORJAS ROMERO	307
1008	SAN ISIDRO	307
1009	FARIA	308
1010	SAN ANTONIO	308
1011	ANA MARIA CAMPOS	308
1012	SAN JOSE	308
1013	ALTAGRACIA	308
1014	GOAJIRA	309
1015	ELIAS SANCHEZ RUBIO	309
1016	SINAMAICA	309
1017	ALTA GUAJIRA	309
1018	SAN JOSE DE PERIJA	310
1019	BARTOLOME DE LAS CASAS	310
1020	LIBERTAD	310
1021	RIO NEGRO	310
1022	GIBRALTAR	311
1023	HERAS	311
1024	M.ARTURO CELESTINO A	311
1025	ROMULO GALLEGOS	311
1026	BOBURES	311
1027	EL BATEY	311
1028	ANDRES BELLO (KM 48)	312
1029	POTRERITOS	312
1030	EL CARMELO	312
1031	CHIQUINQUIRA	312
1032	CONCEPCION	312
1033	ELEAZAR LOPEZ C	313
1034	ALONSO DE OJEDA	313
1035	VENEZUELA	313
1036	CAMPO LARA	313
1037	LIBERTAD	313
1038	UDON PEREZ	314
1039	ENCONTRADOS	314
1040	DONALDO GARCIA	315
1041	SIXTO ZAMBRANO	315
1042	EL ROSARIO	315
1043	AMBROSIO	316
1044	GERMAN RIOS LINARES	316
1045	JORGE HERNANDEZ	316
1046	LA ROSA	316
1047	PUNTA GORDA	316
1048	CARMEN HERRERA	316
1049	SAN BENITO	316
1050	ROMULO BETANCOURT	316
1051	ARISTIDES CALVANI	316
1052	RAUL CUENCA	317
1053	LA VICTORIA	317
1054	RAFAEL URDANETA	317
1055	JOSE RAMON YEPEZ	318
1056	LA CONCEPCION	318
1057	SAN JOSE	318
1058	MARIANO PARRA LEON	318
1059	MONAGAS	319
1060	ISLA DE TOAS	319
1061	MARCIAL HERNANDEZ	320
1062	FRANCISCO OCHOA	320
1063	SAN FRANCISCO	320
1064	EL BAJO	320
1065	DOMITILA FLORES	320
1066	LOS CORTIJOS	320
1067	BARI	321
1068	JESUS M SEMPRUN	321
1069	SIMON RODRIGUEZ	322
1070	CARLOS QUEVEDO	322
1071	FRANCISCO J PULGAR	322
1072	RAFAEL MARIA BARALT	323
1073	MANUEL MANRIQUE	323
1074	RAFAEL URDANETA	323
1075	FERNANDO GIRON TOVAR	324
1076	LUIS ALBERTO GOMEZ	324
1077	PARHUEÑA	324
1078	PLATANILLAL	324
1079	CM. SAN FERNANDO DE ATABA	325
1080	UCATA	325
1081	YAPACANA	325
1082	CANAME	325
1083	CM. MAROA	326
1084	VICTORINO	326
1085	COMUNIDAD	326
1086	CM. SAN CARLOS DE RIO NEG	327
1087	SOLANO	327
1088	COCUY	327
1089	CM. ISLA DE RATON	328
1090	SAMARIAPO	328
1091	SIPAPO	328
1092	MUNDUAPO	328
1093	GUAYAPO	328
1094	CM. SAN JUAN DE MANAPIARE	329
1095	ALTO VENTUARI	329
1096	MEDIO VENTUARI	329
1097	BAJO VENTUARI	329
1098	CM. LA ESMERALDA	330
1099	HUACHAMACARE	330
1100	MARAWAKA	330
1101	MAVACA	330
1102	SIERRA PARIMA	330
1103	SAN JOSE	331
1104	VIRGEN DEL VALLE	331
1105	SAN RAFAEL	331
1106	JOSE VIDAL MARCANO	331
1107	LEONARDO RUIZ PINEDA	331
1108	MONS. ARGIMIRO GARCIA	331
1109	MCL.ANTONIO J DE SUCRE	331
1110	JUAN MILLAN	331
1111	PEDERNALES	332
1112	LUIS B PRIETO FIGUERO	332
1113	CURIAPO	333
1114	SANTOS DE ABELGAS	333
1115	MANUEL RENAUD	333
1116	PADRE BARRAL	333
1117	ANICETO LUGO	333
1118	ALMIRANTE LUIS BRION	333
1119	IMATACA	334
1120	ROMULO GALLEGOS	334
1121	JUAN BAUTISTA ARISMEN	334
1122	MANUEL PIAR	334
1123	5 DE JULIO	334
1124	CARABALLEDA	335
1125	CARAYACA	335
1126	CARUAO	335
1127	CATIA LA MAR	335
1128	LA GUAIRA	335
1129	MACUTO	335
1130	MAIQUETIA	335
1131	NAIGUATA	335
1132	EL JUNKO	335
1133	PQ RAUL LEONI	335
1134	PQ CARLOS SOUBLETTE	335
\.


--
-- Name: parroquia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('parroquia_id_seq', 1135, false);


--
-- Data for Name: pruebas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pruebas (id_pruebas, tipo_prueba, codigo_notificacion, numero_lamina_pdrm, tipo_busqueda, especie_plasmodium, fecha_inicio_fiebre, fecha_toma_lamina, lugar_toma_lamina, parroquia_id) FROM stdin;
1	1	12	12	2	1	2018-10-10	2018-10-10	zulia	34
2	1	14	36	1	25	2018-10-09	2018-10-20	laboratorio	34
3	1	41	36	1	52	2018-10-23	2018-10-25	vddvd	34
4	1	41	41	2	52	2018-10-17	2018-10-22	bbbb	34
5	2	21	54	1	32	2018-10-24	2018-10-25	fdsfds	34
6	1	12	43	2	43	2018-10-24	2018-10-25	hgdg	34
7	2	21	54	1	32	2018-10-24	2018-10-25	fdsfds	34
8	2	44	88	1	55	2018-10-23	2018-10-23	dsadas	34
9	2	21	54	1	32	2018-10-24	2018-10-25	fdsfds	34
10	1	44	88	2	22	2018-10-23	2018-10-24	fgdgfd	34
11	1	44	88	2	22	2018-10-23	2018-10-24	fgdgfd	34
12	1	44	88	2	22	2018-10-23	2018-10-24	fgdgfd	34
13	1	41	52	1	1	2018-10-22	2018-10-25		34
14	2	85	63	2	2	2018-10-29	2018-10-30	laboratorio	34
15	1	41	52	1	2	2018-11-01	2018-11-07	laboratorio	34
16	1	41	52	1	1	2018-11-05	2018-11-07	laboratorio	34
17	1	41	52	1	1	2018-11-24	2018-11-24	laboratorio	34
18	2	41	63	2	Mixto	2018-11-20	2018-11-21	laboratorio	34
19	1	74	96	1	2	2018-11-18	2018-11-18	laboratorio	34
20	1	52	63	1	2	2018-11-25	2018-11-25	laboratorio	34
\.


--
-- Name: pruebas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pruebas_id_seq', 20, true);


--
-- Data for Name: recaida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY recaida (id_recaida, descripcion) FROM stdin;
\.


--
-- Name: recaida_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('recaida_id_seq', 1, false);


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY rol (id_rol, descripcion) FROM stdin;
1	administrador
2	secretaria
\.


--
-- Name: rol_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('rol_id_seq', 4, true);


--
-- Data for Name: tratamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tratamiento (id_tratamiento, nombre, cantidad, fecha_suministrado) FROM stdin;
1	Cloroquina	1	2018-10-25
2	Cloroquina	1	2018-10-25
3	Cloroquina	1	2018-10-25
4	Cloroquina	1	2018-10-25
5	Cloroquina	1	2018-10-24
6	Primaquina 15mg	2	2018-11-07
7	Quinina Amp	3	2018-11-07
8	Cloroquina	1	2018-11-10
9	Cloroquina	1	2018-11-10
10	Cloroquina	1	2018-11-10
11	Cloroquina	1	2018-11-10
12	Cloroquina	1	2018-11-10
13	Primaquina	2	2018-11-24
14	Primaquina	2	2018-11-24
15	Artemether + Lumenfartin	3	2018-11-24
\.


--
-- Name: tratamiento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tratamiento_id_seq', 15, true);


--
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_id_seq', 19, true);


--
-- Data for Name: usuario_sistema; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario_sistema (id_usuario_sistema, usuario_sistema, clave, nombre, apellido, cedula, id_rol, telefono_usuario, email_usuario, fecha_creado) FROM stdin;
2	felipe7	123456	Felipe	Cordero	20237607	1	04125231306	felipe@g.com	2018-10-11
1	erly	123456	erly	heredia	23807560	1	04245690971	erly@g.com	2018-11-10
5	rosa	123456	rosa	perez	17784713	2	04147418596	rosaf@g.com	2018-11-10
15						\N			\N
16						\N			\N
18						\N			\N
19						\N			\N
\.


--
-- Name: caso caso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY caso
    ADD CONSTRAINT caso_pkey PRIMARY KEY (id_caso);


--
-- Name: caso_recaida caso_recaida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY caso_recaida
    ADD CONSTRAINT caso_recaida_pkey PRIMARY KEY (id_caso_recaida);


--
-- Name: descripcion descripcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY descripcion
    ADD CONSTRAINT descripcion_pkey PRIMARY KEY (id_descripcion);


--
-- Name: estado estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (id_estado);


--
-- Name: municipio municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (id_municipio);


--
-- Name: paciente_caso paciente_caso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_caso
    ADD CONSTRAINT paciente_caso_pkey PRIMARY KEY (id);


--
-- Name: paciente paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT paciente_pkey PRIMARY KEY (id_paciente);


--
-- Name: paciente_pruebas paciente_pruebas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_pruebas
    ADD CONSTRAINT paciente_pruebas_pkey PRIMARY KEY (id_paciente_pruebas);


--
-- Name: paciente_tratamiento paciente_tratamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_tratamiento
    ADD CONSTRAINT paciente_tratamiento_pkey PRIMARY KEY (id_paciente_tratamiento);


--
-- Name: pais pais_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pais
    ADD CONSTRAINT pais_pkey PRIMARY KEY (id);


--
-- Name: parroquia parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parroquia
    ADD CONSTRAINT parroquia_pkey PRIMARY KEY (id_parroquia);


--
-- Name: pruebas pruebas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pruebas
    ADD CONSTRAINT pruebas_pkey PRIMARY KEY (id_pruebas);


--
-- Name: recaida recaida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY recaida
    ADD CONSTRAINT recaida_pkey PRIMARY KEY (id_recaida);


--
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (id_rol);


--
-- Name: tratamiento tratamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tratamiento
    ADD CONSTRAINT tratamiento_pkey PRIMARY KEY (id_tratamiento);


--
-- Name: usuario_sistema usuario_sistema_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario_sistema
    ADD CONSTRAINT usuario_sistema_pkey PRIMARY KEY (id_usuario_sistema);


--
-- Name: caso_recaida caso_recaida_id_caso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY caso_recaida
    ADD CONSTRAINT caso_recaida_id_caso_fkey FOREIGN KEY (id_caso) REFERENCES caso(id_caso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: caso_recaida caso_recaida_id_recaida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY caso_recaida
    ADD CONSTRAINT caso_recaida_id_recaida_fkey FOREIGN KEY (id_recaida) REFERENCES recaida(id_recaida) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: estado estado_pais_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY estado
    ADD CONSTRAINT estado_pais_id_fkey FOREIGN KEY (pais_id) REFERENCES pais(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_pruebas fkcaso; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_pruebas
    ADD CONSTRAINT fkcaso FOREIGN KEY (id_caso) REFERENCES caso(id_caso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_caso id_casofk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_caso
    ADD CONSTRAINT id_casofk FOREIGN KEY (id_caso) REFERENCES caso(id_caso) ON UPDATE CASCADE;


--
-- Name: paciente id_descripcion; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT id_descripcion FOREIGN KEY (id_descripcion) REFERENCES descripcion(id_descripcion) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_caso id_pacientefk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_caso
    ADD CONSTRAINT id_pacientefk FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente) ON UPDATE CASCADE;


--
-- Name: municipio municipio_estado_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT municipio_estado_id_fkey FOREIGN KEY (estado_id) REFERENCES estado(id_estado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_pruebas paciente_pruebas_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_pruebas
    ADD CONSTRAINT paciente_pruebas_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_pruebas paciente_pruebas_id_pruebas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_pruebas
    ADD CONSTRAINT paciente_pruebas_id_pruebas_fkey FOREIGN KEY (id_pruebas) REFERENCES pruebas(id_pruebas) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_tratamiento paciente_tratamiento_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_tratamiento
    ADD CONSTRAINT paciente_tratamiento_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_tratamiento paciente_tratamiento_id_tratamiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente_tratamiento
    ADD CONSTRAINT paciente_tratamiento_id_tratamiento_fkey FOREIGN KEY (id_tratamiento) REFERENCES tratamiento(id_tratamiento) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: parroquia parroquia_municipio_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parroquia
    ADD CONSTRAINT parroquia_municipio_id_fkey FOREIGN KEY (municipio_id) REFERENCES municipio(id_municipio) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: pruebas parroquia_pruebafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pruebas
    ADD CONSTRAINT parroquia_pruebafk FOREIGN KEY (parroquia_id) REFERENCES parroquia(id_parroquia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente parroquiafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT parroquiafk FOREIGN KEY (id_parroquia) REFERENCES parroquia(id_parroquia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: caso parroquiafk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY caso
    ADD CONSTRAINT parroquiafk FOREIGN KEY (origen_parroquia) REFERENCES parroquia(id_parroquia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuario_sistema usuario_sistema_id_rol_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario_sistema
    ADD CONSTRAINT usuario_sistema_id_rol_fkey FOREIGN KEY (id_rol) REFERENCES rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente usuariofk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT usuariofk FOREIGN KEY (id_usuario_sistema) REFERENCES usuario_sistema(id_usuario_sistema) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

