@extends('layouts.app')
@section('title', "{$post->title} | Dashboard & UX/UI Designer")
@section('blog')

<div class=" bg-[#CFE2F3] py-36 w-full pb-60 -mt-10">
    {{-- <div class="z-[999] fixed top-0">
        <button type="button" class="flex flex-shrink-0 justify-center items-center gap-2 h-[2.875rem] w-[2.875rem] text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          </button>
    </div> --}}
    <div class=" mx-auto">
        <h1 class=" font-bold text-3xl lg:text-[40px] leading-[48px] text[#0b0c0d] max-w-4xl mx-auto text-center mb-10">Development and Design for a Top 10 Real Estate Company in the US</h1>
        <p class="max-w-xl mx-auto text-center leading-7 text-[#0b0c0d]">Using AI, modern design, and cutting-edge solutions to become a tech company and shape the future of the industry</p>
        </div>
    </div>
</div>

<div class=" w-11/12 max-w-5xl mx-auto -mt-44 ">
    <img class="rounded-md" src="{{asset('img/kw_bespoke_HERO.webp')}}" alt="">
</div>

<div class=" w-11/12 max-w-5xl mx-auto grid grid-cols-12 py-14 px-10 border my-6 rounded-md shadow gap-10 text-sm">
    <div class=" col-span-12 lg:col-span-6">
        <h2 class=" font-semibold mb-5 uppercase">About This Project</h2>
        <p>Keller Williams, the world’s largest real estate franchise, wanted to stay ahead of the competition by leveraging their data to boost artificial intelligence-powered technology. As a design and software partner for Keller Williams we designed a feature in one of KW’s projects and successfully onboarded a 50+ team to support Keller Williams with its transformation and new initiatives.</p>
    </div>
    <div class=" col-span-12 md:col-span-6 lg:col-span-3">
        <h2 class=" font-semibold mb-5">SERVICES</h2>
        <ul>
            <li><a class="underline" href="#">Software development</a></li>
            <li><a class="underline" href="#">Product design</a></li>
        </ul>
    </div>

    <div class=" col-span-12 md:col-span-6 lg:col-span-3">
        <h2 class=" font-semibold uppercase mb-5">Technologies    </h2>
        <ul>
            <li>React</li>
            <li>React native</li>
            <li>Node.js</li>
            <li>Python</li>
            <li>Django</li>
            <li>Golang</li>
            <li>PHP</li>
        </ul>
    </div>
</div>

<div class=" w-11/12 max-w-3xl mx-auto py-10 ">
    <h1 class=" my-10 font-semibold text-4xl ">Keller Williams is the world’s largest real estate franchise ranked by agent count (it employs more than 170,000 agents).</h1>

    <p class=" my-4 leading-8">It’s been named as one of the Most Innovative Companies in 2019 by “Fast Company”.</p>
    <p class="my-4 leading-8">The digital transformation journey started back in 2015, when KW decided to reposition itself as a tech company. The company invested heavily in its own software, the cloud, and AI. It has scooped up top talent from the market and created its own Labs division, KW Labs. KW Labs acts as the innovation hub of Keller Williams, working in a similar fashion to Google and Amazon.</p>
    <p class="my-4 leading-8">To stay ahead of competitors, Keller Williams have also undertaken one of the most ambitious projects in the industry – to leverage their data to boost artificial intelligence-powered technology.</p>
</div>
<div class="w-11/12 max-w-5xl mx-auto ">
    <img class=" rounded-md" src="{{asset('img/kw_bespoke_art_1.webp')}}" alt="">
</div>

<div class=" w-11/12 max-w-3xl mx-auto py-10 ">
    <div class=" max-w-2xl border-l-4 border-green-500 my-7 px-10 py-6">
        <h2 class="font-semibold text-2xl lg:text-3xl">It’s not only the size, it’s the interconnectedness of our system. We spent a lot of time connecting all of our systems – including our legacy systems – so that we would have all of the data.</h2>

        <div class=" flex space-x-4 mt-10">
            <div class=" h-12 w-12 ">
                <img class="rounded-full"  src="{{asset('img/icon/Neil_Dholakia.webp')}}" alt="">
            </div>
            <div>
                <h3>Neil Dholakia</h3>
                <p class=" text-gray-400">Chief Product Officer at KW</p>
            </div>
        </div>
    </div>
    <div class=" max-w-2xl my-7 text-lg">
        <p class=" mb-4">The company has already launched innovative products, such as:</p>
        <ul class=" list-disc list-outside ml-5 space-y-4">
            <li class=" marker:text-green-600 marker:font-extrabold">Command, a new AI-powered customer relationship management system for real estate agents, one of KW’s major platforms;</li>
            <li class=" marker:text-green-600 marker:font-extrabold">Kelle, an AI-powered personal assistant app that helps agents manage their deals, dubbed ‘Siri for the real estate industry’;</li>
            <li class=" marker:text-green-600 marker:font-extrabold">Consumer App, redefining the current buy/sell process in an innovative and transparent way. (launched in beta to consumer test groups in 2019)</li>
        </ul>
        <p class=" my-6">To put these products in perspective, let’s see some numbers.</p>
        <p>As of Oct 15, 2019, Command had over 100k active users, and agents had added more than 40 million client contacts into the platform. Keller Williams also reached over 85k active users on Kelle.</p>
    </div>
