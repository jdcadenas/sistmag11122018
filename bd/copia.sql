--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4
-- Dumped by pg_dump version 10.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
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


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: caso; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.caso (
    id_caso integer NOT NULL,
    fecha date,
    numero_caso integer,
    origen character varying(50),
    modo_infeccion character varying,
    muerte character varying(2),
    recaida character varying(2),
    id_paciente integer
);


ALTER TABLE public.caso OWNER TO postgres;

--
-- Name: caso_id_caso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.caso_id_caso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.caso_id_caso_seq OWNER TO postgres;

--
-- Name: caso_id_caso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.caso_id_caso_seq OWNED BY public.caso.id_caso;


--
-- Name: caso_recaida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.caso_recaida (
    id_caso_recaida integer NOT NULL,
    id_caso integer,
    id_recaida integer
);


ALTER TABLE public.caso_recaida OWNER TO postgres;

--
-- Name: caso_recaida_id_caso_recaida_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.caso_recaida_id_caso_recaida_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.caso_recaida_id_caso_recaida_seq OWNER TO postgres;

--
-- Name: caso_recaida_id_caso_recaida_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.caso_recaida_id_caso_recaida_seq OWNED BY public.caso_recaida.id_caso_recaida;


--
-- Name: descripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.descripcion (
    id_descripcion integer NOT NULL,
    peso integer,
    embarazada character varying(2),
    madre_lactante character varying(2),
    lactante character varying(2)
);


ALTER TABLE public.descripcion OWNER TO postgres;

--
-- Name: descripcion_id_descripcion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.descripcion_id_descripcion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.descripcion_id_descripcion_seq OWNER TO postgres;

--
-- Name: descripcion_id_descripcion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.descripcion_id_descripcion_seq OWNED BY public.descripcion.id_descripcion;


--
-- Name: estado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estado (
    id_estado integer NOT NULL,
    estado character varying(20)
);


ALTER TABLE public.estado OWNER TO postgres;

--
-- Name: estado_id_estado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estado_id_estado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estado_id_estado_seq OWNER TO postgres;

--
-- Name: estado_id_estado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estado_id_estado_seq OWNED BY public.estado.id_estado;


--
-- Name: municipio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.municipio (
    id_municipio integer NOT NULL,
    municipio character varying(20)
);


ALTER TABLE public.municipio OWNER TO postgres;

--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.municipio_id_municipio_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.municipio_id_municipio_seq OWNER TO postgres;

--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.municipio_id_municipio_seq OWNED BY public.municipio.id_municipio;


--
-- Name: paciente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paciente (
    id_paciente integer NOT NULL,
    numero_paciente integer,
    nombre_paciente character varying(20),
    apellido_paciente character varying(20),
    cedula_paciente character varying(10),
    nacionalidad_paciente character varying(15),
    fecha_nacimiento date,
    direccion_paciente character varying(60),
    sexo_paciente character varying(10),
    telefono_paciente integer,
    etnia_paciente character varying(20),
    id_municipio integer,
    id_parroquia integer,
    id_estado integer,
    id_usuario_sistema integer
);


ALTER TABLE public.paciente OWNER TO postgres;

--
-- Name: paciente_descripcion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paciente_descripcion (
    id_paciente_descripcion integer NOT NULL,
    id_paciente integer,
    id_descripcion integer
);


ALTER TABLE public.paciente_descripcion OWNER TO postgres;

--
-- Name: paciente_descripcion_id_paciente_descripcion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.paciente_descripcion_id_paciente_descripcion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paciente_descripcion_id_paciente_descripcion_seq OWNER TO postgres;

--
-- Name: paciente_descripcion_id_paciente_descripcion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.paciente_descripcion_id_paciente_descripcion_seq OWNED BY public.paciente_descripcion.id_paciente_descripcion;


--
-- Name: paciente_id_paciente_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.paciente_id_paciente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paciente_id_paciente_seq OWNER TO postgres;

--
-- Name: paciente_id_paciente_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.paciente_id_paciente_seq OWNED BY public.paciente.id_paciente;


