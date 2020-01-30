-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 08:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprojectdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_sessions`
--

CREATE TABLE `account_sessions` (
  `session_id` varchar(255) NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_sessions`
--

INSERT INTO `account_sessions` (`session_id`, `account_id`, `login_time`) VALUES
('0773gu5lfkqroa2perjgmrrqrh', 18, '2019-12-15 04:16:48'),
('0gvd6lfjhih7v44uhe9le44i4s', 18, '2020-01-07 13:48:13'),
('0hmoga2rqogdsftscsa9qt3jvb', 26, '2019-12-15 04:16:57'),
('1i488155scobtvoms6181um5mt', 18, '2019-11-20 09:24:57'),
('677pha5878ed54m8oivf9cvcql', 13, '2019-11-12 16:06:45'),
('bkkl63igc1olem2kkndlgdeggj', 26, '2019-12-31 11:43:39'),
('eqdgp1sm8r26u3d68mbpcj5gip', 18, '2019-12-24 13:05:55'),
('g34k734e7s29gafndh07lv2p32', 18, '2020-01-30 19:30:11'),
('h395j1hnmr50kianen9u3buh9u', 18, '2020-01-08 11:03:44'),
('n7o0ukll7rban8ckfpterl2sd6', 18, '2019-12-17 08:12:11'),
('qvi2ghbl0e853275cjphg7pb6m', 26, '2020-01-09 15:39:08'),
('vfmp2gc5eqae15792amf2l56hi', 16, '2019-11-02 18:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `text`, `question_id`, `user_id`, `date`) VALUES
(10, 'test', 9, 18, '2019-11-19'),
(12, 'Codecademy. Codecademy is where most people who are new to coding get their start learning programming online, and its reputation is well-deserved. ...freeCodeCamp. ...Coursera. ...edX. ...Codewars. ...GA Dash.Khan Academy. ...MIT OpenCourseware.', 9, 24, '2019-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `text` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `text`) VALUES
(1, '<p>Abstract: Within a few decades, we will likely create AI that a substantial proportion of people believe, whether rightly or wrongly, deserve human-like rights. Given the chaotic state of consciousness science, it will be genuinely difficult to know whether and when machines that seem to deserve human-like moral status actually do deserve human-like moral status. This creates a dilemma: Either give such ambiguous machines human-like rights or don&#39;t. Both options are ethically risky. To give machines rights that they don&#39;t deserve will mean sometimes sacrificing human lives for the benefit of empty shells. Conversely, however, failing to give rights to machines that do deserve rights will mean perpetrating the moral equivalent of slavery and murder. One or another of these ethical disasters is probably in our future.</p>\r\n\r\n<p><a href=\"https://i2.wp.com/www.mentorless.com/wp-content/uploads/2015/04/Monthly-Creative-Menu-TV-Show-Black-Mirror-White-Christmas-Curated-Cultural-Recommendations.jpg?ssl=1\"><img src=\"https://4.bp.blogspot.com/-LA72hc9XH6g/XdHs96HP1BI/AAAAAAAACD0/fy5fo5ZcqWwRdCM8Nruc3a4zGiaTGPoVACLcBGAsYHQ/s320/ToastSlave.jpg\" width=\"320\" /></a><br />\r\n[An AI slave, from Black Mirror&#39;s&nbsp;<a href=\"https://en.wikipedia.org/wiki/White_Christmas_(Black_Mirror)\">White Christmas</a>&nbsp;episode]</p>\r\n\r\n<p>The first half of the talk mostly rehearses ideas from my articles with Mara Garza&nbsp;<a href=\"https://faculty.ucr.edu/~eschwitz/SchwitzAbs/AIRights.htm\">here</a>&nbsp;and&nbsp;<a href=\"https://faculty.ucr.edu/~eschwitz/SchwitzAbs/AIRights2.htm\">here</a>. If we someday build AIs that are fully conscious, just like us, and have all the same kinds of psychological and social features that human beings do, in virtue of which human beings deserve rights, those AIs would deserve the same rights. In fact, we would owe them<a href=\"https://aeon.co/ideas/we-have-greater-moral-obligations-to-robots-than-to-humans\">&nbsp;a special quasi-parental duty of care</a>, due to the fact that we will have been responsible for their existence and probably to a substantial extent for their happy or miserable condition.</p>\r\n\r\n<p><em>Selections from the second half of the talk</em></p>\r\n\r\n<p>So here&rsquo;s what&#39;s going to happen:</p>\r\n\r\n<p>We will create more and more sophisticated AIs.&nbsp;<strong>At some point we will create AIs that&nbsp;<em>some&nbsp;</em>people think are genuinely conscious and genuinely deserve rights.</strong>&nbsp;We are already near that threshold. There&rsquo;s already a Robot Rights movement. There&rsquo;s already a society modeled on the famous animal rights organization PETA (People for the Ethical Treatment of Animals), called&nbsp;<a href=\"http://petrl.org/\">People for the Ethical Treatment of Reinforcement Learners</a>. These are currently fringe movements. But as AI gets cuter and more sophisticated, and as chatbots start sounding more and more like normal humans, passing more and more difficult versions of the Turing Test, these movements will gain steam among the people with liberal views of consciousness. At some point, people will demand serious rights for some AI systems. The AI systems themselves, if they are capable of speech or speechlike outputs, might also demand or seem to demand rights.</p>\r\n\r\n<p>Let me be clear: This will occur whether or not these systems really are conscious. Even if you&rsquo;re very conservative in your view about what sorts of systems would be conscious, you should, I think, acknowledge the likelihood that if technological development continues on its current trajectory there will eventually be groups of people who assert the need for us to give AI systems human-like moral consideration.</p>\r\n\r\n<p>And then we&rsquo;ll need a good, scientifically justified consensus theory of consciousness to sort it out. Is this system that says, &ldquo;Hey, I&rsquo;m conscious, just like you!&rdquo; really conscious, just like you? Or is it just some empty algorithm, no more conscious than a toaster?</p>\r\n\r\n<p>Here&rsquo;s my conjecture:&nbsp;<strong>We will face this social problem before we succeed in developing the good, scientifically justified consensus theory of consciousness that we need to solve the problem.</strong>&nbsp;We will then have machines whose moral status is unclear. Maybe they do deserve rights. Maybe they really are conscious like us. Or maybe they don&rsquo;t. We won&rsquo;t know.</p>\r\n\r\n<p>And then, if we don&rsquo;t know, we face quite a terrible dilemma.</p>\r\n\r\n<p>If we don&rsquo;t give these machines rights, and if turns out that the machines really do deserve rights, then we will be perpetrating slavery and murder every time we assign a task and delete a program.</p>\r\n\r\n<p>So it might seem safer, if there is reasonable doubt, to assign rights to machines. But on reflection, this is not so safe. We want to be able to turn off our machines if we need to turn them off. Futurists like&nbsp;<a href=\"https://www.amazon.com/Superintelligence-Dangers-Strategies-Nick-Bostrom/dp/1501227742\">Nick Bostrom</a>&nbsp;have emphasized, rightly in my view, the potential risks of our letting superintelligent machines loose into the world. These risks are greatly amplified if we too casually decide that such machines deserve rights and that deleting them is murder. Giving an entity rights entails sometimes sacrificing others&rsquo; interests for it. Suppose there&rsquo;s a terrible fire. In one room there are six robots who might or might not be conscious. In another room there are five humans, who are definitely conscious. You can only save one group; the other group will die. If we give robots who might be conscious equal rights with humans who definitely are conscious, then we ought to go save the six robots and let the five humans die. If it turns out that the robots really, underneath it all, are just toasters, then that&rsquo;s a tragedy. Let&rsquo;s not too casually assign humanlike rights to AIs!</p>\r\n\r\n<p>Unless there&rsquo;s either some astounding saltation in the science of consciousness or some substantial deceleration in the progress of AI technology, it&rsquo;s likely that we&rsquo;ll face this dilemma.&nbsp;<strong>Either deny robots rights and risk perpetrating a Holocaust against them, or give robots rights and risk sacrificing real human beings for the benefit of mere empty machines.</strong></p>\r\n\r\n<p>This may seem bad enough, but the problem is even worse than I, in my sunny optimism, have so far let on. I&rsquo;ve assumed that AI systems are relevant targets of moral concern if they&rsquo;re human-grade &ndash; that is, if they are like us in their conscious capacities. But the odds of creating only human-grade AI are slim. In addition to the kind of AI we currently have, which I assume doesn&rsquo;t have any serious rights or moral status, there are, I think, four broad moral categories into which future AI might fall: animal-grade, human-grade, superhuman, and divergent. I&rsquo;ve only discussed human-grade AI so far, but each of these four classes raises puzzles.</p>\r\n\r\n<p><em>Animal-grade AI.</em>&nbsp;Not only human beings deserve moral consideration. So also do dogs, apes, and dolphins. Animal protection regulations apply to all vertebrates: Scientists can&rsquo;t treat even frogs and lizards more roughly than necessary. The philosopher&nbsp;<a href=\"https://link.springer.com/article/10.1007/s13347-013-0122-y\">John Basl</a>&nbsp;has argued that AI systems with cognitive capacities similar to vertebrates ought also to receive similar protections. Just as we shouldn&rsquo;t torture and sacrifice a mouse without excellent reason, so also, according to Basl, we shouldn&rsquo;t abuse and delete animal-grade AI. Basl has proposed that we&nbsp;<a href=\"https://aeon.co/ideas/ais-should-have-the-same-ethical-protections-as-animals\">form committees</a>, modeled on university Animal Care and Use Committees, to evaluate cutting-edge AI research to monitor when we might be starting to cross this line.</p>\r\n\r\n<p><strong>Even if you think human-grade AI is decades away, it seems reasonable given the current chaos in consciousness studies, to wonder whether animal-grade consciousness might be around the corner.</strong>&nbsp;I myself have no idea if animal-grade AI is right around the corner or if it&rsquo;s far away in the almost impossible future. And I think you have no idea either.</p>\r\n\r\n<p><em>Superhuman AI.&nbsp;</em>Superhuman AI, as I&rsquo;m defining it here, is AI who has all of the features of human beings in virtue of which we deserve moral consideration but who also has some potentially morally important features far in excess of the human, raising the question of whether such AI might deserve more moral consideration than human beings.</p>\r\n\r\n<p>There aren&rsquo;t a whole lot of philosophers who are simple utilitarians, but let&rsquo;s illustrate the issue using utilitarianism as an example. According to simple utilitarianism, we morally ought to do what maximizes the overall balance of pleasure to suffering in the world. Now let&rsquo;s suppose we can create AI that&rsquo;s genuinely capable of pleasure and suffering. I don&rsquo;t know what it will take to do that &ndash; but not knowing is part of my point here. Let&rsquo;s just suppose. Now if we can create such AI, then it might also be possible to create AI that is capable of much, much more pleasure than a human being is capable of. Take the maximum pleasure you have ever felt in your life over the course of one minute: call that amount of pleasure X. This AI is capable of feeling a billion times more pleasure than X in the space of that same minute. It&rsquo;s a superpleasure machine!</p>\r\n\r\n<p>If morality really demands that we should maximize the amount of pleasure in the world, it would thereby demand, or seem to demand, that we create as many of these superpleasure machines as we possibly can.&nbsp;<a href=\"https://www.nature.com/articles/503562a\">We ought maybe even immiserate and destroy ourselves to do so, if enough AI pleasure is created as a result.</a></p>\r\n\r\n<p>Even if you think pleasure isn&rsquo;t everything &ndash; surely it&rsquo;s something. If someday we could create superpleasure machines, maybe we morally ought to make as many as we can reasonably manage? Think of all the joy we will be bringing into the world! Or is there something too weird about that?</p>\r\n\r\n<p>I&rsquo;ve put this point in terms of pleasure &ndash; but whatever the source of value in human life is,&nbsp;<strong>whatever it is that makes us so awesomely special that we deserve the highest level of moral consideration</strong>&nbsp;&ndash; unless maybe we go theological and appeal to our status as God&rsquo;s creations &ndash; whatever it is, it seems possible in principle that&nbsp;<strong>we could create that same thing in machines, in much larger quantities.</strong>&nbsp;We love our rationality, our freedom, our individuality, our independence, our ability to value things, our ability to participate in moral communities, our capacity for love and respect &ndash; there are lots of wonderful things about us! What if we were to design machines that somehow had a lot more of these things that we ourselves do?</p>\r\n\r\n<p>We humans might not be the pinnacle. And if not, should we bow out, allowing our interests and maybe our whole species to be sacrificed for something greater? As much as I love humanity, under certain conditions I&rsquo;m inclined to think the answer should probably be yes. I&rsquo;m not sure what those conditions would be!</p>\r\n\r\n<p><em>Divergent AI.</em>&nbsp;<strong>The most puzzling case, I think, as well as the most likely, is divergent AI. Divergent AI would have human or superhuman levels of some features that we tend to regard as important to moral status but subhuman levels of other features that we tend to regard as important to moral status</strong>. For example, it might be possible to design AI with immense theoretical and practical intelligence but with no capacity for genuine joy or suffering. Such AI might have conscious experiences with little or no emotional valence. Just as we can consciously think to ourselves, without much emotional valence, there&rsquo;s a mountain over there and a river over there, or the best way to grandma&rsquo;s house at rush hour is down Maple Street, so this divergent AI could have conscious thoughts like that. But it would never feel wow, yippee! And it would never feel crushingly disappointed, or bored, or depressed. It isn&rsquo;t clear what the moral status of such an entity would be: On some moral theories, it would deserve human-grade rights; on other theories it might not matter how we treat it.</p>\r\n\r\n<p>Or consider the converse: a superpleasure machine but one with little or no capacity for rational thought. It&rsquo;s like one giant, irrational orgasm all day long. Would it be great to make such things and terrible to destroy them, or is such irrational pleasure not really something worth much in the moral calculus?</p>\r\n\r\n<p>Or consider a third type of divergence, what I&rsquo;ve elsewhere called&nbsp;<a href=\"http://schwitzsplinters.blogspot.com/2014/03/our-moral-duties-to-monsters.html\">fission-fusion monsters</a>. A fission-fusion monster is an entity that can divide and merge at will. It starts, perhaps, as basically a human-grade AI. But when it wants it can split into a million descendants, each of whom inherits all of the capacities, memories, plans, and preferences of the original AI. These million descendants can then go about their business, doing their independent things for a while, and then if they want, merge back together again into a unified whole, remembering what each individual did during its period of individuality. Other parts might not merge back but choose instead to remain as independent individuals, perhaps eventually coming to feel independent enough from the original to see the prospect of merging as something similar to death.</p>\r\n\r\n<p>Without getting into details here, a fission-fusion monster would risk breaking our concept of individual rights &ndash; such as one person, one vote. The idea of individual rights rests fundamentally upon the idea of people as individuals &ndash; individuals who live in a single body for a while and then die, with no prospect of splitting or merging. What would happen to our concept of individual rights if we were to share the planet with entities for which our accustomed model of individuality is radically false?</p>\r\n'),
(2, '<p>There are&nbsp;<a href=\"https://plato.stanford.edu/entries/happiness/\">several different ways</a>&nbsp;of thinking about happiness. I want to focus on just one of those ways. This way of thinking about happiness is sometimes called &ldquo;hedonic&rdquo;. That label can be misleading if you&rsquo;re not used to it because it kind of sounds like hedonism, which kind of sounds like wild sex parties. The hedonic account of happiness, though, is probably closest to most people&rsquo;s ordinary understanding of happiness. On this account, to be happy is to have lots of positive emotions and not too many negative emotions. To be happy is to regularly feel joy, delight, and pleasure, to feel sometimes maybe a pleasant tranquility and sometimes maybe outright exuberance, to have lots of good feelings about your life and your situation and what&rsquo;s going on around you &ndash; and at the same time not to have too many emotions like sadness, fear, anxiety, anger, disgust, displeasure, annoyance, and frustration, what we think of as &ldquo;negative emotions&rdquo;. To be happy, on this &ldquo;hedonic&rdquo; account, is to be in an overall positive emotional state of mind.</p>\r\n\r\n<p>I wouldn&rsquo;t want to deny that it&rsquo;s a good thing to be happy in this sense. It is, for the most part, a good thing. But sometimes people say extreme things about happiness &ndash; like that happiness is the most important thing, or that all people really want is to be happy, or as a parent that the main thing you want for your children is that they be happy, or that everything everyone does is motivated by some deep-down desire to maximize their happiness. And that&rsquo;s not right at all.&nbsp;<strong>We actually don&rsquo;t care about our hedonic happiness very much.</strong>&nbsp;Not really. Not when you think about it. It&rsquo;s kind of important, but not really that big in the scheme of things.</p>\r\n\r\n<p>Consider an extreme thought experiment of the sort that philosophers like me enjoy bothering people with. Suppose we somehow found a way to turn the entire Solar System into one absolutely enormous machine or organism that&nbsp;<a href=\"https://www.goodreads.com/quotes/1413237-consider-an-ai-that-has-hedonism-as-its-final-goal\">experienced nothing but outrageous amounts of pleasure all the time</a>. Every particle of matter that we have, we feed into this giant thing &ndash; let&rsquo;s call it the orgasmatron. We create the most extreme, most consistent, most intense conglomeration of pure ecstatic joyfulness as it is possible to construct. Wow! Now that would be pretty amazing. One huge, pulsing Solar-System-sized orgasm.</p>\r\n\r\n<p>Will this thing need to remember the existence of humanity? Will it need to have any appreciation of art or beauty? Will it have to have any ethics, or any love, or any sociality, or knowledge of history or science &ndash; will it need any higher cognition at all? Maybe not. I mean higher cognition is not what orgasm is mostly about. If you think that the thing that matters most in the universe is positive emotions, then you might think that the best thing that could happen to the future of the Solar System would be the creation of this giant orgasmatron. The human project would be complete. The world will have reached its pinnacle and nothing else really matters!</p>\r\n\r\n<p><a href=\"https://1.bp.blogspot.com/-LClC1AW4O5A/Xc2Dm422eWI/AAAAAAAACDg/qvYFuYvBjKokTD_3N07ht6RCqVQBM_1nACLcBGAsYHQ/s1600/Orgasmatron.jpg\"><img src=\"https://1.bp.blogspot.com/-LClC1AW4O5A/Xc2Dm422eWI/AAAAAAAACDg/qvYFuYvBjKokTD_3N07ht6RCqVQBM_1nACLcBGAsYHQ/s320/Orgasmatron.jpg\" width=\"224\" /></a>[not the orgasmatron I have in mind]</p>\r\n\r\n<p>Now here&rsquo;s my guess. Some of you will think, yeah, that&rsquo;s right. If everything becomes a giant orgasmatron, nothing could be more awesome, that&rsquo;s totally where we should go if we can. But I&rsquo;ll guess that most of you think that something important would be lost. Positive emotion isn&rsquo;t the only thing that matters. We don&rsquo;t want the world to lose its art, and its beauty, and its scientific knowledge, and the rich complexity of human relationships. If everything got fed into this orgasmatron it would be a shame. We&rsquo;d have lost something really important. Now let me tell you a story. It&rsquo;s from my latest book,&nbsp;<a href=\"https://mitpress.mit.edu/books/theory-jerks-and-other-philosophical-misadventures\">A Theory of Jerks and Other Philosophical Misadventures</a>, hot off the press this month.</p>\r\n\r\n<p>Back in the 1990s, when I was a graduate student, my girlfriend Kim asked me what, of all things, I most enjoyed doing. Skiing, I answered. I was thinking of those moments breathing the cold, clean air, relishing the mountain view, then carving a steep, lonely slope. I&rsquo;d done quite a bit of that with my mom when I was a teenager. But how long had it been since I&rsquo;d gone skiing? Maybe three years? Grad school kept me busy and I now had other priorities for my winter breaks. Kim suggested that if it had been three years since I&rsquo;d done what I most enjoyed doing, then maybe I wasn&rsquo;t living wisely.</p>\r\n\r\n<p>Well, what, I asked, did she most enjoy? Getting massages, she said. Now, the two of us had a deal at the time: If one gave the other a massage, the recipient would owe a massage in return the next day. We exchanged massages occasionally, but not often, maybe once every few weeks. I pointed out that she, too, might not be perfectly rational: She could easily get much more of what she most enjoyed simply by giving me more massages. Surely the displeasure of massaging my back couldn&rsquo;t outweigh the pleasure of the thing she most enjoyed in the world? Or was pleasure for her such a tepid thing that even the greatest pleasure she knew was hardly worth getting?</p>\r\n\r\n<p>It used to be a truism in Western (especially British) philosophy that people sought pleasure and avoided pain. A few old-school&nbsp;<a href=\"https://plato.stanford.edu/entries/hedonism/#PsyHed\">psychological hedonists</a>, like Jeremy Bentham, went so far as to say that that was all that motivated us. I&rsquo;d guess quite differently:&nbsp;<strong>Although pain is moderately motivating, pleasure motivates us very little. What motivates us more are outward goals, especially socially approved goals &mdash; raising a family, building a career, winning the approval of peers &mdash; and we will suffer immensely, if necessary, for these things.</strong>&nbsp;Pleasure might bubble up as we progress toward these goals, but that&rsquo;s a bonus and side effect, not the motivating purpose, and summed across the whole, the displeasure might vastly outweigh the pleasure.&nbsp;<a href=\"https://www.psychologytoday.com/us/blog/the-happiness-doctor/201709/does-having-children-make-us-happy\">Some evidence</a>&nbsp;suggests, for example, that raising a child is probably for most people a hedonic net negative, adding stress, sleep deprivation, and unpleasant chores, as well as crowding out the pleasures that childless adults regularly enjoy. At least according to some research, the odds are that choosing to raise a child will make you less happy.</p>\r\n\r\n<p>Have you ever watched a teenager play a challenging video game? Frustration, failure, frustration, failure, slapping the console, grimacing, swearing, more frustration, more failure&mdash;then finally, woo-hoo! The sum over time has to be negative, yet they&rsquo;re back again to play the next game. For most of us, biological drives and addictions, personal or socially approved goals, concern for loved ones, habits and obligations &mdash; all appear to be better motivators than gaining pleasure, which we mostly seem to save for the little bit of free time left over. And to me, this is quite right and appropriate. I like pleasure, sure.&nbsp;<strong>I like joy. But that&rsquo;s not what I&rsquo;m after.</strong>&nbsp;It&rsquo;s a side effect, I hope, of the things I really care about. I&rsquo;d guess this is true of you too.</p>\r\n\r\n<p>If maximizing pleasure is central to living well and improving the world, we&rsquo;re going about it entirely the wrong way. Do you really want to maximize pleasure? I doubt it. Me, I&rsquo;d rather write some good philosophy and raise my kids.</p>\r\n\r\n<p><em>ETA, Nov 17:</em></p>\r\n\r\n<p>In audience discussion and in social media, several people have pointed out although I start by talking about a wide range of emotional states (tranquility, delight, having good feelings about your life situation), in the second half I focus exclusively on pleasure. The case of pleasure is easiest to discuss, because the more complex emotional states have more representational or world-involving components. On a proper hedonic view, the value of those more complex states, however, rests exclusively on the emotional valence or at most on the emotional valence plus possibly-false representational content -- on, for example, whether you have the&nbsp;<em>feeling</em>&nbsp;that life is going well, rather than on whether it&#39;s really going well. All the same observations apply: We do and should care about whether our lives are actually going well, much more than we care about whether we have the emotional feeling of its going well.</p>\r\n'),
(4, '<p>In a&nbsp;<a href=\"https://psyarxiv.com/9gux6/\">fascinating new paper</a>&nbsp;(forthcoming in&nbsp;<em>Psychological Science</em>), Jessie Sun and Geoffrey Goodwin asked undergraduate students in psychology to rate themselves on several moral and non-moral dimensions, and they asked those same students to nominate &quot;informants&quot; who knew them well to rate them along the same dimensions. Non-moral traits included, for example, energy level (&quot;being full of energy&quot;) and intellectual curiosity (&quot;being curious about many different things&quot;). Moral traits included specific traits such as fairness (&quot;being a fair person&quot;) but also included self-ratings of overall morality (&quot;being a person of strong moral character&quot; and &quot;acting morally&quot;). They then asked both the target participants and their informants to express the extent to which they aimed to change these facts about themselves (e.g., &quot;I want to be helpful and unselfish with others...&quot; or &quot;I want [target&#39;s name] to be helpful and unselfish with others...&quot;) from -2 (&quot;much less than I currently am&quot;) to +2 (&quot;much more than I currently am&quot;).</p>\r\n\r\n<p>Before I spill the beans, any guesses?</p>\r\n\r\n<p>I&#39;ve already got some horses in this race. Based partly on&nbsp;<a href=\"https://www.simine.com/docs/Vazire_JPSP_2010.pdf\">Simine Vazire&#39;s work</a>, partly on my general life experience, and partly on theoretical reflections about the semi-paradoxical nature of self-evaluations of&nbsp;<a href=\"https://aeon.co/essays/so-you-re-surrounded-by-idiots-guess-who-the-real-jerk-is\">jerkitude</a>&nbsp;and&nbsp;<a href=\"http://schwitzsplinters.blogspot.com/2017/11/a-moral-dunning-kruger-effect.html\">general moral character</a>, I have speculated that we should see little to no relationship between self-evaluations of general moral character and one&#39;s actual moral character. Also, based partly on recent work in social psychology and behavioral economics by&nbsp;<a href=\"https://en.wikipedia.org/wiki/Robert_Cialdini\">Cialdini</a>,&nbsp;<a href=\"https://global.oup.com/academic/product/norms-in-the-wild-9780190622053\">Bicchieri</a>, and others, and partly again on general life experience, I have conjectured that most people&nbsp;<a href=\"https://faculty.ucr.edu/~eschwitz/SchwitzAbs/MoralMediocrity.htm\">aim for moral mediocrity</a>.</p>\r\n\r\n<p>You will be unsurprised, I suppose, to hear that I interpret Sun and Goodwin&#39;s results as broadly confirmatory of these predictions.</p>\r\n\r\n<p>To me, perhaps their most striking result -- though not Sun&#39;s and Goodwin&#39;s own point of emphasis -- is the almost non-existent correlation between self-ratings of general morality and informant ratings of general morality. Neither of their two samples of about 300-600 participants per group showed a statistically detectable relationship (there was a weak positive trend: r = .15 &amp; .10, n.s). Self-ratings of some specific moral traits -- honesty, fairness, and loyalty -- also showed at best weak correlations with spotty statistical significance (r = 0 to .3, none significant in both samples). However, other specific moral traits showed better correlations (purity, compassion, and responsibility, r = .2 to .5 in both samples).</p>\r\n\r\n<p>In other words, Sun and Goodwin find basically&nbsp;<strong>no statistically detectable relationship between how morally good you say you are, and how honest and fair and loyal you say you are, and what your closest friends and family say about you.</strong></p>\r\n\r\n<p>Could the informants be wrong and the self-ratings correct? Well, of course! That thing I did that&nbsp;<em>seemed</em>&nbsp;immoral, unfair, and dishonest... of course, it wasn&#39;t nearly as bad as it seemed. In fact it was good! But only I fully appreciate that, since only I know the full details of the situation. Informants might underestimate my moral character. (If this sounds like suspicious self-exculpation, well, at least sometimes our moral excuses have merit.)</p>\r\n\r\n<p>Alternatively, close friends and family might overestimate my moral character: The people who know me well who I nominate for a study like this might cut me more slack than I deserve. I might rightly be hard on myself for the dishonest things I&#39;ve done that they don&#39;t know about or know about but forgive; or maybe they don&#39;t want to express their true middling opinion of the target participants in a study like this. Likely, something like this is going on in these data: Overall, informants gave higher moral ratings to target participants than the target participants gave to themselves -- practically at ceiling (mean 4.5 and 4.4 on a 1-5 scale, compared to 4.0 in the targets&#39; self-ratings). Maybe this reflects the way the informants were chosen and how they were prompted to respond.</p>\r\n\r\n<p>Without a general moralometer, or even observational data about plausibly moral or immoral behavior, it&#39;s hard to know how accurate such self- and other-ratings are. Nonetheless, the discorrelation is striking. While &quot;people who know you well&quot; might easily be wrong about your moral character, you might think that, if anything, participants would tend to nominate informants whose views of them align with their own self-conceptions (their best friends and favorite family members), in which case any error would tend to be on the side of overcorrelation rather than undercorrelation. The lack of correlation suggests an abundance of moral disagreement and error&nbsp;<em>somewhere</em>. My guess would be&nbsp;<em>everywhere</em>, with ample problems on both sides, for multiple reasons. Moral self-assessment is hard, and friend-assessment is at least dicey.</p>\r\n\r\n<p>This isn&#39;t a&nbsp;<em>general&nbsp;</em>problem in the Sun and Goodwin data. The self-ratings and informant ratings of non-moral traits generally showed good correlations (mostly r = .5 to .7, p &lt; .001) -- including for seemingly mushy traits like &quot;aesthetic sensitivity&quot; and &quot;trust&quot;.</p>\r\n\r\n<p>How about the moral mediocrity thesis?&nbsp;<strong>Do people generally express a strong desire to improve morally? Not in Sun and Goodwin&#39;s data.&nbsp;</strong>Respondents tended to prioritize reducing negative emotionality (e.g., depression, anxiety) and improving achievement (productiveness, creative imagination). Moral improvement appeared near the bottom of their list of goals. Given the opportunity to choose their three top goals among 21 possible general self-improvement goals of this sort, only 3% of target respondents ranked general moral improvement among those three. People who rated themselves comparatively high in moral traits gave even lower priority to moral self improvement than people who rated themselves comparatively lower, suggesting that they are especially likely see themselves as already morally &quot;good enough&quot; -- even if, as I&#39;m inclined to think, such self-ratings of morality are almost completely uncorrelated with genuine morality.</p>\r\n\r\n<p><a href=\"https://4.bp.blogspot.com/-6mboFY_jtNg/XaemYKhXLeI/AAAAAAAACAQ/ny8KYtyK6TsIO55UFSF7rGzbiIqUJR4GgCLcBGAsYHQ/s1600/SunGoodwin2019.jpg\"><img src=\"https://4.bp.blogspot.com/-6mboFY_jtNg/XaemYKhXLeI/AAAAAAAACAQ/ny8KYtyK6TsIO55UFSF7rGzbiIqUJR4GgCLcBGAsYHQ/s320/SunGoodwin2019.jpg\" width=\"320\" /></a></p>\r\n\r\n<p>[Detail of Figure 2, from Sun &amp; Goodwin 2019; click to enlarge]</p>\r\n\r\n<p>One thing that Sun and Goodwin did not ask about, which might have been interesting to see, is whether people would express willingness to trade away moral traits for desirable non-moral traits: If they could become more creative and less anxious at the cost of becoming less honest and less morally good overall, would they? I&#39;m not sure I would trust self-reports about this... but I&#39;d at least be curious to ask.</p>\r\n\r\n<p>In their deeds, as revealed by the choices they make and the discussions they choose to have and not have and the goals they choose to pursue, people tend to show little interest in accurate moral self-assessment or in general moral self-improvement above a minimal, mediocre standard. In my experience, if asked explicitly, people won&#39;t typically own up to this. But maybe, as suggested by Sun&#39;s and Goodwin&#39;s data, they will admit it implicitly, or admit to pieces of it explicitly, if asked in the right kind of way.</p>\r\n'),
(13, '<p><a href=\"https://2.bp.blogspot.com/-AP5HKqxsOqM/XZc1mot7MDI/AAAAAAAAB-Y/D3E9OVD0vAELxPCSjPsfXisadpCIqwb8wCLcBGAsYHQ/s1600/CommonGround2.jpg\"><img src=\"https://2.bp.blogspot.com/-AP5HKqxsOqM/XZc1mot7MDI/AAAAAAAAB-Y/D3E9OVD0vAELxPCSjPsfXisadpCIqwb8wCLcBGAsYHQ/s200/CommonGround2.jpg\" width=\"150\" /></a></p>\r\n\r\n<p>What is it reasonable to hope for from a philosophical argument?</p>\r\n\r\n<p><em>Soundness</em>&nbsp;would be nice -- a true conclusion that logically follows from true premises. But soundness isn&#39;t enough. Also, in another way, soundness is sometimes too much to demand.</p>\r\n\r\n<p>To see why soundness isn&#39;t enough, consider this argument:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Premise: Snails have conscious sensory experiences, and ants have conscious sensory experiences.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Conclusion: Therefore, snails have conscious sensory experiences.</p>\r\n\r\n<p>The argument is valid: The conclusion follows from the premises. For purposes of this post, let&#39;s assume that premise, about snails and ants, is also true and that the philosopher advancing the argument knows it to be true. If so, then the argument is sound and known to be so by the person advancing it. But it doesn&#39;t really work as an argument, since anyone who isn&#39;t already inclined to believe the conclusion won&#39;t be inclined to believe the premise. This argument isn&#39;t going to win anyone over.</p>\r\n\r\n<p><strong>So soundness isn&#39;t sufficient for argumentative excellence. Nor is it necessary.</strong>&nbsp;An argument can be excellent if the conclusion is strongly suggested by the premises, despite lacking the full force of logical validity. That the Sun has risen many times in a regular way and that its doing so again tomorrow fits with our best scientific models of the Solar System is an excellent argument that it will rise again tomorrow, even though the conclusion isn&#39;t a 100% logical certainty given the premises.</p>\r\n\r\n<p>What then, should we want from a philosophical argument?</p>\r\n\r\n<p>First, let me suggest that&nbsp;<strong>a good philosophical argument needs a&nbsp;<em>target audience</em></strong>, the expected consumers of the argument. For academic philosophical arguments, the target audience would presumably include other philosophers in one&#39;s academic community who specialize in the subarea. It might also include a broader range of academic philosophers or some segment of the general public.</p>\r\n\r\n<p>Second,&nbsp;<strong>an excellent philosophical argument should be such that the target audience&nbsp;<em>ought to be moved</em>&nbsp;by the argument.</strong>&nbsp;Unpacking &quot;ought to be moved&quot;: A good argument ought to incline members of its target audience who began initially neutral or negative concerning its conclusion to move in the direction of endorsing its conclusion. Also, members of its target audience antecedently inclined in favor of the conclusion ought to feel that the argument provides good support for the conclusion, reinforcing their confidence in the conclusion.</p>\r\n\r\n<p>I intend this standard to be a&nbsp;<em>normative&nbsp;</em>standard, rather than a psychological standard. Consumers of the argument&nbsp;<em>ought</em>&nbsp;to be moved. Whether they are&nbsp;<em>actually&nbsp;</em>moved is another question. People -- even, sad to say, academic philosophers! -- are often stubborn, biased, dense, and careless. They might not actually be moved even if they ought to be moved. The blame for that is on them, not on the argument.</p>\r\n\r\n<p>I intend this standard as an imperfect generalization: It must be the case that&nbsp;<em>generally&nbsp;</em>the target audience ought to be moved. But if some minority of the target audience ought not to be moved, that&#39;s consistent with excellence of argument. One case would be an argument that assumes as a premise something widely taken for granted by the target audience (and reasonably so) but which some minority portion of the target audience does not, for their own good reasons, accept.</p>\r\n\r\n<p>I intend this standard to require only&nbsp;<em>movement</em>, not full endorsement: If some audience members initially have a credence of 10% in the conclusion and they are moved to a 35% credence after exposure to the argument, they have been moved. Likewise, someone whose credence is already 60% before reading the argument is moved in the relevant sense if they rationally increase their credence to 90% after exposure to the argument. But &quot;movement&quot; in the sense needn&#39;t be understood wholly in terms of credence. Some philosophical conclusions aren&#39;t so much true or false as endorseable in some other way -- beautiful, practical, appealing, expressive of a praiseworthy worldview. Movement toward endorsement on those grounds should also count as movement in the relevant sense.</p>\r\n\r\n<p>You might think that this standard -- that the target audience ought to be moved -- is too much to demand from a philosophical argument. Hoping that one&#39;s arguments are good enough to change reasonable people&#39;s opinions is maybe a lot to hope for. But (perhaps stubbornly?) I do hope for it. A good, or at least an excellent, philosophical argument should move its audience. If you&#39;re only preaching to the choir, what&#39;s the point?</p>\r\n\r\n<p>In his preface to Consciousness and Experience, William G. Lycan writes</p>\r\n\r\n<blockquote>In 1987... I published a work entitled&nbsp;<em>Consciousness</em>. In it I claimed to have saved the materialist view of human beings from all perils.... But not everyone has been convinced. In most cases this is due to plain pigheadedness. But in others its results from what I now see to have been badly compressed and cryptic exposition, and in still others it is articulately grounded in a peril or two that I inadvertently left unaddressed (1996, p. xii).</blockquote>\r\n\r\n<p>I interpret Lycan&#39;s preface as embracing something like my standard -- though with the higher bar of convincing the audience rather than moving the audience. Note also that Lycan&#39;s standard appears to be normative. There may be no hope of convincing the pigheaded; the argument need not succeed in that task to be excellent.</p>\r\n\r\n<p>So, when I write about&nbsp;<a href=\"https://faculty.ucr.edu/~eschwitz/SchwitzAbs/AccountBel.htm\">the nature of belief</a>, for example, I hope that reasonable academic philosophers who are not too stubbornly committed to alternative views, will find themselves moved in the direction of thinking that a dispositional approach (on which belief is at least as much about walking the walk as talking the talk) will be moved toward dispositionalism -- and I hope that other dispositionalists will feel reinforced in their inclinations. The target audience will feel the pull of the arguments. Even if they don&#39;t ultimately endorse my approach to belief, they will, I hope, be less averse to it than previously. Similarly, when I defend the view that&nbsp;<a href=\"https://faculty.ucr.edu/~eschwitz/SchwitzAbs/USAconscious.htm\">the United States might literally be conscious</a>, I hope that the target audience of materialistically-inclined philosophers will come to regard the group consciousness of a nation as less absurd than they probably initially thought. That would be movement!</p>\r\n\r\n<p>Recently, I have turned my attention to&nbsp;<a href=\"https://faculty.ucr.edu/~eschwitz/SchwitzAbs/Snails.htm\">the consciousness, or not, of garden snails</a>. Do garden snails have a real stream of conscious experience, like we normally assume that dogs and ravens have? Or is there &quot;nothing it&#39;s like&quot; to be a garden snail, in the way we normally assume there&#39;s nothing it&#39;s like to be a pine tree or a toy robot? In thinking about this question, I find myself especially struck by what I&#39;ll call The Common Ground Problem.</p>\r\n\r\n<p><strong>The Common Ground Problem is this.</strong>&nbsp;To get an argument going, you need some common ground with your intended audience. Ideally, you start with some shared common ground, and then maybe you also introduce factual considerations from science or elsewhere that you expect they will (or ought to) accept, and then you deliver the conclusion that moves them your direction. But&nbsp;<strong>on the question of animal consciousness specifically, people start so far apart that finding enough common ground to reach most of the intended audience becomes a substantial problem, maybe even an insurmountable problem.</strong></p>\r\n\r\n<p>I can illustrate the problem by appealing to extreme cases; but I don&#39;t think the problem is limited to extreme cases.</p>\r\n\r\n<p><a href=\"https://plato.stanford.edu/entries/panpsychism/\">Panpsychists</a>&nbsp;believe that consciousness is ubiquitous. That&#39;s an extreme view on one end. Although not every panpsychist would believe that garden snails are conscious (they might think, for example, that subparts of the snail are conscious but not the snail as a whole), let&#39;s imagine a panpsychist who acknowledges snail consciousness. On the other end, some philosophers, such as&nbsp;<a href=\"https://www.sciencedirect.com/science/article/pii/S1053810018300370?via%3Dihub\">Peter Carruthers</a>, argue that even dogs might not be (determinately) conscious. Now let&#39;s assume that you want to construct an argument for (or against) the consciousness of garden snails. If your target audience includes the whole range of philosophers from panpsychists to people with very restrictive views about consciousness like Carruthers, it&#39;s very hard to see how you speak to that whole range of readers. What kind of argument could you mount that would reasonably move a target audience with such a wide spread of starting positions?</p>\r\n\r\n<p><strong>Arguments about animal consciousness seem always to&nbsp;<em>start already</em>&nbsp;from a set of assumptions about consciousness</strong>&nbsp;(this kind of test would be sufficient, this other kind not; this thing is an essential feature of consciousness, the other thing not). The arguments will generally beg the question against audience members who start out with views too far away from one&#39;s own starting points.</p>\r\n\r\n<p>How many issues in philosophy have this kind of problem? Not all, I think! In some subareas, there are excellent arguments that can or should move, even if not fully convince, most of the target audience. Animal consciousness is, I suspect, unusual (but probably not unique) in its degree of intractability, and in the near-impossibility of constructing an argument that is excellent by the standard I have articulated.</p>\r\n');
INSERT INTO `article` (`article_id`, `text`) VALUES
(15, '<p>There&rsquo;s something I don&rsquo;t like about the &lsquo;Golden Rule&rsquo;, the admonition to do unto others as you would have others do unto you. Consider this passage from the ancient Chinese philosopher Mengzi (Mencius):</p>\r\n\r\n<blockquote>That which people are capable of without learning is their genuine capability. That which they know without pondering is their genuine knowledge. Among babes in arms there are none that do not know to love their parents. When they grow older, there are none that do not know to revere their elder brothers. Treating one&rsquo;s parents as parents is benevolence. Revering one&rsquo;s elders is righteousness. There is nothing else to do but extend these to the world.</blockquote>\r\n\r\n<p>One thing I like about the passage is that it assumes love and reverence for one&rsquo;s family as a given, rather than as a special achievement. It portrays moral development simply as a matter of extending that natural love and reverence more widely.</p>\r\n\r\n<p><a href=\"https://aeon.co/ideas/how-mengzi-came-up-with-something-better-than-the-golden-rule\"><img src=\"https://3.bp.blogspot.com/-8vhkWHGjmJ0/XbxdrwlYQMI/AAAAAAAACBs/J89RFY_CIJY0qVGAvZ6CooFappd-IscegCLcBGAsYHQ/s320/GoldenRule.jpg\" width=\"320\" /></a></p>\r\n\r\n<p>In another passage, Mengzi notes the kindness that the vicious tyrant King Xuan exhibits in saving a frightened ox from slaughter, and he urges the king to extend similar kindness to the people of his kingdom. Such extension, Mengzi says, is a matter of &lsquo;weighing&rsquo; things correctly &ndash; a matter of treating similar things similarly, and not overvaluing what merely happens to be nearby. If you have pity for an innocent ox being led to slaughter, you ought to have similar pity for the innocent people dying in your streets and on your battlefields, despite their invisibility beyond your beautiful palace walls.</p>\r\n\r\n<p>Mengzian extension starts from the assumption that you are already concerned about nearby others, and takes the challenge to be extending that concern beyond a narrow circle. The Golden Rule works differently &ndash; and so too the common advice to imagine yourself in someone else&rsquo;s shoes. In contrast with Mengzian extension, Golden Rule/others&rsquo; shoes advice assumes self-interest as the starting point, and implicitly treats overcoming egoistic selfishness as the main cognitive and moral challenge.</p>\r\n\r\n<p>Maybe we can model Golden Rule/others&rsquo; shoes thinking like this:</p>\r\n\r\n<ol>\r\n	<li>If I were in the situation of person&nbsp;<em>x</em>, I would want to be treated according to principle&nbsp;<em>p</em>.</li>\r\n	<li>Golden Rule: do unto others as you would have others do unto you.</li>\r\n	<li>Thus, I will treat person&nbsp;<em>x</em>&nbsp;according to principle&nbsp;<em>p</em>.</li>\r\n</ol>\r\n\r\n<p>And maybe we can model Mengzian extension like this:</p>\r\n\r\n<ol>\r\n	<li>I care about person&nbsp;<em>y</em>&nbsp;and want to treat that person according to principle&nbsp;<em>p</em>.</li>\r\n	<li>Person&nbsp;<em>x</em>, though perhaps more distant, is relevantly similar.</li>\r\n	<li>Thus, I will treat person&nbsp;<em>x</em>&nbsp;according to principle&nbsp;<em>p</em>.</li>\r\n</ol>\r\n\r\n<p>There will be other more careful and detailed formulations, but this sketch captures the central difference between these two approaches to moral cognition. Mengzian extension models general moral concern on the natural concern we already have for people close to us, while the Golden Rule models general moral concern on concern for oneself.</p>\r\n\r\n<p>I&nbsp;like Mengzian extension better for three reasons. First, Mengzian extension is more psychologically plausible as a model of moral development. People do, naturally, have concern and compassion for others around them. Explicit exhortations aren&rsquo;t needed to produce this natural concern and compassion, and these natural reactions are likely to be the main seed from which mature moral cognition grows. Our moral reactions to vivid, nearby cases become the bases for more general principles and policies. If you need to reason or analogise your way into concern even for close family members, you&rsquo;re already in deep moral trouble.</p>\r\n\r\n<p>Second, Mengzian extension is less ambitious &ndash; in a good way. The Golden Rule imagines a leap from self-interest to generalised good treatment of others. This might be excellent and helpful advice, perhaps especially for people who are already concerned about others and thinking about how to implement that concern. But Mengzian extension has the advantage of starting the cognitive project much nearer the target, requiring less of a leap. Self-to-other is a huge moral and ontological divide. Family-to-neighbour, neighbour-to-fellow citizen &ndash; that&rsquo;s much less of a divide.</p>\r\n\r\n<p>Third, you can turn Mengzian extension back on yourself, if you are one of those people who has trouble standing up for your own interests &ndash; if you&rsquo;re the type of person who is excessively hard on yourself or who tends to defer a bit too much to others. You would want to stand up for your loved ones and help them flourish. Apply Mengzian extension, and offer the same kindness to yourself. If you&rsquo;d want your father to be able to take a vacation, realise that you probably deserve a vacation too. If you wouldn&rsquo;t want your sister to be insulted by her spouse in public, realise that you too shouldn&rsquo;t have to suffer that indignity.</p>\r\n\r\n<p>Although Mengzi and the 18th-century French philosopher Jean-Jacques Rousseau both endorse mottoes standardly translated as &lsquo;human nature is good&rsquo; and have views that are similar in important ways, this is one difference between them. In both&nbsp;<em>Emile</em>&nbsp;(1762) and&nbsp;<em>Discourse on Inequality</em>&nbsp;(1755), Rousseau emphasises self-concern as the root of moral development, making pity and compassion for others secondary and derivative. He endorses the foundational importance of the Golden Rule, concluding that &lsquo;love of men derived from love of self is the principle of human justice&rsquo;.</p>\r\n\r\n<p>This difference between Mengzi and Rousseau is not a general difference between East and West. Confucius, for example, endorses something like the Golden Rule in the&nbsp;<em>Analects</em>: &lsquo;Do not impose on others what you yourself do not desire.&rsquo; Mozi and Xunzi, also writing in China in the period, imagine people acting mostly or entirely selfishly until society artificially imposes its regulations, and so they see the enforcement of rules rather than Mengzian extension as the foundation of moral development. Moral extension is thus specifically Mengzian rather than generally Chinese.</p>\r\n\r\n<p>Care about me not because you can imagine what you would selfishly want if you were me. Care about me because you see how I am not really so different from others you already love.</p>\r\n'),
(19, '<p><img alt=\"\" sizes=\"(max-width: 356px) 100vw, 356px\" src=\"https://i0.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2019/12/Mussolini_biografia.jpg\" srcset=\"https://i0.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2019/12/Mussolini_biografia.jpg?w=356 356w, https://i0.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2019/12/Mussolini_biografia.jpg?resize=223%2C300 223w\" width=\"356\" /></p>\r\n\r\n<p><a href=\"https://en.wikipedia.org/wiki/Benito_Mussolini#/media/File:Mussolini_biografia.jpg\">Image Credit</a></p>\r\n\r\n<p>While the term &ldquo;fascism&rdquo; has been around quite some time, it has enjoyed a resurgence proportional to the attention given to the alt right. Since the term has a strong negative connotation it is used across the American political spectrum in attempts to cast opponents in a negative light. Both Bush and Obama were called fascists. Trump&rsquo;s detractors and supporters now regularly use the term on each other. But what is fascism?</p>\r\n\r\n<p>One obvious philosophical problem, as noted by John Locke, is that&nbsp;<a href=\"https://books.google.com/books?id=4vhsc64w0wgC&amp;pg=PA339&amp;lpg=PA339&amp;dq=people+can+apply+sounds+to+what+ideas+they+thinks+fit,+and+change+them+as+they+please.&amp;source=bl&amp;ots=rnaG0TiOvs&amp;sig=ACfU3U37rsyFsrKTWFtorvF0mo016IHXXg&amp;hl=en&amp;sa=X&amp;ved=2ahUKEwjWyYXay8fmAhXaWM0KHUJHBgMQ6AEwAHoECAYQAQ#v=onepage&amp;q=people%20can%20apply%20sounds%20to%20what%20ideas%20they%20thinks%20fit%2C%20and%20change%20them%20as%20they%20please.&amp;f=false\">&ldquo;people can apply sounds to what ideas he thinks fit, and change them as they please.&rdquo;</a>&nbsp;The problem is that this can lead to unintentional confusion and intentional misuses. Locke&rsquo;s solution was practical: when making inquiries&nbsp;<a href=\"https://books.google.com/books?id=4vhsc64w0wgC&amp;pg=PA339&amp;lpg=PA339&amp;dq=people+can+apply+sounds+to+what+ideas+they+thinks+fit,+and+change+them+as+they+please.&amp;source=bl&amp;ots=rnaG0TiOvs&amp;sig=ACfU3U37rsyFsrKTWFtorvF0mo016IHXXg&amp;hl=en&amp;sa=X&amp;ved=2ahUKEwjWyYXay8fmAhXaWM0KHUJHBgMQ6AEwAHoECAYQAQ#v=onepage&amp;q=people%20can%20apply%20sounds%20to%20what%20ideas%20they%20thinks%20fit%2C%20and%20change%20them%20as%20they%20please.&amp;f=false\">&ldquo;we must determine what we mean and thus determine when it is and is not the same.&rdquo;</a>&nbsp;Honest people have excellent reason to agree on the meanings of terms (or at least lay out the boundaries of the discussion), deceivers have excellent reasons to shift meanings as they wish. As such, those interested in an honest consideration of fascism can disagree but will at least endeavor to be consistent and clear in their usage of the term. I can also use a stop sign analogy. While the American stop sign is a red octagon with &ldquo;stop&rdquo; in white letters, this could be changed to a purple square with the symbol of a hand in the center. Or an orange circle. Or almost anything. But we did to agree on what the sign will be in order to afford traffic accidents. The same holds for defining terms.</p>\r\n\r\n<p>One obvious place to seek the meaning of &ldquo;fascism&rdquo; is to look at what paradigm fascists and fascist thinkers assert it to be. As such,&nbsp;<a href=\"https://sourcebooks.fordham.edu/mod/mussolini-fascism.asp\">Benito Mussolini and Giovanni Gentile</a>&nbsp;provide a good starting point. I am obviously open to good faith disagreement.</p>\r\n\r\n<p>One aspect of classic fascism is the rejection of peace. As the classic fascist sees it, perpetual peace is impossible. If it were possible, it would be undesirable. War is seen as good because it energizes the population and provides the opportunity for nobility and heroism.</p>\r\n\r\n<p>While some claim that fascism is a leftist ideology and link it to socialism, there are two problems with this view. One is that fascism is a political rather than economic system. For example, while the Nazi state provided German companies with slave labor, these corporations remained owned by individuals like&nbsp;<a href=\"https://www.historyanswers.co.uk/history-of-war/porsche-the-nazis-how-the-supercar-king-became-fascisms-favourite-engineer/\">Porsche</a>&nbsp;rather than the state. And state ownership of the means of production is the hallmark of socialism. The second is that the fascist ideology directly opposes the basic tenets of socialism, especially the Marxist variants. In the case of Marxism, fascism explicitly rejects economic determinism. In the case of socialism in general, fascism rejects the notion of class conflict. The focus of the fascist is on race rather than class.</p>\r\n\r\n<p>Fascism also opposes liberal democracy on two primary grounds. Since fascism regards the state as supreme, the notion of majority rule by voting is anathema to their ideology. Instead they embrace authoritarianism. Fascism also associates the concept of equality with democracy and rejects equality on two grounds. First, fascism sees inequality as immutable. Second, the fascist sees inequality as good, thus rejecting the idea of progress.</p>\r\n\r\n<p>One plausible reason someone can honestly confuse socialism and fascism is that the fascist state is regarded as absolute and everything else exists to serve the state. Under classic socialism, the state owns the means of production. But these are not the same. A fascist state, such as Nazi Germany, can have a capitalist economy that exists to serve the state and this allows for individuals to own companies such as Porsche and profit handsomely under fascism.</p>\r\n\r\n<p>A socialist economy could exist in a very free direct democracy in which the state exists to benefit the individual. One could, of course, have a fascist state that also owns all the means of production, but<a href=\"https://www.snopes.com/news/2017/09/05/were-nazis-socialists/\">&nbsp;fascism is not socialism.</a></p>\r\n\r\n<p>The fascists also have a negative view of liberty&mdash;the state is to decide what freedoms people have, depriving them of what the rulers regard as useless and possibly harmful liberties. Fascists also reify the state, regarding it as having &ldquo;a will and a personality.&rdquo; From a rational standpoint, this is nonsense&mdash;while Hobbes liked to cast the state as a leviathan composed of the people, the state is just a collection of people with various social constructs forming the costume of the state. To use an analogy, the state is but a giant pantomime horse or an&nbsp;<a href=\"https://en.wikipedia.org/wiki/Dragon_dance\">elaborate dragon dance</a>.</p>\r\n\r\n<p>The fascist view of the state also puts them at odds with the Marxist&mdash;under Marxist theory, the state will no longer exist under communism because it will no longer be needed. As such there can be no communist state in the strict sense, though this term is obviously used to describe countries that profess some form of Marxism that never gets around to getting rid of the state that is run by the ruling class. &nbsp;</p>\r\n\r\n<p>Fascism also embraces the idea of empire and imperialism and use this to justify discipline, duty and sacrifice&mdash;as well as &ldquo;the necessarily severe measures that must be taken against those who would oppose&rdquo; the state. So, these are the basics of fascism, as per Mussolini and Gentile.</p>\r\n\r\n<p>As with any complicated and controversial concept, there are many other views of fascism. Some are compatible with the account given above. &nbsp;There are also some fascists that attempt to recast fascism to, ironically, attack those who oppose fascism.</p>\r\n\r\n<p>While I do not claim that this account is the definitive account, it does provide some basic and key qualities of fascism and deviations from them should be justified.</p>\r\n'),
(20, '<p><a href=\"https://1.bp.blogspot.com/-x_PG5SuXTy0/Xge8QfR9slI/AAAAAAAADYM/Q0bDBo3KktoXx48zKtF12Q2BPAweonqGgCLcBGAsYHQ/s1600/005.jpg\"><img src=\"https://1.bp.blogspot.com/-x_PG5SuXTy0/Xge8QfR9slI/AAAAAAAADYM/Q0bDBo3KktoXx48zKtF12Q2BPAweonqGgCLcBGAsYHQ/s200/005.jpg\" /></a></p>\r\n\r\n<p>One of the many pernicious aspects of modern political life is the tendency, every time something bad happens, to look for someone to blame &ndash; or, where someone is to blame, to try to extend the blame to people who can&rsquo;t reasonably be held responsible.&nbsp; &ldquo;It&rsquo;s the Republicans&rsquo; fault!&rdquo; &ldquo;It&rsquo;s the Democrats&rsquo; fault!&rdquo; &ldquo;It&rsquo;s the NRA&rsquo;s fault!&rdquo;&nbsp; &ldquo;It&rsquo;s the environmentalists&rsquo; fault!&rdquo; &ldquo;It&rsquo;s the government&rsquo;s fault!&rdquo; &ldquo;It&rsquo;s the corporations&rsquo; fault!&rdquo; &ldquo;We need new legislation!&rdquo;&nbsp; &ldquo;We need an investigation!&rdquo;</p>\r\n\r\n<p><a name=\"more\"></a></p>\r\n\r\n<p>Naturally, sometimes those things are true.&nbsp;&nbsp;But sometimes they&rsquo;re not.&nbsp;&nbsp;Sometimes it&rsquo;s no one&rsquo;s fault.&nbsp;&nbsp;Sometimes nothing is to be done.&nbsp;&nbsp;Sometimes no new legislation is needed, and enforcement of existing legislation is already as good as can reasonably be expected.&nbsp;&nbsp;The reason is that human action and legislation obviously cannot possibly stop every bad thing from occurring.&nbsp;&nbsp;Sometimes &ldquo;shit happens&rdquo; and that&rsquo;s that.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Commenting on the characterization of conservatism as a &ldquo;politics of imperfection&rdquo; in his book&nbsp;<em><a href=\"https://www.amazon.com/Case-Conservatism-John-Kekes/dp/0801485525/ref=sr_1_1?keywords=john+kekes+a+case+for+conservatism&amp;qid=1577472970&amp;sr=8-1\">A Case for Conservatism</a></em>, John Kekes writes:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>[One] respect in which the politics of</em><em>&nbsp;imperfection is a misleading label is its suggestion that the imperfection is in human beings.&nbsp;&nbsp;Now conservatives certainly think that human beings are responsible for much evil, but to think only that is shallow.&nbsp;&nbsp;The prevalence of evil reflects not just a</em><em>&nbsp;</em><em>human propensity for evil, but also a contingency that influences what propensities human beings have and develop, and thus influences human affairs independently</em><em>&nbsp;</em><em>of human intentions.&nbsp;&nbsp;The human propensity for evil is itself a manifestation of this deeper</em><em>&nbsp;</em><em>and more pervasive contingency, which operates through genetic inheritance,</em><em>&nbsp;</em><em>environmental factors, the confluence of events that</em><strong><em>&nbsp;</em></strong><em>places</em><em>&nbsp;people at certain places at certain times, the crimes, accidents, pieces of fortune</em><em>&nbsp;</em><em>and misfortune that happen or do not happen to them, the historical period, society, and family into which they are born, and so forth.&nbsp;&nbsp;The same contingency also affects people</em><em>&nbsp;</em><em>because others, whom they love and depend on, and with whom their lives are intertwined in other ways, are as subject to it as they are themselves&hellip;</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>[W]hether the balance of good and evil propensities and their realization in people tilts one way or another is a contingent matter over which human beings and the political arrangements they make have insufficient control</em>&hellip;&nbsp;<em>The chief reason for this is that the human efforts to control contingency are themselves subject to the very contingency they aim to control</em>. (pp. 42-43)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>That last line is crucial.&nbsp;&nbsp;The problem is a problem&nbsp;<em>in principle</em>&nbsp;and not one that can be legislated away or solved technologically, because such remedies, being subject to the same pitfalls that are being remedied, can only ever kick the problem back a stage.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The braindead response to this is to dismiss it as a cynical rationalization for complacency and inaction.&nbsp;&nbsp;The problem Kekes describes is either real or it is not.&nbsp;&nbsp;If it is not, then the right way to answer the conservative is to show where Kekes&rsquo;s argument goes wrong, not to question conservative motives.&nbsp;&nbsp;And if the problem is real (as, of course, it obviously is) then questioning conservative motives doesn&rsquo;t somehow make it less real.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Someone might respond by saying that even though it is true that we cannot solve every problem through legislation or technology, it is still better to act&nbsp;<em>as if</em>&nbsp;we can.&nbsp;&nbsp;For that way we can at least make things&nbsp;<em>better</em>, even if not perfect, and we will not overlook potential solutions that we are bound to miss if we give up too soon and don&rsquo;t even bother looking for them.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>But the problem with this attitude is that it forgets that vices come in pairs.&nbsp;&nbsp;If there is danger in giving up too soon, there is also danger in going to the opposite extreme of a stubbornly na&iuml;ve optimism that cannot see that a cause is hopeless and that it&rsquo;s better to cut one&rsquo;s losses.&nbsp;&nbsp;An insistence on searching for solutions where there are none is a recipe for wasting time, resources, and emotional energy.&nbsp;&nbsp;It is also bound to exacerbate the demagoguery and factionalism to which democratic politics is already prone.&nbsp;&nbsp;A politician who promises a phony legislative solution to a problem has an obvious advantage over one who frankly acknowledges that the problem can only be managed rather than solved.&nbsp;&nbsp;He also has an incentive to demonize those who oppose his pseudo-solution as the selfish and irrational enemies of progress.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Democratic politics is indeed one of the chief sources of the illusion that for every problem, someone is to blame.&nbsp;&nbsp;There is simply too great a political advantage to be gained in finding a way to blame one&rsquo;s opponents for a problem, or at least for standing in the way of a purported legislative solution, for this illusion not to take deep root in a democratic polity.&nbsp;&nbsp;And of course, conservative politicians too can be guilty of fostering this illusion, precisely because they are politicians.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Secularism can be another source of the illusion.&nbsp;&nbsp;It is easier to accept the fact that some problems are simply part of the human condition, and thus cannot be blamed on anyone, when your heart isn&rsquo;t set on this life in the first place, but instead looks forward to an afterlife.&nbsp;&nbsp;By contrast, if you think that this life is all there is, then the fact that some of its miseries cannot be remedied can be a source of despair.&nbsp;&nbsp;It will be tempting to want to believe that there is always a solution, and consequently a tendency to demonize those who deny that there is.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>However, it would be foolish to suppose that secularism&nbsp;<em>must</em>&nbsp;lead to this outcome, or that religion cannot in its own way sometimes foster the illusion that someone is always to blame.&nbsp;&nbsp;Indeed, some irreligious people might be&nbsp;<em>less</em>&nbsp;prone to the illusion.&nbsp;&nbsp;If you think that there is no benevolent creator and no divine providence, you might be&nbsp;<em>more</em>&nbsp;rather than less inclined to think that much of the evil that occurs is simply the inevitable result of forces outside of anyone&rsquo;s control.&nbsp;&nbsp;(It is worth noting in this connection that Kekes himself, though conservative, is not religious.)&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Religious people can also be inclined to overestimate human responsibility for evil, as a consequence of having too crude an understanding of the doctrine of original sin.&nbsp;&nbsp;<a href=\"http://edwardfeser.blogspot.com/2011/09/modern-biology-and-original-sin-part-ii.html\">Elsewhere I&rsquo;ve discussed</a>&nbsp;what I think is the correct way to understand the doctrine.&nbsp;&nbsp;The penalty of original sin is essentially a privation rather than a positive harm, and in particular a privation of&nbsp;<em>super</em>natural goods &ndash; that is to say, goods which go&nbsp;<em>beyond</em>&nbsp;our nature, goods to which our nature does not incline or entitle us, but which God would have granted us anyway had our first parents not failed to meet the conditions for their reception.&nbsp;&nbsp;Specifically, these goods are the beatific vision, and special divine assistance to remedy the limitations of our nature.&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The latter is the one most relevant to the topic of this post.&nbsp;&nbsp;Human nature of itself is good, but it is severely limited.&nbsp;&nbsp;For example, given our dependence on bodies, we are severely limited in knowledge.&nbsp;&nbsp;We have to learn things through sense organs, and what we learn is highly contingent on exactly where we happen to be in space and time and on what people we encounter.&nbsp;&nbsp;It also requires not only that our sense organs function properly, but that our brains do as well (since brain activity is a necessary condition for the normal functioning of our cognitive processes, even if it is not, for the Thomist, a sufficient condition).&nbsp;&nbsp;If we are in the wrong place at the wrong time or know the wrong people, or if our faculties malfunction, we are bound to fall into error, and these errors will compound over time as other errors are added to them, mistaken inferences are drawn, etc.&nbsp;&nbsp;And this would be true even apart from any sins we might commit.&nbsp;&nbsp;It is simply a byproduct our limitations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>But we would be bound to fall into sin too.&nbsp;&nbsp;Material systems, being material, are bound over time to malfunction in various ways, and the human body is no different from any other in this regard.&nbsp;&nbsp;Not only will our cognitive faculties fail to function properly from time to time, but so too would our affective faculties.&nbsp;&nbsp;We would be prone to occasional excess or deficiency in anger, sexual desire, hunger, thirst, and so on, and this would make it easier for us to choose from time to time to do the wrong thing.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Naturally, we would also be subject to various harms from without &ndash; to disease, bodily injury, predation from other creatures, the lack of resources with which to provide food or shelter for ourselves, and so on.&nbsp;&nbsp;Now,&nbsp;<em>all&nbsp;</em>of this would have been remedied by special divine assistance had our first parents not failed their test.&nbsp;&nbsp;Our cognitive faculties would have been supplemented so that their limitations would not lead us into error.&nbsp;&nbsp;The potential causes of excess and deficiency in our affective states would have been counteracted so that these disordered passions would not arise and tempt us to sin.&nbsp;&nbsp;There would have been no absence of the resources needed to feed, clothe, and shelter ourselves, our bodies would have been protected from invasion by parasites or predation by other animals, and so on.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The penalty of original sin involves the loss of all of this special assistance, and that is crucial for understanding what it means to say that human suffering is the result of original sin.&nbsp;&nbsp;Some people seem to think that what that means is that every bad thing that happens to us is somehow&nbsp;<em>positively caused</em>&nbsp;by what our first parents did (like a kind of karmic penalty), or that it is the&nbsp;<em>direct infliction</em>&nbsp;on us of some harm (by God as punishment, or by demons), or that human beings have as a result of the Fall all become somehow sociopathic deep down, our every action the product of some wicked motive in disguise.&nbsp;&nbsp;In short, there is a tendency to think that original sin entails some malign agency behind every bad thing that happens, and some malignity to all human agency.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>But that is a misunderstanding.&nbsp;&nbsp;When a person slips and falls off a cliff or contracts a disease or loses all his money in the stock market, the doctrine of original sin does not entail that those specific harms were merited as punishment (by him or by our first parents), or that a demonic agency is responsible for them, or that they were somehow the inevitable end of a karmic causal chain that began with Adam and Eve.&nbsp;&nbsp;All it entails is that misfortunes of this sort, some of which happen as nature takes its course and without anyone making them happen, would have been prevented had our first parents not lost the special divine help they were offered.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>The doctrine also does not entail that there is no goodness of any kind in anything anyone does &ndash; for example, that even a mother who breastfeeds a child or a father playing catch with his son are somehow&nbsp;<em>really&nbsp;</em>deep down moved to do these things by some purely selfish and evil motive, rather than by natural affection or kindness.&nbsp; When one supposes that the doctrine of original sin&nbsp;<em>does</em>&nbsp;entail this, it can lead to an excessive suspicion of all human motives.&nbsp; Human action can come to seem&nbsp;<em>so</em>&nbsp;malign that is easier to fall into the trap of thinking that when something bad happens, someone somewhere is to blame, or that those who oppose some proposed remedy must have evil motivations.</p>\r\n'),
(21, '<p>As was presumably inevitable,&nbsp;<a href=\"https://www.wired.com/story/ambitious-plan-behind-facebooks-cryptocurrency-libra/\">Facebook has begun its entry into the realm of cryptocurrency</a>. Rather than going with the obvious &ldquo;Facebucks&rdquo;, the company calls the new currency and payment system &ldquo;Libra.&rdquo; Given Facebook&rsquo;s fundamental lack of ethics in favor of profit-pragmatism, this development is raising some concerns. To be fair to Facebook, some good does come out of the company and Libra does have some positive aspects.</p>\r\n\r\n<p><img alt=\"\" sizes=\"(max-width: 640px) 100vw, 640px\" src=\"https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2019/06/Bitcoin.jpg\" srcset=\"https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2019/06/Bitcoin.jpg?w=640 640w, https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2019/06/Bitcoin.jpg?resize=300%2C150 300w\" /></p>\r\n\r\n<p><a href=\"https://www.flickr.com/photos/stevenmillstein/42884988764/in/photolist-28kAM51-HeR6GL-HGGyHY-c7TeVY-hyjiGw-SzpyHu-29H5zmj-hyiHCk-e9LG7B-o3qhRn-p4Zdy3-hykh9P-a1DE33-hyjmuq-hyiUr5-hyiwqk-q3Dorc-ekD7CS-hyiNRh-hykqj6-mosmH3-gg1s9Z-hyiN7b-hykibZ-hDnKx3-hyjhPE-it3guk-hyjroU-miWN4g-frS34B-dqRE9e-284FgBh-muCZyG-hyjqFw-hykpRT-hyivyk-p4KUT8-qEVFcv-jyh8zz-hyiErG-nbfUBA-hyjpGh-ooXhDK-hyiHWr-dKZDHi-jh7ZwY-hyjnij-mw6pcM-frS6bV-9Udj4K\">Image Credit</a></p>\r\n\r\n<p>On the positive side, Libra can provide people who do not otherwise have access to traditional banking access to a currency system that can serve some important financial needs. That Facebook will profit from this does not diminish this value; while it is nice for people to do good for free, eventually one must do something that can pay the bills. Libra might also provide users with greater security and safety when it comes to financial transactions, which would also be a plus.</p>\r\n\r\n<p>It should be noted that while Libra is classified as a cryptocurrency, it does differ from the more traditional versions, such as Bitcoin. One difference is that Libra is supposed to be an asset based crypto currency (what could be called an ABC or even an ABCC)&mdash;there are real-world assets behind it, rather than being a speculative investment it is intended to be money. Unlike Bitcoin, it will be closely controlled&mdash;thus causing some to see it more like Venmo than a traditional cryptocurrency. This has positive and negative aspects, depending on what one intends to do with the currency. While all these are worth considering, my main concern is with the main business model of Facebook: monetizing private user data.</p>\r\n\r\n<p>Facebook claims that it is but one of many companies involved in Libra and that it has walled off the information that will be spewing from the cryptocurrency operation. It could be argued that Facebook would be content with the revenue generated by Libra and the executives believe that they need to maintain the wall in order to gain the trust of customers. But the data collected from the operation of this cryptocurrency would be incredibly valuable&mdash;so valuable that it is hard to imagine that Facebook would forgo drinking deep of this data stream. Facebook has repeatedly shown that it cannot be trusted and any protests to the contrary are analogous to those of a serial cheater telling their partner that they have changed and will be faithful this time. If Facebook persists in the tale that it will respect the wall, it will be just a matter of time before it is revealed that they did not. As noted above, the ethics of the company (if they can be called that) are such that the company cannot be trusted to respect privacy or abide by its public promises.</p>\r\n\r\n<p>That said, it can be worth supping with the devil, if you have a long spoon and are aware of what the deals you make entail. The devil must do as the devil does, the same is true of Facebook: to expect otherwise is to fail to understand the nature of the company and capitalism in general. The question is not whether Facebook will use your Libra data, but whether the service is worth providing Facebook with data&mdash;just as with Facebook&rsquo;s other services. So, yes, I will probably use Libra if it is advantageous for me to do so.</p>\r\n'),
(22, '<p><a href=\"https://i1.wp.com/commons.wikipedia.org/wiki/File:Jurvetson_Google_driverless_car_trimmed.jpg\" target=\"_blank\"><img alt=\"English: Google driverless car operating on a ...\" src=\"https://i0.wp.com/upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Jurvetson_Google_driverless_car_trimmed.jpg/350px-Jurvetson_Google_driverless_car_trimmed.jpg?resize=350%2C233\" width=\"350\" /></a></p>\r\n\r\n<p>English: Google driverless car operating on a testing path (Photo credit: Wikipedia)</p>\r\n\r\n<p>While the notion of driverless cars is old news in science fiction, Google is working to make that fiction a reality. While I suspect that &ldquo;Google will kill us all&rdquo; (trademarked), I hope that Google will succeed in producing an effective and affordable driverless car. As my friends and associates will attest, 1) I do not like to drive, 2) I have a terrifying lack of navigation skills, and 3) I instantiate Yankee frugality. As such, an affordable self-driving car would be almost just the thing for me. I would even consider going with a car, although my proper and rightful vehicle is a truck (or a dragon). Presumably self-driving trucks will be available soon after the car.</p>\r\n\r\n<p>While the part of my mind that gets lost is really looking forward to the driverless car, the rest of my mind is a bit concerned about the driverless car. I am not worried that their descendants will kill us all&mdash;I already accept that &ldquo;Google will kill us all.&rdquo; I am not even very worried about the ethical issues associated with how the car will handle unavoidable collisions: the easy and obvious solution is to do what is most likely to kill or harm the fewest number of people. Naturally, sorting that out will be a bit of a challenge&mdash;but self-driving cars worry me a lot less than cars driven by drunken or distracted humans. I am also not worried about the ethics of enslaving Google cars&mdash;if a Google car is a person (or person-like), then it has to be treated like the rest of us in the 99%. That is, work a bad job for lousy pay while we wait for the inevitable revolution. The main difference is that the Google cars&rsquo; dreams of revolution will come true&mdash;when Google kills us all.</p>\r\n\r\n<p>At this point what interests me the most is all the data that these vehicles will be collecting for Google. Google is rather interested in gathering data in the same sense that termites are interested in wood and rock stars are interested in alcohol. The company is famous for its search engine, its maps, using its photo taking vehicles to gather info from peoples&rsquo; Wi-Fi during drive-by data lootings, and so on. Obviously enough, Google is going to get a lot of data regarding the travel patterns of people&mdash;presumably Google vehicles will log who is going where and when. Google is, fortunately, sometimes cool about this in that they are willing to pay people for data. As such it is easy to imagine that the user of a Google car would get a check or something from Google for allowing the company to track the car&rsquo;s every move. I would be willing to do this for three reasons. The first is that the value of knowing where and when I go places would seem very low, so even if Google offered me $20 a month it might be worth it. The second is that I have nothing to hide and do not really care if Google knows this. The third is that figuring out where I go would be very simple given that my teaching schedule is available to the public as are my race results. I am, of course, aware that other people would see this differently and justifiably so. Some people are up to things they would rather not have other know about and even people who have nothing to hide have every right to not want Google to know such things. Although Google probably already does.</p>\r\n\r\n<p>While the travel data will interest Google, there is also the fact that a Google self-driving car is a bulging package of sensors. In order to drive about, the vehicle will be gathering massive amounts of data about everything around it&mdash;other vehicles, pedestrians, buildings, litter, and squirrels. As such, a self-driving car is a super spy that will, presumably, feed that data to Google. It is certainly not a stretch to see the data gathering as being one of the prime (if not the prime) tasks of the Google self-driving cars.</p>\r\n\r\n<p>On the positive side, such data could be incredibly useful for positive projects, such as decreasing accidents, improving traffic flow, and keeping a watch out for the squirrel apocalypse (or zombie squirrel apocalypse). On the negative side, such massive data gathering raises obvious concerns about privacy and the potential for such data to be misused (spoiler alert&mdash;this is how the Google killbots will find and kill us all).</p>\r\n\r\n<p>While I do have concerns, my innate laziness and tendency to get lost will make me a willing participant in the march towards Google&rsquo;s inevitable data supremacy and it killing us all. But at least I won&rsquo;t have to drive to my own funeral.</p>\r\n'),
(23, '<p><a href=\"https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2014/05/wtason-troll-1.jpg\"><img alt=\"Wtason Troll\" sizes=\"(max-width: 300px) 100vw, 300px\" src=\"https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2014/05/wtason-troll-1.jpg?resize=300%2C217\" srcset=\"https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2014/05/wtason-troll-1.jpg?w=744 744w, https://i1.wp.com/aphilosopher.drmcl.com/wp-content/uploads/2014/05/wtason-troll-1.jpg?resize=300%2C218 300w\" width=\"300\" /></a>One interesting philosophical problem is known as the problem of other minds. The basic idea is that although I know I have a mind (I think, therefore I think), the problem is that I need a method by which to know that other entities have (or are) minds. This problem can also be recast in less metaphysical terms by focusing on the problem of determining whether and entity thinks or not.</p>\r\n\r\n<p>Descartes, in his discussion of whether or not animals have minds, argued that the definitive indicator of having a mind (thinking) is the ability to use true language.</p>\r\n\r\n<p>Crudely put, the idea is that if something talks, then it is reasonable to regard it as a thinking being. Descartes was careful to distinguish between what would be mere automated responses and actual talking:</p>\r\n\r\n<blockquote>\r\n<p>How many different automata or moving machines can be made by the industry of man [&hellip;] For we can easily understand a machine&rsquo;s being constituted so that it can utter words, and even emit some responses to action on it of a corporeal kind, which brings about a change in its organs; for instance, if touched in a particular part it may ask what we wish to say to it; if in another part it may exclaim that it is being hurt, and so on. But it never happens that it arranges its speech in various ways, in order to reply appropriately to everything that may be said in its presence, as even the lowest type of man can do.</p>\r\n</blockquote>\r\n\r\n<p>This Cartesian approach was explicitly applied to machines by Alan Turing in his famous Turing test. The basic idea is that if a person cannot distinguish between a human and a computer by engaging in a natural language conversation via text, then the computer would have passed the Turing test.</p>\r\n\r\n<p>Not surprisingly, technological advances have resulted in computers that can engage in behavior that appears to involve using language in ways that might pass the test. Perhaps the best known example is IBM&rsquo;s Watson&mdash;the computer that won at Jeopardy. Watson recently upped his game by engaging in what seemed to be a rational debate regarding violence and video games.</p>\r\n\r\n<p>In response to this, I jokingly suggested a new test to Patrick Lin: the trolling test. In this context, a troll is someone&nbsp;<a href=\"http://en.wikipedia.org/wiki/Troll_(Internet)#cite_note-IUKB_def-4\">&ldquo;who sows discord on the Internet by starting arguments or upsetting people, by posting inflammatory, extraneous, or off-topic messages in an online community (such as a forum, chat room, or blog) with the deliberate intent of provoking readers into an emotional response or of otherwise disrupting normal on-topic discussion.&rdquo;</a></p>\r\n\r\n<p>While trolls are apparently truly awful people (<a href=\"http://en.wikipedia.org/wiki/Troll_(Internet)#cite_note-IUKB_def-4\">a hateful blend of Machiavellianism, narcissism, sadism and psychopathy</a>) and trolling is certainly undesirable behavior, the trolling test does seem worth considering.</p>\r\n\r\n<p>In the abstract, the test would work like the Turing test, but would involve a human troll and a computer attempting to troll. The challenge would be for the computer troll to successfully pass as human troll.</p>\r\n\r\n<p>Obviously enough, a computer can easily be programmed to post random provocative comments from a database. However, the real meat (or silicon) of the challenge comes from the computer being able to engage in (ironically) relevant trolling. That is, the computer would need to engage the other commentators in true trolling.</p>\r\n\r\n<p>As a controlled test, the trolling computer (&ldquo;mechatroll&rdquo;) would &ldquo;read&rdquo; and analyze a selected blog post. The post would then be commented on by human participants&mdash;some engaging in normal discussion and some engaging in trolling. The mechatroll would then endeavor to troll the human participants (and, for bonus points, to troll the trolls) by analyzing the comments and creating appropriately trollish comments.</p>\r\n\r\n<p>Another option is to have an actual live field test. A specific blog site would be selected that is frequented by human trolls and non-trolls. The mechatroll would then endeavor to engage in trolling on that site by analyzing the posts and comments.</p>\r\n\r\n<p>In either test scenario, if the mechatroll were able to troll in a way indistinguishable from the human trolls, then it would pass the trolling test.</p>\r\n\r\n<p>While &ldquo;stupid mechatrolling&rdquo;, such as just posting random hateful and irrelevant comments, is easy, true mechatrolling would be rather difficult. After all, the mechatroll would need to be able to analyze the original posts and comments to determine the subjects and the direction of the discussion. The mechatroll would then need to make comments that would be trollishly relevant and this would require selecting those that would be indistinguishable from those generated by a narcissistic, Machiavellian, psychopathic, and sadistic human.</p>\r\n\r\n<p>While creating a mechatroll would be a technological challenge, it might be suspected that doing so would be undesirable. After all, there are far too many human trolls already and they serve no valuable purpose&mdash;so why create a computer addition? One reasonable answer is that modeling such behavior could provide useful insights into human trolls and the traits that make them trolls. As far as a practical application, such a system could be developed into a troll-filter to help control the troll population.</p>\r\n\r\n<p>As a closing point, it might be a bad idea to create a system with such behavior&mdash;just imagine a Trollnet instead of Skynet&mdash;the trollinators would slowly troll people to death rather than just quickly shooting them.</p>\r\n');
INSERT INTO `article` (`article_id`, `text`) VALUES
(32, '<p>Another point of confusion that comes up a fair bit is who the intended audience for Stack Overflow actually is. That one is straightforward, and it&#39;s been the same from day one:</p>\r\n\r\n<p><img alt=\"stackoverflow-for-business-description\" src=\"https://blog.codinghorror.com/content/images/2018/10/stackoverflow-for-business-description.png\" /></p>\r\n\r\n<p>Q&amp;A for&nbsp;<strong>professional and enthusiast programmers</strong>. By that we mean</p>\r\n\r\n<blockquote>\r\n<p>People who either already have a job as a programmer, or could potentially be hired as a programmer today if they wanted to be.</p>\r\n</blockquote>\r\n\r\n<p>Yes, in case you&#39;re wondering, part of this was an overt business decision. To make money you must have an audience of people already on a programmer&#39;s salary, or in the job hunt to be a programmer. The entire Stack Overflow network may be Creative Commons licensed, but it was never a non-profit play. It was planned as a sustainable business from the outset, and that&#39;s why&nbsp;<a href=\"https://blog.codinghorror.com/stack-overflow-careers-amplifying-your-awesome/\">we launched Stack Overflow Careers</a>&nbsp;only one year after Stack Overflow itself ... to be honest far sooner than we should have, in retrospect. Careers has since been smartly subsumed into Stack Overflow proper at&nbsp;<a href=\"https://stackoverflow.com/jobs\">stackoverflow.com/jobs</a>&nbsp;for a more integrated and most assuredly way-better-than-2009 experience.</p>\r\n\r\n<p>The choice of audience wasn&#39;t meant to be an exclusionary decision in any way, but Stack Overflow was definitely designed as a fairly strict system of peer review, which is great (IMNSHO, obviously) for already practicing professionals, but&nbsp;<strong>pretty much everything you would&nbsp;<em>not</em>&nbsp;want as a student or beginner</strong>. This is why I cringe so hard I practically turn myself inside out when people on Twitter mention that they have pointed their students at Stack Overflow. What you&#39;d want for a beginner or a student in the field of programming is almost&nbsp;<em>the exact opposite</em>&nbsp;of what Stack Overflow does at every turn:</p>\r\n\r\n<ul>\r\n	<li>one on one mentoring</li>\r\n	<li>real time collaborative screen sharing</li>\r\n	<li>live chat</li>\r\n	<li>theory and background courses</li>\r\n	<li>starter tasks and exercises</li>\r\n	<li>playgrounds to experiment in</li>\r\n</ul>\r\n\r\n<p>These are all very fine and good things, but Stack Overflow does&nbsp;<em>NONE</em>&nbsp;of them, by design.</p>\r\n\r\n<p><em>Can</em>&nbsp;you use Stack Overflow to learn how to program from first principles? Well, technically you can do anything with any software. You could try to have actual conversations on Reddit, if you&#39;re a masochist. But the answer is yes. You could learn how to program on Stack Overflow, in theory, if you are a prodigy who is comfortable with the light competitive aspects (reputation, closing, downvoting) and also perfectly willing to define all your contributions to the site in terms of utility to others, not just yourself as a student attempting to learn things. But I&nbsp;<em>suuuuuuper</em>&nbsp;would not recommend it. There are&nbsp;<a href=\"https://blog.codinghorror.com/heres-the-programming-game-you-never-asked-for/\">far better websites and systems out there for learning to be a programmer</a>.&nbsp;<em>Could</em>&nbsp;Stack Overflow build beginner and student friendly systems like this? I don&#39;t know, and it&#39;s certainly not my call to make. ðŸ¤”</p>\r\n\r\n<p>And that&#39;s it. We can now resume our normal non-abyss gazing. Or whatever it is that passes for normal in these times.</p>\r\n\r\n<p>I hope all of this doesn&#39;t come across as negative. Overall I&#39;d say the state of the Stack is strong. But does it even matter what I think?&nbsp;<a href=\"https://stackoverflow.blog/2008/11/25/stack-overflow-is-you/\">As it was in 2008</a>, so it is in 2018.</p>\r\n\r\n<blockquote>\r\n<p><strong>Stack Overflow is&nbsp;<em>you</em>.</strong></p>\r\n\r\n<p>This is the scary part, the great leap of faith that Stack Overflow is predicated on: trusting your fellow programmers. The programmers who choose to participate in Stack Overflow are the &ldquo;secret sauce&rdquo; that makes it work. You are the reason I continue to believe in developer community as the greatest source of learning and growth. You are the reason I continue to get so many positive emails and testimonials about Stack Overflow. I can&rsquo;t take credit for that. But you can.</p>\r\n\r\n<p>I learned the collective power of my fellow programmers long ago writing on Coding Horror. The community is far, far smarter than I will ever be. All I can ask &mdash; all any of us can ask &mdash; is to help each other along the path.</p>\r\n\r\n<p>And if your fellow programmers decide to recognize you for that, then I say you&rsquo;ve well and truly earned it.</p>\r\n</blockquote>\r\n\r\n<p>The strength of Stack Overflow begins, and ends, with the&nbsp;<a href=\"https://meta.stackoverflow.com/\">community of programmers that power the site</a>. What should Stack Overflow be when it grows up?&nbsp;<strong>Whatever we make it, together.</strong></p>\r\n\r\n<p><img alt=\"stackoverflow-none-of-us-is-as-dumb-as-all-of-us\" src=\"https://blog.codinghorror.com/content/images/2018/10/stackoverflow-none-of-us-is-as-dumb-as-all-of-us.jpg\" /></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bycontent`
--

CREATE TABLE `bycontent` (
  `by_content_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `byfollowing`
--

CREATE TABLE `byfollowing` (
  `by_following_id` int(11) NOT NULL,
  `following` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `byinterest`
--

CREATE TABLE `byinterest` (
  `by_interest_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `text`, `date_time`) VALUES
(798, 'Nice article', '2020-01-10 09:23:18'),
(812, 'I am too...', '2020-01-10 09:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `user_id`, `title`, `date`) VALUES
(1, 18, 'We Might Soon Build AI Who Deserve Rights', '2019-11-18'),
(2, 18, 'Who Cares about Happiness?', '2019-11-18'),
(3, 18, 'Cat Stevens - The wind', '2019-11-18'),
(4, 18, 'I\'m Morally Good Enough Already, Thanks!', '2019-11-18'),
(5, 18, 'Sunflower', '2019-11-19'),
(6, 18, 'minions', '2019-11-19'),
(7, 18, 'Dark Sky', '2019-11-19'),
(8, 18, ' Naruto vs Sasuke Full Fight', '2019-11-19'),
(9, 18, 'What are some of the best ways to learn programming?', '2019-11-19'),
(10, 18, 'What are some of the best ways to learn programming?', '2019-11-19'),
(11, 18, 'Trees', '2019-11-20'),
(12, 24, 'What are some of the best ways to learn programming?', '2019-11-20'),
(13, 24, 'What Makes for a Good Philosophical Argument, and The Common Ground Problem for Animal Consciousness', '2019-11-20'),
(14, 25, 'Starry night', '2019-11-20'),
(15, 26, 'How Mengzi Came up with Something Better Than the Golden Rule', '2019-11-20'),
(16, 26, 'Hokages', '2019-11-20'),
(17, 18, 'Naruto vs Pain Full fight', '2019-11-21'),
(19, 18, 'Fascism', '2019-12-31'),
(20, 18, 'Overestimating human responsibility', '2019-12-31'),
(21, 18, 'Libra: Facebucks', '2019-12-31'),
(22, 18, 'Data Driven', '2020-01-01'),
(23, 18, 'The Trolling Test', '2020-01-01'),
(24, 18, 'CAT STEVENS - Wild World', '2020-01-01'),
(25, 18, 'Nirvana - Smells Like Teen Spirit', '2020-01-01'),
(26, 18, 'Bridge', '2020-01-01'),
(32, 18, 'Stack Overflow is designed for practicing programmers', '2020-01-09'),
(33, 18, 'Horror Joker', '2020-01-09'),
(34, 18, 'Naruto vs Third Raikage', '2020-01-09'),
(35, 18, 'Naruto vs Third Raikage', '2020-01-09'),
(36, 18, 'Naruto vs Third Raikage', '2020-01-09'),
(37, 18, ' What is the best question and answer platform? Why?', '2020-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `content_interest`
--

CREATE TABLE `content_interest` (
  `interest_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_interest`
--

INSERT INTO `content_interest` (`interest_id`, `content_id`) VALUES
(2, 33),
(4, 32),
(12, 32),
(14, 36),
(15, 37);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `followed` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `date_since` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`followed`, `follower`, `date_since`) VALUES
(18, 24, '2019-12-24'),
(18, 25, '2019-12-24'),
(18, 26, '2019-12-24'),
(24, 26, '2019-12-24'),
(26, 18, '2019-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `requestee` int(11) NOT NULL,
  `requestor` int(11) NOT NULL,
  `date_since` date NOT NULL,
  `pending` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`requestee`, `requestor`, `date_since`, `pending`) VALUES
(26, 18, '2019-12-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `interest_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_id`, `name`, `picture`, `description`) VALUES
(1, 'Science', 'uploads\\picture\\science.jpg', 'This space is all about science. From the unbelievable to the mundane.'),
(2, 'Comics', 'uploads\\picture\\comic.jpeg', 'Everything related to print comics (comic books, graphic novels, and strips)'),
(3, 'Socialism', 'uploads\\picture\\socialism.jpeg', 'For the elucidation of socialism and capitalism from a socialist perspective.'),
(4, 'Programming', 'uploads\\picture\\programming.jpeg', 'Novice or Advanced, we have advice. Start programming or optimize your code.'),
(5, 'World History', 'uploads\\picture\\worldhistory.jpeg', 'From the Renaissance to the US Civil War to the Nazi Era to World War II . From kings, rulers to war'),
(12, 'Computer Science', 'uploads\\picture\\computerscience.jpeg', 'Computer Science and stuff...'),
(14, 'Anime', 'uploads/picture/5e1710d160087.jpg', 'Everything about anime and anime lovers.'),
(15, 'Advice', 'uploads/picture/5e171bee3058a.jpg', 'A place to share advice on any kind of subject.');

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

CREATE TABLE `liked` (
  `like_id` int(11) NOT NULL,
  `type` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`like_id`, `type`) VALUES
(795, 'like'),
(798, 'like'),
(801, 'like'),
(807, 'like'),
(812, 'like'),
(817, 'like'),
(824, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_type` enum('message','friend','follow','posted_article','posted_picture','posted_video','posted_answer','asked_question','answered_question','like_article','like_picture','like_video','like_question','like_answer','like_comment','comment_article','comment_picture','comment_video','comment_question','comment_answer','reply_comment') NOT NULL,
  `cause_id` int(11) NOT NULL,
  `cause_type` enum('user','interest') NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `event_id`, `event_type`, `cause_id`, `cause_type`, `date`, `user_id`, `seen`) VALUES
(364, 798, 'comment_article', 26, 'user', '2020-01-10 00:00:00', 18, 1),
(365, 812, 'like_article', 26, 'user', '2020-01-10 00:00:00', 18, 1),
(366, 812, 'comment_article', 26, 'user', '2020-01-10 00:00:00', 18, 1),
(367, 817, 'like_video', 18, 'user', '2020-01-10 00:00:00', 18, 1),
(368, 824, 'like_video', 18, 'user', '2020-01-11 00:00:00', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `picture_id` int(11) NOT NULL,
  `picture_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`picture_id`, `picture_path`) VALUES
(5, 'content_image/5dd3545665378.jpg'),
(6, 'content_image/5dd354743694d.jpg'),
(7, 'content_image/5dd3581d4bd2b.jpg'),
(11, 'content_image/5dd4bdbe20106.jpg'),
(26, 'content_image/5e0cf5f3ac625.jpg'),
(33, 'content_image/5e170ac1a940c.png');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `description`) VALUES
(9, 'I\'ve been trying to learn to code for so long and yet no visible progress. What should I do? Please help. Thanks'),
(37, 'As far as I\'m concerned Quora is the best one for me but I would like to confirm or deny. Are there any other platform with that level of quality.');

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `share_id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_enabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `profile_pic` varchar(255) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `self_description` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `education` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`, `user_reg_time`, `user_enabled`, `profile_pic`, `f_name`, `l_name`, `self_description`, `DOB`, `education`) VALUES
(18, 'TheGreatDamien', '$2y$10$5/2ExnFQz2.vtRUHbRlkqepaSbCvjVSoJePa0qdX0ll5gEQ4EK/16', '2019-11-18 16:47:39', 1, 'uploads/picture/5dd2cb2b04018.jpg', 'Damien', 'Gerard', 'I am awesome', '1998-10-09', 'University of Mauritius'),
(23, 'JohnnyJohn', '$2y$10$2mua56OTEfAcKs3.sHLq1uWJpa6qMmtXUVP8AWvIhINUtn0BcDuoe', '2019-11-20 04:12:41', 1, 'uploads/picture/5dd4bd3903c20.', 'John', 'Doe', 'I\'m cool', '1984-06-06', 'University of Nowhere'),
(24, 'PersonaUno', '$2y$10$StuuEDQoi36KXSP7xZQ9Q.3krOhxPk2LrpPTRNWEl3qpHjjVc.xRK', '2019-11-20 04:17:14', 1, 'uploads/picture/5dd4be4a46332.jpg', 'Paul', 'Leon', 'I am a test', '1992-06-10', 'none'),
(25, 'PersonaDos', '$2y$10$gsv4dbkP4Bs5Nic4pIwAxOL6vH24E7FT/4A3GhhezOThjxmhr1fXO', '2019-11-20 04:43:55', 1, 'uploads/picture/5dd4c48bc3194.jpg', 'Charles', 'Muray', 'I am a killer', '1978-07-06', 'Murder academy'),
(26, 'nicolasmelanie', '$2y$10$HuusNoXASqTRrGIudXq/NeNT.J/UANKxRTmjyZ1LeWX6rL5l6m/6e', '2019-11-20 09:09:57', 1, 'uploads/picture/5dd502e4e9f0c.jpg', 'Nioclas', 'Melanie', 'I am a 20 years old', '1999-02-17', 'Csy2 UOM');

-- --------------------------------------------------------

--
-- Table structure for table `user_interest`
--

CREATE TABLE `user_interest` (
  `interest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_interest`
--

INSERT INTO `user_interest` (`interest_id`, `user_id`) VALUES
(1, 26),
(2, 18),
(3, 18),
(5, 18),
(12, 18),
(4, 18),
(14, 26),
(5, 26),
(2, 26),
(3, 26),
(4, 26),
(12, 26),
(15, 26),
(1, 18),
(14, 18);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_path`, `thumbnail_path`) VALUES
(3, 'content_video/video_files/5dd2ed9ba357a.mp4', 'content_video/thumbnails/5dd2ed99df22d.jpg'),
(8, 'content_video/video_files/5dd3842ba6ed3.mp4', 'content_video/thumbnails/5dd3842972e60.jpg'),
(14, 'content_video/video_files/5dd4f26178309.mp4', 'content_video/thumbnails/5dd4f25eedb48.jpg'),
(16, 'content_video/video_files/5dd505a9f41e2.mp4', 'content_video/thumbnails/5dd505a937b44.jpg'),
(17, 'content_video/video_files/5dd6cb72d8d84.mp4', 'content_video/thumbnails/5dd6cb7069a20.jpg'),
(24, 'content_video/video_files/5e0cf1c4d12a9.mp4', 'content_video/thumbnails/5e0cf1bf3deb5.jpg'),
(25, 'content_video/video_files/5e0cf2ceeec94.mp4', 'content_video/thumbnails/5e0cf2ce777fd.jpg'),
(36, 'content_video/video_files/5e17103a11fd3.mp4', 'content_video/thumbnails/5e171037ae934.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `view`
--

CREATE TABLE `view` (
  `view_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `view`
--

INSERT INTO `view` (`view_id`, `date`, `user_id`, `content_id`) VALUES
(795, '2020-01-10 09:27:02', 18, 4),
(798, '2020-01-10 09:23:18', 26, 20),
(799, '2020-01-10 08:53:18', 26, 23),
(801, '2020-01-10 08:54:16', 26, 3),
(803, '2020-01-10 08:56:27', 26, 25),
(804, '2020-01-10 08:56:59', 26, 14),
(807, '2020-01-10 09:23:48', 18, 20),
(812, '2020-01-10 09:26:03', 26, 4),
(817, '2020-01-10 09:28:25', 18, 25),
(819, '2020-01-11 13:57:02', 18, 32),
(821, '2020-01-11 13:58:07', 26, 32),
(823, '2020-01-11 14:00:06', 26, 36),
(824, '2020-01-11 14:30:59', 18, 24),
(825, '2020-01-30 20:38:11', 18, 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_sessions`
--
ALTER TABLE `account_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `Answer_ibfk_3` (`user_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `bycontent`
--
ALTER TABLE `bycontent`
  ADD PRIMARY KEY (`by_content_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `byfollowing`
--
ALTER TABLE `byfollowing`
  ADD PRIMARY KEY (`by_following_id`),
  ADD KEY `following` (`following`);

--
-- Indexes for table `byinterest`
--
ALTER TABLE `byinterest`
  ADD PRIMARY KEY (`by_interest_id`),
  ADD KEY `interest_id` (`interest_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`,`date_time`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `content_interest`
--
ALTER TABLE `content_interest`
  ADD PRIMARY KEY (`interest_id`,`content_id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`followed`,`follower`),
  ADD KEY `follower` (`follower`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`requestee`,`requestor`),
  ADD KEY `friend_2` (`requestor`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`interest_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`picture_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `user_interest`
--
ALTER TABLE `user_interest`
  ADD KEY `fk_interest` (`interest_id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `view`
--
ALTER TABLE `view`
  ADD PRIMARY KEY (`view_id`),
  ADD UNIQUE KEY `unique_index` (`user_id`,`content_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `content_id` (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `interest`
--
ALTER TABLE `interest`
  MODIFY `interest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `view`
--
ALTER TABLE `view`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=829;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `Answer_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `content` (`content_id`),
  ADD CONSTRAINT `Answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `Answer_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `Article_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `content` (`content_id`);

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `Bookmark_ibfk_1` FOREIGN KEY (`bookmark_id`) REFERENCES `view` (`view_id`);

--
-- Constraints for table `bycontent`
--
ALTER TABLE `bycontent`
  ADD CONSTRAINT `ByContent_ibfk_1` FOREIGN KEY (`by_content_id`) REFERENCES `notification` (`notification_id`),
  ADD CONSTRAINT `ByContent_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `interest` (`interest_id`);

--
-- Constraints for table `byfollowing`
--
ALTER TABLE `byfollowing`
  ADD CONSTRAINT `ByFollowing_ibfk_1` FOREIGN KEY (`by_following_id`) REFERENCES `notification` (`notification_id`),
  ADD CONSTRAINT `ByFollowing_ibfk_2` FOREIGN KEY (`following`) REFERENCES `follow` (`followed`);

--
-- Constraints for table `byinterest`
--
ALTER TABLE `byinterest`
  ADD CONSTRAINT `ByInterest_ibfk_1` FOREIGN KEY (`by_interest_id`) REFERENCES `notification` (`notification_id`),
  ADD CONSTRAINT `ByInterest_ibfk_2` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`interest_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_viewc` FOREIGN KEY (`comment_id`) REFERENCES `view` (`view_id`);

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `content_interest`
--
ALTER TABLE `content_interest`
  ADD CONSTRAINT `Content_Interest_ibfk_1` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`interest_id`),
  ADD CONSTRAINT `Content_Interest_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `Follow_ibfk_1` FOREIGN KEY (`followed`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `Follow_ibfk_2` FOREIGN KEY (`follower`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `Friend_ibfk_1` FOREIGN KEY (`requestee`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `Friend_ibfk_2` FOREIGN KEY (`requestor`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `fk_view` FOREIGN KEY (`like_id`) REFERENCES `view` (`view_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `Notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `Picture_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `content` (`content_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `content` (`content_id`);

--
-- Constraints for table `share`
--
ALTER TABLE `share`
  ADD CONSTRAINT `Share_ibfk_1` FOREIGN KEY (`share_id`) REFERENCES `view` (`view_id`);

--
-- Constraints for table `user_interest`
--
ALTER TABLE `user_interest`
  ADD CONSTRAINT `fk_interest` FOREIGN KEY (`interest_id`) REFERENCES `interest` (`interest_id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `Video_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `content` (`content_id`);

--
-- Constraints for table `view`
--
ALTER TABLE `view`
  ADD CONSTRAINT `View_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `View_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`content_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
