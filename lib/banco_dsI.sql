--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-05-06 14:51:57 BRT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2023 (class 1262 OID 12070)
-- Dependencies: 2022
-- Name: postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- TOC entry 178 (class 3079 OID 11791)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2026 (class 0 OID 0)
-- Dependencies: 178
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 171 (class 1259 OID 16805)
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categoria (
    id integer NOT NULL,
    nome character varying
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 16803)
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categoria_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_id_seq OWNER TO postgres;

--
-- TOC entry 2027 (class 0 OID 0)
-- Dependencies: 170
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE categoria_id_seq OWNED BY categoria.id;


--
-- TOC entry 175 (class 1259 OID 16827)
-- Name: movimentacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE movimentacao (
    id integer NOT NULL,
    valor real NOT NULL,
    categoria integer NOT NULL,
    tipo integer NOT NULL,
    data date NOT NULL,
    descricao character varying,
    usuario integer NOT NULL,
    CONSTRAINT valor_nao_negativo CHECK ((valor >= (0)::double precision))
);


ALTER TABLE public.movimentacao OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16825)
-- Name: movimentacao_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE movimentacao_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movimentacao_id_seq OWNER TO postgres;

--
-- TOC entry 2028 (class 0 OID 0)
-- Dependencies: 174
-- Name: movimentacao_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE movimentacao_id_seq OWNED BY movimentacao.id;


--
-- TOC entry 173 (class 1259 OID 16816)
-- Name: tipo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo (
    id integer NOT NULL,
    nome character varying
);


ALTER TABLE public.tipo OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16814)
-- Name: tipo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tipo_id_seq OWNER TO postgres;

--
-- TOC entry 2029 (class 0 OID 0)
-- Dependencies: 172
-- Name: tipo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_id_seq OWNED BY tipo.id;


--
-- TOC entry 177 (class 1259 OID 16849)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    id integer NOT NULL,
    username character varying,
    senha character varying
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16847)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 2030 (class 0 OID 0)
-- Dependencies: 176
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuario_id_seq OWNED BY usuario.id;


--
-- TOC entry 1885 (class 2604 OID 16808)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY categoria ALTER COLUMN id SET DEFAULT nextval('categoria_id_seq'::regclass);


--
-- TOC entry 1887 (class 2604 OID 16830)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimentacao ALTER COLUMN id SET DEFAULT nextval('movimentacao_id_seq'::regclass);


--
-- TOC entry 1886 (class 2604 OID 16819)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo ALTER COLUMN id SET DEFAULT nextval('tipo_id_seq'::regclass);


--
-- TOC entry 1889 (class 2604 OID 16852)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN id SET DEFAULT nextval('usuario_id_seq'::regclass);


--
-- TOC entry 2011 (class 0 OID 16805)
-- Dependencies: 171
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO categoria (id, nome) VALUES (1, 'Lazer');
INSERT INTO categoria (id, nome) VALUES (2, 'Supermercado');
INSERT INTO categoria (id, nome) VALUES (3, 'Salario');
INSERT INTO categoria (id, nome) VALUES (4, 'Bolsa');
INSERT INTO categoria (id, nome) VALUES (5, 'Alimentacao');
INSERT INTO categoria (id, nome) VALUES (6, 'Gasolina');
INSERT INTO categoria (id, nome) VALUES (7, 'Aluguel');


--
-- TOC entry 2031 (class 0 OID 0)
-- Dependencies: 170
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categoria_id_seq', 7, true);


--
-- TOC entry 2015 (class 0 OID 16827)
-- Dependencies: 175
-- Data for Name: movimentacao; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2032 (class 0 OID 0)
-- Dependencies: 174
-- Name: movimentacao_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('movimentacao_id_seq', 1, false);


--
-- TOC entry 2013 (class 0 OID 16816)
-- Dependencies: 173
-- Data for Name: tipo; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO tipo (id, nome) VALUES (1, 'receita');
INSERT INTO tipo (id, nome) VALUES (2, 'despesa');


--
-- TOC entry 2033 (class 0 OID 0)
-- Dependencies: 172
-- Name: tipo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_id_seq', 2, true);


--
-- TOC entry 2017 (class 0 OID 16849)
-- Dependencies: 177
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuario (id, username, senha) VALUES (2, 'nome', '1234');


--
-- TOC entry 2034 (class 0 OID 0)
-- Dependencies: 176
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_id_seq', 2, true);


--
-- TOC entry 1891 (class 2606 OID 16813)
-- Name: categoria_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categoria
    ADD CONSTRAINT categoria_pk PRIMARY KEY (id);


--
-- TOC entry 1895 (class 2606 OID 16836)
-- Name: movimentacao_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY movimentacao
    ADD CONSTRAINT movimentacao_pk PRIMARY KEY (id);


--
-- TOC entry 1893 (class 2606 OID 16824)
-- Name: tipo_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo
    ADD CONSTRAINT tipo_pk PRIMARY KEY (id);


--
-- TOC entry 1897 (class 2606 OID 16859)
-- Name: username_unique; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT username_unique UNIQUE (username);


--
-- TOC entry 1899 (class 2606 OID 16857)
-- Name: usuario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pk PRIMARY KEY (id);


--
-- TOC entry 1900 (class 2606 OID 16837)
-- Name: movimentacao_categoria_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimentacao
    ADD CONSTRAINT movimentacao_categoria_fk FOREIGN KEY (categoria) REFERENCES categoria(id);


--
-- TOC entry 1901 (class 2606 OID 16842)
-- Name: movimentacao_tipo_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimentacao
    ADD CONSTRAINT movimentacao_tipo_fk FOREIGN KEY (tipo) REFERENCES tipo(id);


--
-- TOC entry 1902 (class 2606 OID 16860)
-- Name: movimentacao_usuario_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimentacao
    ADD CONSTRAINT movimentacao_usuario_fk FOREIGN KEY (usuario) REFERENCES usuario(id);


--
-- TOC entry 2025 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-05-06 14:51:57 BRT

--
-- PostgreSQL database dump complete
--