--
-- Name: paciente_pruebas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paciente_pruebas (
    id_paciente_pruebas integer NOT NULL,
    id_paciente integer,
    id_pruebas integer
);


ALTER TABLE public.paciente_pruebas OWNER TO postgres;

--
-- Name: paciente_pruebas_id_paciente_pruebas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.paciente_pruebas_id_paciente_pruebas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paciente_pruebas_id_paciente_pruebas_seq OWNER TO postgres;

--
-- Name: paciente_pruebas_id_paciente_pruebas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.paciente_pruebas_id_paciente_pruebas_seq OWNED BY public.paciente_pruebas.id_paciente_pruebas;


--
-- Name: paciente_tratamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paciente_tratamiento (
    id_paciente_tratamiento integer NOT NULL,
    id_paciente integer,
    id_tratamiento integer
);


ALTER TABLE public.paciente_tratamiento OWNER TO postgres;

--
-- Name: paciente_tratamiento_id_paciente_tratamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.paciente_tratamiento_id_paciente_tratamiento_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.paciente_tratamiento_id_paciente_tratamiento_seq OWNER TO postgres;

--
-- Name: paciente_tratamiento_id_paciente_tratamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.paciente_tratamiento_id_paciente_tratamiento_seq OWNED BY public.paciente_tratamiento.id_paciente_tratamiento;


--
-- Name: parroquia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parroquia (
    id_parroquia integer NOT NULL,
    parroquia character varying(20)
);


ALTER TABLE public.parroquia OWNER TO postgres;

--
-- Name: parroquia_id_parroquia_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.parroquia_id_parroquia_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parroquia_id_parroquia_seq OWNER TO postgres;

--
-- Name: parroquia_id_parroquia_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.parroquia_id_parroquia_seq OWNED BY public.parroquia.id_parroquia;


--
-- Name: pruebas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pruebas (
    id_pruebas integer NOT NULL,
    tipo_prueba character varying(15),
    codigo_notificacion integer,
    numero_lamina_pdrm integer,
    tipo_busqueda character varying(6),
    especie_plasmodium character varying(10),
    fecha_inicio_fiebre date,
    fecha_toma_lamina date,
    lugar character varying(20),
    direccion_toma_lamina character varying(50)
);


ALTER TABLE public.pruebas OWNER TO postgres;

--
-- Name: pruebas_id_pruebas_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pruebas_id_pruebas_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pruebas_id_pruebas_seq OWNER TO postgres;

--
-- Name: pruebas_id_pruebas_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pruebas_id_pruebas_seq OWNED BY public.pruebas.id_pruebas;


--
-- Name: recaida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.recaida (
    id_recaida integer NOT NULL,
    descripcion character varying(50)
);


ALTER TABLE public.recaida OWNER TO postgres;

--
-- Name: recaida_id_recaida_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.recaida_id_recaida_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recaida_id_recaida_seq OWNER TO postgres;

--
-- Name: recaida_id_recaida_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recaida_id_recaida_seq OWNED BY public.recaida.id_recaida;


--
-- Name: rol; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rol (
    id_rol integer NOT NULL,
    descripcion character varying(15)
);


ALTER TABLE public.rol OWNER TO postgres;

--
-- Name: rol_id_rol_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rol_id_rol_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rol_id_rol_seq OWNER TO postgres;

--
-- Name: rol_id_rol_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rol_id_rol_seq OWNED BY public.rol.id_rol;


--
-- Name: tratamiento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tratamiento (
    id_tratamiento integer NOT NULL,
    nombre character varying(30),
    cantidad integer,
    fecha_suministrado date
);


ALTER TABLE public.tratamiento OWNER TO postgres;

--
-- Name: tratamiento_id_tratamiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tratamiento_id_tratamiento_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tratamiento_id_tratamiento_seq OWNER TO postgres;

--
-- Name: tratamiento_id_tratamiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tratamiento_id_tratamiento_seq OWNED BY public.tratamiento.id_tratamiento;


--
-- Name: usuario_sistema; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario_sistema (
    id_usuario_sistema integer NOT NULL,
    usuario_sistema character varying(20),
    clave character varying(15),
    nombre character varying(15),
    apellido character varying(15),
    cedula character varying(10),
    id_rol integer
);


