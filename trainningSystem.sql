--
-- PostgreSQL database dump
--

-- Dumped from database version 11.3
-- Dumped by pg_dump version 11.3

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

--
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    admninid character varying(50) NOT NULL,
    adminusername character varying(50) NOT NULL,
    adminpassword character varying(50) NOT NULL
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: category; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.category (
    categoryid character varying(50) NOT NULL,
    categoryname character varying(50) NOT NULL
);


ALTER TABLE public.category OWNER TO postgres;

--
-- Name: course; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.course (
    courseid character varying(50) NOT NULL,
    coursename character varying(50) NOT NULL,
    coursedesc character varying(50) NOT NULL,
    categoryid character varying(50) NOT NULL
);


ALTER TABLE public.course OWNER TO postgres;

--
-- Name: programminglanguage; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.programminglanguage (
    programminglanguageid character varying(50) NOT NULL,
    programminglanguage character varying(50) NOT NULL
);


ALTER TABLE public.programminglanguage OWNER TO postgres;

--
-- Name: staff; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.staff (
    staffid character varying(50) NOT NULL,
    staffusername character varying(50) NOT NULL,
    staffpassword character varying(50) NOT NULL,
    staffname character varying(50),
    staffphone character varying(50)
);


ALTER TABLE public.staff OWNER TO postgres;

--
-- Name: topic; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.topic (
    topicid character varying(50) NOT NULL,
    topicname character varying(50),
    topicdesc character varying(50)
);


ALTER TABLE public.topic OWNER TO postgres;

--
-- Name: topiccourse; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.topiccourse (
    topiccourseid character varying(50) NOT NULL,
    topicid character varying(50) NOT NULL,
    courseid character varying(50) NOT NULL,
    staffid character varying(50) NOT NULL,
    trainerid character varying(50) NOT NULL
);


ALTER TABLE public.topiccourse OWNER TO postgres;

--
-- Name: trainee; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.trainee (
    traineeid character varying(50) NOT NULL,
    traineeusername character varying(50) NOT NULL,
    traineepassword character varying(50) NOT NULL,
    traineename character varying(50) NOT NULL,
    traineeage integer NOT NULL,
    traineeeducationalbg character varying(50) NOT NULL,
    toeicscore integer NOT NULL,
    trainerworkingplace character varying(50) NOT NULL
);


ALTER TABLE public.trainee OWNER TO postgres;

--
-- Name: traineeprogramminglanguage; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.traineeprogramminglanguage (
    traineeprogramminglanguage character varying(50) NOT NULL,
    programminglanguageid character varying(50) NOT NULL,
    traineeid character varying(50) NOT NULL
);


ALTER TABLE public.traineeprogramminglanguage OWNER TO postgres;

--
-- Name: trainer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.trainer (
    trainerid character varying(50) NOT NULL,
    trainerusername character varying(50) NOT NULL,
    trainerpassword character varying(50) NOT NULL,
    trainername character varying(50),
    trainerphone character varying(50),
    traineremail character varying(50),
    trainereducationalbg character varying(50),
    trainerworkingplace character varying(50),
    employmenttype character varying(50)
);


ALTER TABLE public.trainer OWNER TO postgres;

--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admninid);


--
-- Name: category category_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (categoryid);


--
-- Name: course course_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.course
    ADD CONSTRAINT course_pkey PRIMARY KEY (courseid);


--
-- Name: programminglanguage programminglanguage_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.programminglanguage
    ADD CONSTRAINT programminglanguage_pkey PRIMARY KEY (programminglanguageid);


--
-- Name: staff staff_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staff
    ADD CONSTRAINT staff_pkey PRIMARY KEY (staffid);


--
-- Name: topic topic_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topic
    ADD CONSTRAINT topic_pkey PRIMARY KEY (topicid);


--
-- Name: topiccourse topiccourse_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topiccourse
    ADD CONSTRAINT topiccourse_pkey PRIMARY KEY (topiccourseid);


--
-- Name: trainee trainee_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trainee
    ADD CONSTRAINT trainee_pkey PRIMARY KEY (traineeid);


--
-- Name: traineeprogramminglanguage traineeprogramminglanguage_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.traineeprogramminglanguage
    ADD CONSTRAINT traineeprogramminglanguage_pkey PRIMARY KEY (traineeprogramminglanguage);


--
-- Name: trainer trainer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.trainer
    ADD CONSTRAINT trainer_pkey PRIMARY KEY (trainerid);


--
-- Name: course course_categoryid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.course
    ADD CONSTRAINT course_categoryid_fkey FOREIGN KEY (categoryid) REFERENCES public.category(categoryid);


--
-- Name: topiccourse topiccourse_courseid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topiccourse
    ADD CONSTRAINT topiccourse_courseid_fkey FOREIGN KEY (courseid) REFERENCES public.course(courseid);


--
-- Name: topiccourse topiccourse_staffid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topiccourse
    ADD CONSTRAINT topiccourse_staffid_fkey FOREIGN KEY (staffid) REFERENCES public.staff(staffid);


--
-- Name: topiccourse topiccourse_topicid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topiccourse
    ADD CONSTRAINT topiccourse_topicid_fkey FOREIGN KEY (topicid) REFERENCES public.topic(topicid);


--
-- Name: topiccourse topiccourse_trainerid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.topiccourse
    ADD CONSTRAINT topiccourse_trainerid_fkey FOREIGN KEY (trainerid) REFERENCES public.trainer(trainerid);


--
-- Name: traineeprogramminglanguage traineeprogramminglanguage_programminglanguageid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.traineeprogramminglanguage
    ADD CONSTRAINT traineeprogramminglanguage_programminglanguageid_fkey FOREIGN KEY (programminglanguageid) REFERENCES public.programminglanguage(programminglanguageid);


--
-- Name: traineeprogramminglanguage traineeprogramminglanguage_traineeid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.traineeprogramminglanguage
    ADD CONSTRAINT traineeprogramminglanguage_traineeid_fkey FOREIGN KEY (traineeid) REFERENCES public.trainee(traineeid);


--
-- PostgreSQL database dump complete
--