</div>

<div class="w-11/12 max-w-5xl mx-auto ">
    <img class=" rounded-md" src="{{asset('img/kw_bespoke_art_2.webp')}}" alt="">
</div>

<div class=" w-11/12 max-w-3xl mx-auto py-10 text-lg ">

    <p class=" my-4 leading-8">As a design and software partner for Keller Williams, we know for a fact that they are moving incredibly fast in their transformation efforts. Our collaboration started in a modest way in late 2017: we designed a feature in one of KW’s projects.</p>
    <p class="my-4 leading-8">Fast forward to 2019, and we’ve successfully onboarded a 50+ team to support Keller Williams with its transformation and new initiatives..</p>

    <div class=" max-w-2xl border-l-4 border-green-500 my-7 px-10 py-6">
        <h2 class="font-semibold text-2xl lg:text-3xl mb-5">About three years ago we decided that we want to be a technology-independent company. Almost the entire industry was dependent on third-party technology companies. They were building solutions for us outside of our own walls.</h2>
        <h2 class="font-semibold text-2xl lg:text-3xl">We quickly realized that we need to build proprietary software in order to give our agents the best chance to win.</h2>

        <div class=" flex space-x-4 mt-10">
            <div class=" h-12 w-12 ">
                <img class="rounded-full"  src="{{asset('img/icon/Neil_Dholakia.webp')}}" alt="">
            </div>
            <div>
                <h3>Neil Dholakia</h3>
                <p class=" text-gray-400">Chief Product Officer at KW</p>
            </div>
        </div>
    </div>
</div>

<div class="w-11/12 max-w-5xl mx-auto mb-10">
    <img class=" rounded-md" src="{{asset('img/kw_bespoke_art_3.webp')}}" alt="">
</div>

<div class=" w-11/12 max-w-3xl mx-auto py-10 text-lg ">
    <h1 class=" my-10 font-semibold text-4xl ">Design</h1>

    <p class=" my-4 leading-8">As Keller Williams is moving fast, it is becoming crucial for the company to maintain consistency across multiple products. The company aimed to have an even more efficient production process, without losing its speed to market.</p>

    <p class="my-4 leading-8">Together with Keller Williams’ design team, we have started building an entirely new Design System from scratch (more about the importance of design systems here). We are preparing the library (e.g. visual assets, fonts, colours) and UI components to facilitate developers using them across existing products.</p>

    <p class="my-4 leading-8">We’ve helped to improve Command – an all-in-one tool for real estate agents. The main challenge was to build and merge all the functionalities in one place. Other challenges included redesigning the current software, building a wide style guide and design system, sharing knowledge and good practices, co-operating in terms of design (with the Keller Williams in-house design team), building workflows, and participating in building the product roadmap.</p>

    <p class="my-4 leading-8">We’ve also helped with redesigning KW’s major apps such as Kelle, and its newest version.</p>
</div>

<div class="w-11/12 max-w-5xl mx-auto mb-10">
    <img class=" rounded-md" src="{{asset('img/kw_bespoke_art_4.webp')}}" alt="">
</div>

<div class=" w-11/12 max-w-3xl mx-auto py-10 text-lg ">
    <h1 class=" my-10 font-semibold text-4xl ">Software</h1>

    <p class=" my-4 leading-8">Our collaboration with Keller Williams involves all our software expertise.</p>

    <p class="my-4 leading-8">We’ve supported KW’s in-house teams in a slew of projects (Command, Keller Covered, Keller Mortgage) with React Native mobile, GraphQL, Go, React, and Node.js. We provided mobile, frontend, and backend engineers (implementing our designs, among other tasks).</p>

    <p class="my-4 leading-8">Netguru’s FE and BE engineers are currently helping five project teams in KW – working on various components of the Command app, comprehensive software and networking platform for real estate agents aiming to support the growth of their business.</p>

    <p class="my-4 leading-8">Our Node.js and React Native team is working on a new version of the Kelle app, an AI-powered personal assistant that can help KW associates. It translates the core functionalities like Referrals, Contacts, Maps, Notifications, Tasks, and Sales Pipeline from Command (desktop app) to the mobile app, aiming to help the agents do their jobs while on the go.</p>
    <p class="my-4 leading-8">Our experts are also working on a standalone venture by Mr. Keller related to the consumer line – Keller Covered. Keller Covered is a free service for homeowners and homebuyers that helps them to shop for insurance, compare quotes, and choose the insurance that's best for their situation.</p>
</div>

<div class="w-11/12 max-w-5xl mx-auto mb-10">
    <img class=" rounded-md" src="{{asset('img/kw_bespoke_art_4.webp')}}" alt="">
</div>