ALTER TABLE public.usuario_sistema OWNER TO postgres;

--
-- Name: usuario_sistema_id_usuario_sistema_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_sistema_id_usuario_sistema_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_sistema_id_usuario_sistema_seq OWNER TO postgres;

--
-- Name: usuario_sistema_id_usuario_sistema_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_sistema_id_usuario_sistema_seq OWNED BY public.usuario_sistema.id_usuario_sistema;


--
-- Name: caso id_caso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso ALTER COLUMN id_caso SET DEFAULT nextval('public.caso_id_caso_seq'::regclass);


--
-- Name: caso_recaida id_caso_recaida; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso_recaida ALTER COLUMN id_caso_recaida SET DEFAULT nextval('public.caso_recaida_id_caso_recaida_seq'::regclass);


--
-- Name: descripcion id_descripcion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.descripcion ALTER COLUMN id_descripcion SET DEFAULT nextval('public.descripcion_id_descripcion_seq'::regclass);


--
-- Name: estado id_estado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado ALTER COLUMN id_estado SET DEFAULT nextval('public.estado_id_estado_seq'::regclass);


--
-- Name: municipio id_municipio; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipio ALTER COLUMN id_municipio SET DEFAULT nextval('public.municipio_id_municipio_seq'::regclass);


--
-- Name: paciente id_paciente; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente ALTER COLUMN id_paciente SET DEFAULT nextval('public.paciente_id_paciente_seq'::regclass);


--
-- Name: paciente_descripcion id_paciente_descripcion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_descripcion ALTER COLUMN id_paciente_descripcion SET DEFAULT nextval('public.paciente_descripcion_id_paciente_descripcion_seq'::regclass);


--
-- Name: paciente_pruebas id_paciente_pruebas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_pruebas ALTER COLUMN id_paciente_pruebas SET DEFAULT nextval('public.paciente_pruebas_id_paciente_pruebas_seq'::regclass);


--
-- Name: paciente_tratamiento id_paciente_tratamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_tratamiento ALTER COLUMN id_paciente_tratamiento SET DEFAULT nextval('public.paciente_tratamiento_id_paciente_tratamiento_seq'::regclass);


--
-- Name: parroquia id_parroquia; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquia ALTER COLUMN id_parroquia SET DEFAULT nextval('public.parroquia_id_parroquia_seq'::regclass);


--
-- Name: pruebas id_pruebas; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pruebas ALTER COLUMN id_pruebas SET DEFAULT nextval('public.pruebas_id_pruebas_seq'::regclass);


--
-- Name: recaida id_recaida; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recaida ALTER COLUMN id_recaida SET DEFAULT nextval('public.recaida_id_recaida_seq'::regclass);


--
-- Name: rol id_rol; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol ALTER COLUMN id_rol SET DEFAULT nextval('public.rol_id_rol_seq'::regclass);


--
-- Name: tratamiento id_tratamiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tratamiento ALTER COLUMN id_tratamiento SET DEFAULT nextval('public.tratamiento_id_tratamiento_seq'::regclass);


--
-- Name: usuario_sistema id_usuario_sistema; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_sistema ALTER COLUMN id_usuario_sistema SET DEFAULT nextval('public.usuario_sistema_id_usuario_sistema_seq'::regclass);


--
-- Data for Name: caso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.caso (id_caso, fecha, numero_caso, origen, modo_infeccion, muerte, recaida, id_paciente) FROM stdin;
\.


--
-- Data for Name: caso_recaida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.caso_recaida (id_caso_recaida, id_caso, id_recaida) FROM stdin;
\.


--
-- Data for Name: descripcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.descripcion (id_descripcion, peso, embarazada, madre_lactante, lactante) FROM stdin;
\.


--
-- Data for Name: estado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estado (id_estado, estado) FROM stdin;
\.


--
-- Data for Name: municipio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.municipio (id_municipio, municipio) FROM stdin;
\.


