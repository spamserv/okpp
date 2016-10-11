--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.4
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
-- Name: first; Type: TABLE; Schema: public; Owner: fidxdwwuzfakev
--

CREATE TABLE first (
    id integer NOT NULL,
    data text
);


ALTER TABLE first OWNER TO fidxdwwuzfakev;

--
-- Name: second; Type: TABLE; Schema: public; Owner: fidxdwwuzfakev
--

CREATE TABLE second (
    id integer NOT NULL,
    data text
);


ALTER TABLE second OWNER TO fidxdwwuzfakev;

--
-- Data for Name: first; Type: TABLE DATA; Schema: public; Owner: fidxdwwuzfakev
--

COPY first (id, data) FROM stdin;
1	podatak
2	Test
3	asd
4	joisp
5	ivan
6	majka
\.


--
-- Data for Name: second; Type: TABLE DATA; Schema: public; Owner: fidxdwwuzfakev
--

COPY second (id, data) FROM stdin;
1	Test
2	asd
\.


--
-- Name: tablename_audit; Type: TRIGGER; Schema: public; Owner: fidxdwwuzfakev
--

CREATE TRIGGER tablename_audit AFTER INSERT OR DELETE OR UPDATE ON first FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();


--
-- Name: tablename_audit; Type: TRIGGER; Schema: public; Owner: fidxdwwuzfakev
--

CREATE TRIGGER tablename_audit AFTER INSERT OR DELETE OR UPDATE ON second FOR EACH ROW EXECUTE PROCEDURE audit.if_modified_func();


--
-- Name: public; Type: ACL; Schema: -; Owner: fidxdwwuzfakev
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM fidxdwwuzfakev;
GRANT ALL ON SCHEMA public TO fidxdwwuzfakev;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

