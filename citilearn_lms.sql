--
-- PostgreSQL database dump
--

-- Dumped from database version 17.0
-- Dumped by pg_dump version 17.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
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
-- Name: courses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.courses (
    course_code character varying(5) NOT NULL,
    course_title character varying(100) NOT NULL,
    course_summary text,
    course_desc text,
    course_thumbnail character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.courses OWNER TO postgres;

--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: pdfs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pdfs (
    course_code character varying(5) NOT NULL,
    pdf_id bigint NOT NULL,
    pdf_title character varying(100) NOT NULL,
    pdf_file_path character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.pdfs OWNER TO postgres;

--
-- Name: pdfs_pdf_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pdfs_pdf_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.pdfs_pdf_id_seq OWNER TO postgres;

--
-- Name: pdfs_pdf_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pdfs_pdf_id_seq OWNED BY public.pdfs.pdf_id;


--
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: questions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questions (
    course_code character varying(5) NOT NULL,
    question_id bigint NOT NULL,
    question_text text NOT NULL,
    option_a character varying(255) NOT NULL,
    option_b character varying(255) NOT NULL,
    option_c character varying(255) NOT NULL,
    option_d character varying(255) NOT NULL,
    correct_answer character(1) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.questions OWNER TO postgres;

--
-- Name: questions_question_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questions_question_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.questions_question_id_seq OWNER TO postgres;

--
-- Name: questions_question_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questions_question_id_seq OWNED BY public.questions.question_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    user_id bigint NOT NULL,
    fullname character varying(100) NOT NULL,
    username character varying(30) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_courses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users_courses (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    course_code character varying(5) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users_courses OWNER TO postgres;

--
-- Name: users_courses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_courses_id_seq OWNER TO postgres;

--
-- Name: users_courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_courses_id_seq OWNED BY public.users_courses.id;


--
-- Name: users_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_user_id_seq OWNER TO postgres;

--
-- Name: users_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_user_id_seq OWNED BY public.users.user_id;


--
-- Name: videos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.videos (
    course_code character varying(5) NOT NULL,
    video_id bigint NOT NULL,
    video_title character varying(100) NOT NULL,
    video_url character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.videos OWNER TO postgres;

--
-- Name: videos_video_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.videos_video_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.videos_video_id_seq OWNER TO postgres;

--
-- Name: videos_video_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.videos_video_id_seq OWNED BY public.videos.video_id;


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: pdfs pdf_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdfs ALTER COLUMN pdf_id SET DEFAULT nextval('public.pdfs_pdf_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: questions question_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions ALTER COLUMN question_id SET DEFAULT nextval('public.questions_question_id_seq'::regclass);


--
-- Name: users user_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN user_id SET DEFAULT nextval('public.users_user_id_seq'::regclass);


--
-- Name: users_courses id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_courses ALTER COLUMN id SET DEFAULT nextval('public.users_courses_id_seq'::regclass);


--
-- Name: videos video_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.videos ALTER COLUMN video_id SET DEFAULT nextval('public.videos_video_id_seq'::regclass);


--
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.courses (course_code, course_title, course_summary, course_desc, course_thumbnail, created_at, updated_at) FROM stdin;
COWMP	Impact of Employee Benefits on Work Motivation and Productivity	In the stimulus-response behaviour, employees’ work-motivation, seen as the response, can be analysed from absence rate, leave rate, quit rate, get-to-work speed and so on.	Employee benefit is essential for the development of corporate industrial relations. According to Herzberg’s two-factor theory (motivation and hygiene), an employee benefit programme was a necessary and sufficient working condition. The hygiene factor will affect employees’ work motivation and thus productivity. In the stimulus-response behaviour, employees’ work-motivation, seen as the response, can be analysed from absence rate, leave rate, quit rate, get-to-work speed and so on. Productivity can be analysed from quality and quantity of products. The quality indices include faults and returns; the quantity indices include completion time and the production hygiene factor. This depends on the individual properties of the employee, who is the medium essential for managemment, and stimulates employees to enhance their work and productivity. In addition, Vroom maintained in his expectation theory that everyone works in expectation of some rewards (both spiritual and material), and welfare is one of them. In other words, the degree of reward influences the quality and quantity of work, and in turn productivity. So it is important to explore how to give the stimulus (welfare) in order to promote work motivation and productivity.	/img/Work-Motivation-and-Productivity.jpg	2024-09-30 12:15:12	2024-09-30 12:15:12
COLCC	Customer Satisfaction using Low Cost Carriers	Low cost carriers (LCCs) have a competitive advantage over full service carriers (FSCs) in several nations due to their lower fares and similar levels of service quality.	Low cost carriers (LCCs) have a competitive advantage over full service carriers (FSCs) in several nations due to their lower fares and similar levels of service quality. Not all customers’ needs are alike, and the market characteristics found in the LCCs industry may influence customers’ attitudes. Thus, this study examines the relative importance of perceived service quality and the relationship between perceived service quality, customer satisfaction and behavioral intention using multidimensional methods. The results from this study indicate that the significant dimensions of customer satisfaction are tangibles and responsiveness. In addition, the study confirms the significant consequences of customer satisfaction including word-of-mouth communication, purchase intentions, and complaining behavior. Based on these results, carriers should develop tangibles and responsiveness for the enhancement of customer satisfaction and behavioral intentions.	/img/Customer-Satisfaction-using-Low-Cost-Carriers.jpg	2024-09-30 12:15:12	2024-09-30 12:15:12
COCTK	Evaluation of Cabin Crew Technical Knowledge	The present study explored both flight attendant technical knowledge and flight attendant and pilot expectations of flight attendant technical knowledge.	Accident and incident reports have indicated that flight attendants have numerous opportunities to  provide the flight-deck crew with operational information that may prevent or lessen the severity of  a potential problem. Additionally, as carrier fleets transition from three to two person flight-deck  crews, the reliance upon the cabin crew for the transfer of such information may increase further.  Recent research indicates that flight attendants do not feel confident in their ability to describe  mechanical parts or malfunctions of the aircraft. Additionally, this lack of flight attendant technical  training has been referenced in a number of recent reports. The present study explored both flight  attendant technical knowledge and flight attendant and pilot expectations of flight attendant  technical knowledge. Results suggest that cabin crews are not receiving the amount of technical training that both pilots and cabin crew members believe is necessary for the efficient exchange of  safety information. Implications for training are discussed. 	/img/Cabin-Crew-Technical-Knowledge.jpg	2024-09-30 12:15:12	2024-09-30 12:15:12
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_reset_tokens_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2024_09_29_030702_create_courses_table	1
6	2024_09_29_055209_create_videos_table	1
7	2024_09_29_061435_create_pdfs_table	1
8	2024_09_29_061934_create_questions_table	1
9	2024_09_29_080202_create_users_courses_table	1
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: pdfs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pdfs (course_code, pdf_id, pdf_title, pdf_file_path, created_at, updated_at) FROM stdin;
COLCC	1	Customer satisfaction using low cost carriers	/pdf/modul-pdf-1.pdf	2024-09-30 12:58:20	2024-09-30 12:58:20
COWMP	2	Impact of employee benefits on work motivation and productivity	/pdf/modul-pdf-2.pdf	2024-09-30 12:58:20	2024-09-30 12:58:20
COCTK	3	Evaluation of Cabin Crew Technical Knowledge	/pdf/modul-pdf-3.pdf	2024-09-30 12:58:20	2024-09-30 12:58:20
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.questions (course_code, question_id, question_text, option_a, option_b, option_c, option_d, correct_answer, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (user_id, fullname, username, email, password, created_at, updated_at) FROM stdin;
1	Famardi Putra Muhammad Raffly	muhammadraffly	rafli7654@gmail.com	$2y$12$Hr0QvjKxBM8NgXzmDxxzUeYwuZHlcIfGdnlrhy6RiNVkHUzg8IU8W	2024-09-30 05:16:51	2024-09-30 05:16:51
2	Abullsalam	abdul12	abdul12@gmail.com	$2y$12$N57pjWV6fOsOivEeiWungunvmshuMPWjIbj8FJuHur7Ai16M1BDdK	2024-09-30 05:18:06	2024-09-30 05:18:06
\.


--
-- Data for Name: users_courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users_courses (id, user_id, course_code, created_at, updated_at) FROM stdin;
1	1	COWMP	2024-09-30 05:18:44	2024-09-30 05:18:44
2	1	COLCC	2024-09-30 05:20:45	2024-09-30 05:20:45
3	1	COCTK	2024-09-30 05:26:52	2024-09-30 05:26:52
4	2	COWMP	2024-09-30 07:06:59	2024-09-30 07:06:59
\.


--
-- Data for Name: videos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.videos (course_code, video_id, video_title, video_url, created_at, updated_at) FROM stdin;
COWMP	2	Citilink Indonesia - Member of Garuda Indonesia Group	https://www.youtube.com/embed/KtgTnoQDGz8?si=mHj3Z2JEeeXfyRoO	2024-09-30 12:34:25	2024-09-30 12:34:25
COLCC	1	The People Behind Citilink	https://www.youtube.com/embed/fNe5hWA_PtU?si=3QEJe5vjmeUusbic	2024-09-30 12:34:25	2024-09-30 12:34:25
COCTK	3	The People Behind Citilink	https://www.youtube.com/embed/fNe5hWA_PtU?si=3QEJe5vjmeUusbic	2024-09-30 12:34:25	2024-09-30 12:34:25
\.


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);


--
-- Name: pdfs_pdf_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pdfs_pdf_id_seq', 3, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: questions_question_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questions_question_id_seq', 1, false);


--
-- Name: users_courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_courses_id_seq', 4, true);


--
-- Name: users_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_user_id_seq', 2, true);


--
-- Name: videos_video_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.videos_video_id_seq', 3, true);


--
-- Name: courses courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (course_code);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: pdfs pdfs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdfs
    ADD CONSTRAINT pdfs_pkey PRIMARY KEY (pdf_id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: questions questions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (question_id);


--
-- Name: users_courses users_courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_courses
    ADD CONSTRAINT users_courses_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);


--
-- Name: users users_username_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);


--
-- Name: videos videos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.videos
    ADD CONSTRAINT videos_pkey PRIMARY KEY (video_id);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: pdfs pdfs_course_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pdfs
    ADD CONSTRAINT pdfs_course_code_foreign FOREIGN KEY (course_code) REFERENCES public.courses(course_code) ON DELETE CASCADE;


--
-- Name: questions questions_course_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_course_code_foreign FOREIGN KEY (course_code) REFERENCES public.courses(course_code) ON DELETE CASCADE;


--
-- Name: users_courses users_courses_course_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_courses
    ADD CONSTRAINT users_courses_course_code_foreign FOREIGN KEY (course_code) REFERENCES public.courses(course_code) ON DELETE CASCADE;


--
-- Name: users_courses users_courses_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users_courses
    ADD CONSTRAINT users_courses_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(user_id) ON DELETE CASCADE;


--
-- Name: videos videos_course_code_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.videos
    ADD CONSTRAINT videos_course_code_foreign FOREIGN KEY (course_code) REFERENCES public.courses(course_code) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