--
-- Data for Name: paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.paciente (id_paciente, numero_paciente, nombre_paciente, apellido_paciente, cedula_paciente, nacionalidad_paciente, fecha_nacimiento, direccion_paciente, sexo_paciente, telefono_paciente, etnia_paciente, id_municipio, id_parroquia, id_estado, id_usuario_sistema) FROM stdin;
\.


--
-- Data for Name: paciente_descripcion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.paciente_descripcion (id_paciente_descripcion, id_paciente, id_descripcion) FROM stdin;
\.


--
-- Data for Name: paciente_pruebas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.paciente_pruebas (id_paciente_pruebas, id_paciente, id_pruebas) FROM stdin;
\.


--
-- Data for Name: paciente_tratamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.paciente_tratamiento (id_paciente_tratamiento, id_paciente, id_tratamiento) FROM stdin;
\.


--
-- Data for Name: parroquia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parroquia (id_parroquia, parroquia) FROM stdin;
\.


--
-- Data for Name: pruebas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pruebas (id_pruebas, tipo_prueba, codigo_notificacion, numero_lamina_pdrm, tipo_busqueda, especie_plasmodium, fecha_inicio_fiebre, fecha_toma_lamina, lugar, direccion_toma_lamina) FROM stdin;
\.


--
-- Data for Name: recaida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.recaida (id_recaida, descripcion) FROM stdin;
\.


--
-- Data for Name: rol; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.rol (id_rol, descripcion) FROM stdin;
\.


--
-- Data for Name: tratamiento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tratamiento (id_tratamiento, nombre, cantidad, fecha_suministrado) FROM stdin;
\.


--
-- Data for Name: usuario_sistema; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario_sistema (id_usuario_sistema, usuario_sistema, clave, nombre, apellido, cedula, id_rol) FROM stdin;
\.


--
-- Name: caso_id_caso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.caso_id_caso_seq', 1, false);


--
-- Name: caso_recaida_id_caso_recaida_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.caso_recaida_id_caso_recaida_seq', 1, false);


--
-- Name: descripcion_id_descripcion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.descripcion_id_descripcion_seq', 1, false);


--
-- Name: estado_id_estado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estado_id_estado_seq', 1, false);


--
-- Name: municipio_id_municipio_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.municipio_id_municipio_seq', 1, false);


--
-- Name: paciente_descripcion_id_paciente_descripcion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.paciente_descripcion_id_paciente_descripcion_seq', 1, false);


--
-- Name: paciente_id_paciente_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.paciente_id_paciente_seq', 1, false);


--
-- Name: paciente_pruebas_id_paciente_pruebas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.paciente_pruebas_id_paciente_pruebas_seq', 1, false);


--
-- Name: paciente_tratamiento_id_paciente_tratamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.paciente_tratamiento_id_paciente_tratamiento_seq', 1, false);


--
-- Name: parroquia_id_parroquia_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.parroquia_id_parroquia_seq', 1, false);


--
-- Name: pruebas_id_pruebas_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pruebas_id_pruebas_seq', 1, false);


--
-- Name: recaida_id_recaida_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recaida_id_recaida_seq', 1, false);


--
-- Name: rol_id_rol_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rol_id_rol_seq', 1, false);


--
-- Name: tratamiento_id_tratamiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tratamiento_id_tratamiento_seq', 1, false);


--
-- Name: usuario_sistema_id_usuario_sistema_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_sistema_id_usuario_sistema_seq', 1, false);


--
-- Name: caso caso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso
    ADD CONSTRAINT caso_pkey PRIMARY KEY (id_caso);


--
-- Name: caso_recaida caso_recaida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso_recaida
    ADD CONSTRAINT caso_recaida_pkey PRIMARY KEY (id_caso_recaida);


--
-- Name: descripcion descripcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.descripcion
    ADD CONSTRAINT descripcion_pkey PRIMARY KEY (id_descripcion);


--
-- Name: estado estado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estado
    ADD CONSTRAINT estado_pkey PRIMARY KEY (id_estado);


--
-- Name: municipio municipio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.municipio
    ADD CONSTRAINT municipio_pkey PRIMARY KEY (id_municipio);


