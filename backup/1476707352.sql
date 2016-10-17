--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.4
-- Dumped by pg_dump version 9.5.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: first; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE first (
    id integer NOT NULL,
    data text
);


ALTER TABLE first OWNER TO postgres;

--
-- Name: second; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE second (
    id integer NOT NULL,
    data text
);


ALTER TABLE second OWNER TO postgres;

--
-- Data for Name: first; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY first (id, data) FROM stdin;
1	podatak
2	Test
3	asd
4	joisp
5	ivan
\.


--
-- Data for Name: second; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY second (id, data) FROM stdin;
1	Test
2	asd
\.


--
-- Name: tablename_audit; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER tablename_audit AFTER INSERT OR DELETE OR UPDATE ON first FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();


--
-- Name: tablename_audit; Type: TRIGGER; Schema: public; Owner: postgres
--

CREATE TRIGGER tablename_audit AFTER INSERT OR DELETE OR UPDATE ON second FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