<div class=" w-11/12 max-w-3xl mx-auto py-10 text-lg ">
    <h1 class=" my-10 font-semibold text-4xl ">Data & AI</h1>

    <p class=" my-4 leading-8">OThe whole industry is heading towards AI-related initiatives, and Keller Williams aims to be at the forefront of that change. All of the company’s major platforms and apps are becoming AI-driven, and we have also supported KW with our data engineering expertise.</p>

    <p class="my-4 leading-8">The data insights are of tremendous assistance both for agents and consumers. For instance, agents can get an estimate of how much more likely their offer will be accepted if they change specific parameters.</p>

    <p class="my-4 leading-8">KW has lots of real estate historical data, and our developers are helping the company to accelerate a project mapping these data into KW’s new listing system.</p>

    <p class="my-4 leading-8">For consumers, the new data project means they can move to the so-called deep-match search based more on their preferences, and not so much on filtering criteria.</p>
</div>

<div class="w-11/12 max-w-5xl mx-auto mb-10 bg-[#CFE2F3] rounded-md p-10">
    <h1 class=" text-5xl text-center text-green-500">"</h1>
    <h1 class=" max-w-2xl mx-auto text-center text-xl lg:text-3xl font-semibold">Netguru has been the best agency we've worked with so far. Your team understands Kelle and is able to design new skills, features, and interactions within our model, with a great focus on speed to market. Netguru has also been great in terms of having the ability to understand how to balance your own design experience and the best design practices with the outcome of the KW Labs sessions.</h1>

    <div class=" text-center mt-9">
        <img class=" w-12 inline" src="{{asset('img/icon/Neil_Dholakia.webp')}}" alt="">
        <h4 class=" text-sm font-semibold mt-4 mb-2">Adi Pavlovic</h4>
        <p class=" text-sm">Director of Innovation at KW</p>
    </div>
</div>

<div class="container mx-auto py-20">
    <h2 class=" text-center font-bold text-3xl mb-7">Read more case studies</h2>
    <p class=" text-center text-gray-500 mb-7">Check out more Netguru projects and success stories.</p>
    <div class=" mb-7">
        <div class=" flex justify-center text-4xl space-x-5 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
              </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
              </svg>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-7">
        <a href="#" class=" col-span-4 group">
            <div class=" overflow-hidden border shadow-sm rounded mb-8 h-52 ">
                <img class=" group-hover:scale-105 transition duration-300" src="{{asset('img/blog-damac-case-study-main.webp')}}" alt="">
            </div>
            <h2 class=" text-xl font-semibold group-hover:text-gray-700 transition ">Boosting Customer Service With a Robust App for Real Estate Agents</h2>
        </a>
        <a href="#" class=" col-span-4 group">
            <div class=" overflow-hidden border shadow-sm rounded mb-8 h-52 ">
                <img class=" group-hover:scale-105 transition duration-300" src="{{asset('img/blog-cover-42136.webp')}}" alt="">
            </div>
            <h2 class=" text-xl font-semibold group-hover:text-gray-700 transition ">Scalable Architecture and API Integrations for a Real Estate Marketplace</h2>
        </a>
        <a href="#" class=" col-span-4 group">
            <div class=" overflow-hidden border shadow-sm rounded mb-8 h-52 ">
                <img class=" group-hover:scale-105 transition duration-300" src="{{asset("img/construction-project.webp")}}" alt="">
            </div>
            <h2 class=" text-xl font-semibold group-hover:text-gray-700 transition ">Development and Product Design of a Project Management Tool</h2>
        </a>
    </div>
</div>

<div class="container mx-auto py-20 bg-[#F2F5F7] px-24 flex flex-wrap justify-between space-y-16 lg:space-y-0">
    <div class=" space-y-10 w-full lg:w-6/12">
        <h1 class=" text-green-500 text-3xl font-semiblod"> N</h1>
        <h2 class=" font-semibold text-3xl">We're Netguru!</h2>
        <p class=" text-gray-600">At Netguru we specialize in designing, building, shipping and scaling beautiful, usable products with blazing-fast efficiency</p>
        <a href="#" class=" bg-green-500 hover:bg-green-300 transition py-2 px-6 inline-block rounded-md ">Let's Talk Buisness</a>
    </div>

    <div class=" w-full lg:w-3/12">
        <p class=" text-right mb-10">TRUSTED BY:</p>
        <div class=" grid grid-cols-12 items-center gap-y-14 ">
            <img class=" col-span-6" src="{{asset("img/icon/keller-williams.svg")}}" alt="">
            <img class=" col-span-6" src="{{asset("img/icon/babbel.svg")}}" alt="">
            <img class=" col-span-6" src="{{asset("img/icon/merck.svg")}}" alt="">
            <img class=" col-span-6" src="{{asset("img/icon/ikea.svg")}}" alt="">
            <img class=" col-span-6" src="{{asset("img/icon/volkswagen.svg")}}" alt="">
            <img class=" col-span-6" src="{{asset("img/icon/ubs.svg")}}" alt="">
        </div>
    </div>
</div>
@endsection