--
-- Name: paciente_descripcion paciente_descripcion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_descripcion
    ADD CONSTRAINT paciente_descripcion_pkey PRIMARY KEY (id_paciente_descripcion);


--
-- Name: paciente paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_pkey PRIMARY KEY (id_paciente);


--
-- Name: paciente_pruebas paciente_pruebas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_pruebas
    ADD CONSTRAINT paciente_pruebas_pkey PRIMARY KEY (id_paciente_pruebas);


--
-- Name: paciente_tratamiento paciente_tratamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_tratamiento
    ADD CONSTRAINT paciente_tratamiento_pkey PRIMARY KEY (id_paciente_tratamiento);


--
-- Name: parroquia parroquia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parroquia
    ADD CONSTRAINT parroquia_pkey PRIMARY KEY (id_parroquia);


--
-- Name: pruebas pruebas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pruebas
    ADD CONSTRAINT pruebas_pkey PRIMARY KEY (id_pruebas);


--
-- Name: recaida recaida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recaida
    ADD CONSTRAINT recaida_pkey PRIMARY KEY (id_recaida);


--
-- Name: rol rol_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rol
    ADD CONSTRAINT rol_pkey PRIMARY KEY (id_rol);


--
-- Name: tratamiento tratamiento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tratamiento
    ADD CONSTRAINT tratamiento_pkey PRIMARY KEY (id_tratamiento);


--
-- Name: usuario_sistema usuario_sistema_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_sistema
    ADD CONSTRAINT usuario_sistema_pkey PRIMARY KEY (id_usuario_sistema);


--
-- Name: caso caso_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso
    ADD CONSTRAINT caso_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id_paciente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: caso_recaida caso_recaida_id_caso_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso_recaida
    ADD CONSTRAINT caso_recaida_id_caso_fkey FOREIGN KEY (id_caso) REFERENCES public.caso(id_caso) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: caso_recaida caso_recaida_id_recaida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caso_recaida
    ADD CONSTRAINT caso_recaida_id_recaida_fkey FOREIGN KEY (id_recaida) REFERENCES public.recaida(id_recaida) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_descripcion paciente_descripcion_id_descripcion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_descripcion
    ADD CONSTRAINT paciente_descripcion_id_descripcion_fkey FOREIGN KEY (id_descripcion) REFERENCES public.descripcion(id_descripcion) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_descripcion paciente_descripcion_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_descripcion
    ADD CONSTRAINT paciente_descripcion_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id_paciente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente paciente_id_estado_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_id_estado_fkey FOREIGN KEY (id_estado) REFERENCES public.estado(id_estado) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente paciente_id_municipio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_id_municipio_fkey FOREIGN KEY (id_municipio) REFERENCES public.municipio(id_municipio) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente paciente_id_parroquia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_id_parroquia_fkey FOREIGN KEY (id_parroquia) REFERENCES public.parroquia(id_parroquia) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente paciente_id_usuario_sistema_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_id_usuario_sistema_fkey FOREIGN KEY (id_usuario_sistema) REFERENCES public.usuario_sistema(id_usuario_sistema) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_pruebas paciente_pruebas_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_pruebas
    ADD CONSTRAINT paciente_pruebas_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id_paciente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_pruebas paciente_pruebas_id_pruebas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_pruebas
    ADD CONSTRAINT paciente_pruebas_id_pruebas_fkey FOREIGN KEY (id_pruebas) REFERENCES public.pruebas(id_pruebas) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_tratamiento paciente_tratamiento_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_tratamiento
    ADD CONSTRAINT paciente_tratamiento_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id_paciente) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: paciente_tratamiento paciente_tratamiento_id_tratamiento_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente_tratamiento
    ADD CONSTRAINT paciente_tratamiento_id_tratamiento_fkey FOREIGN KEY (id_tratamiento) REFERENCES public.tratamiento(id_tratamiento) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: usuario_sistema usuario_sistema_id_rol_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario_sistema
    ADD CONSTRAINT usuario_sistema_id_rol_fkey FOREIGN KEY (id_rol) REFERENCES public.rol(id_rol) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

