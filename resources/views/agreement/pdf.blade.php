<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <?php $namaAgent =  Auth::user()->agent_referral; ?>
    <?php $agentList = \App\Agent::where('ref_agent_name', $namaAgent )->first(); ?>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=us-ascii">
    <TITLE>{{ \Carbon\Carbon::now() }} | {{ $namaAgent }}</TITLE>
    <META NAME="GENERATOR" CONTENT="OpenOffice 4.1.1  (FreeBSD/amd64)">
    <META NAME="CREATED" CONTENT="20170210;562800">
    <META NAME="CHANGED" CONTENT="0;0">
    <META NAME="AppVersion" CONTENT="15.0000">
    <META NAME="DocSecurity" CONTENT="0">
    <META NAME="HyperlinksChanged" CONTENT="false">
    <META NAME="LinksUpToDate" CONTENT="false">
    <META NAME="ScaleCrop" CONTENT="false">
    <META NAME="ShareDoc" CONTENT="false">
    <STYLE TYPE="text/css">
        <!--
        @page {
            margin-left: 1in;
            margin-right: 1in;
            margin-top: 1in;
            margin-bottom: 0.5in
        }

        P {
            margin-bottom: 0.08in;
            direction: ltr;
            color: #000000;
            line-height: 100%;
            widows: 2;
            orphans: 2
        }

        P.western {
            font-family: "Times New Roman", serif;
            font-size: 12pt
        }

        P.cjk {
            font-size: 12pt
        }

        P.ctl {
            font-family: "Times New Roman";
            font-size: 12pt
        }

        -->
    </STYLE>
</HEAD>
<BODY LANG="en-US" TEXT="#000000" DIR="LTR">
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <?php $dateCreate = \Carbon\Carbon::parse($created_at); ?>
    <FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU">{{ $dateCreate->toDayDateTimeString() }}</SPAN></FONT></FONT></P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <FONT FACE="Times New Roman, serif"><FONT SIZE=6><SPAN LANG="en-AU"><B>AGREEMENT</B></SPAN></FONT></FONT></P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU">Between</SPAN></FONT></FONT></P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU"><B>IFMAL
TRADE SDN BHD </B></SPAN></FONT></FONT><FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU">(1209398-K) ,</SPAN></FONT></FONT><FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU"><B>
{{ $agentList["company_name"] }}</B></SPAN></FONT></FONT><FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU">
({{ $agentList["ssm_no"] }})</SPAN></FONT></FONT></P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU">And</SPAN></FONT></FONT></P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <FONT FACE="Times New Roman, serif"><FONT SIZE=4><SPAN LANG="en-AU">{{ Auth::user()->name }}
({{ Auth::user()->profile->ic_number }})</SPAN></FONT></FONT></P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P LANG="en-AU" CLASS="western" ALIGN=CENTER STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P LANG="en-AU" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P LANG="en-AU" CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    THIS AGREEMENT is made on the day of {{ $dateCreate->toFormattedDateString() }}
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Between</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <B>IFMAL TRADE SDN BHD </B><SPAN LANG="en-AU">(1209398-K)</SPAN>, a
    company incorporated under the Companies Act 1965 and having its
    business address at No. 13, Jalan MJ 16, Taman Perindustrian Meranti
    Jaya, 47120 Puchong, Selangor (hereinafter referred to as &ldquo;<B>the
        Company</B>&rdquo;) of the one part;
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    ,</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
{{ $agentList["company_name"] }} ({{ $agentList["ssm_no"] }}), an entity registered under the
    Companies Act 1965 and having its business address at {{ $agentList["address"] }} (hereinafter referred to as &ldquo;<B>the Agent</B>&rdquo;)
    of the one part;
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    and</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
   <B>{{ Auth::user()->name }}</B><B></B>({{ Auth::user()->profile->ic_number }}) of {{ Auth::user()->profile->location }} (hereinafter
    referred to as &ldquo;<B>the Investor </B>&rdquo;) of the other part.</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    WHEREAS:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL TYPE=A>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            The Company is carrying a business as a whole supplier selling food,
            homeware, kitchenware, utensils, barbeque sets and other related
            product. The Company regularly conducts warehouse sales to sell the
            products and also continuously selling through various online
            platforms (hereinafter referred to as &ldquo;<B>the Business</B>&rdquo;).
        </P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL TYPE=A START=2>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
	{{ $agentList["company_name"] }}
	(No: {{ $agentList["ssm_no"] }}) is an agent/dealer appointed by the Company
            (hereinafter referred to as the &ldquo;<B>Agent</B>&rdquo;).</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL TYPE=A START=3>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            The Parties hereby enter into this Agreement to regulate their
            relationship and respective roles in carrying out the investment in
            the Business upon and subject to the terms and conditions set out
            herein.</P>
</OL>
<P STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    The parties therefore agree as follows:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            Arrangement of Agreement</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The Investor agrees to purchase from the Company {{ $total_lot }}
                x <B>twenty-four (24)</B> boxes, each of which containing Corelle
                16-Piece Dinnerware Set (hereinafter referred to as the &ldquo;Products&quot;)
                for and in consideration of the sum of RM {{ $total_share }}.</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=2>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The balance of purchase price of the Products as prescribed under
                Clause 1 shall be paid on the day of the date of this Agreement.
            </P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.5in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=3>
        <?php
            if($package == 3){
            $kiraProfit = $total_investment * 0.03;
            $sumShare = ($kiraProfit * 18) +  $total_investment;
            }elseif($package == 2){
            $kiraProfit = $total_investment * 0.02;
            $sumShare = ($kiraProfit * 12) +  $total_investment;
            }else{
            $kiraProfit = $total_investment * 0.01;
            $sumShare = ($kiraProfit * 6) +  $total_investment;
            }
            ?>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The Agent promises to purchase the said Products from the Investor
                for and in consideration of the sum of RM {{ $sumShare }}
                of which shall be paid to the Investor in monthly
                installment for the period of @if($package == 3) 18 @elseif($package == 2) 12 @else 6 @endif
                months.</P>
    </OL>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=4>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The monthly installment shall be RM {{ $monthly_profit }}
                of which becomes due and payable on the 28 day of each month.</P>
    </OL>
</OL>
<P STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<OL>
    <OL START=5>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The balance of RM {{ $total_investment }} shall
                be paid to the Investor 28 days after the period of @if($package == 3) 18 @elseif($package == 2) 12 @else 6 @endif
                months.</P>
    </OL>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=6>
        <LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%"><FONT COLOR="#000000"><FONT
                            FACE="Times New Roman, serif"><FONT SIZE=3>The
                            payment of monthly installment shall only begin on the second month
                            from the date of this agreement after which the payment of monthly
                            installment shall be paid continuously in accordance to Clause 1.3
                            and Clause 1.4.</FONT></FONT></FONT></P>
    </OL>
</OL>
<P ALIGN=JUSTIFY STYLE="margin-left: 0.75in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=7>
        <LI><P ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%"><FONT COLOR="#000000"><FONT
                            FACE="Times New Roman, serif"><FONT SIZE=3>In
                            the event that the Agent fails to comply with its obligation sets
                            out under this Agreement, the Agent agrees to return the Products
                            equivalent to the remaining sum of unpaid monthly installment to
                            the Investor. </FONT></FONT></FONT>
            </P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=2>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            STANDARD OF CARE</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The Company shall, in carrying out its obligations under this
                Agreement, act honestly, in good faith and in the best interests of
                the Investor and in connection therewith shall exercise sufficient
                degree of care, diligence and skill.
            </P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=2>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                Notwithstanding the foregoing, the Investor understands and agrees
                that the Company does not represent and guarantee the performance
                of the Business.</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL START=3>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The Investor understands that there are risks attached to the
                Business of the Company including the market, currency, economic,
                political and business risks. The Investor agrees that the Company
                shall not be liable to the Investor for any loss that the Investor
                may suffer as a result of the Company&rsquo;s good faith decisions
                or actions where the Company exercises sufficient care, diligence
                and skill.</P>
    </OL>
</OL>
<P STYLE="margin-left: 0.5in; margin-bottom: 0in"><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=3>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            TERM AND TERMINATION OF AGREEMENT</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The term of this Agreement shall commence immediately and shall
                continue in full force and effect for a period of <B>@if($package == 3) 18 @elseif($package == 2) 12 @else 6 @endif</B><B>
                    months</B>.</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=4>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            TIME</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                Time shall be considered to be of the essence.</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=5>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            VARIATION</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                The parties may at any time, and from time to time, amend this
                Agreement by mutual consent. Any amendment shall only be effective
                if made in writing and signed by the Company and the Investor .</P>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            </P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=6>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            SEVERABILITY</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                If at any time during the currency of this Agreement any terms
                condition stipulation provision covenant or undertaking in this
                Agreement is or becomes illegal, void, invalid, prohibited or
                unenforceable in any respect the same shall be ineffective to the
                extent of such illegality, invalidity, prohibition or
                unenforceability without invalidating in any manner whatsoever t</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=7>
    <LI><P STYLE="margin-bottom: 0in; line-height: 150%"><FONT COLOR="#000000"><FONT FACE="Times New Roman, serif"><FONT
                            SIZE=3>Force
                        Majeure</FONT></FONT></FONT></P>
</OL>
<P STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P STYLE="margin-bottom: 0in; line-height: 150%"><FONT COLOR="#000000"><FONT
                            FACE="Times New Roman, serif"><FONT SIZE=3>If
                            either party hereto is prevented in the performance of any act
                            required hereunder by reason of act of God, fire, flood, or other
                            natural disaster, malicious injury, strikes, lock-outs, or other
                            labour troubles, riots, insurrection, war or other reason of like
                            nature not the fault of the party in performing under this
                            Agreement, then performance of such act shall be excused for the
                            period of the delay and the period of the performance of any such
                            act shall be extended for a period equivalent to the period of such
                            delay except that if any delay exceeds six months, then the party
                            entitled to such performance shall have the option to terminate
                            this Agreement.</FONT></FONT></FONT></P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=8>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            ENTIRE AGREEMENT</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                This Agreement sets forth the entire understanding of the parties
                and is intended to be the complete and exclusive statement of the
                terms thereof. This Agreement supersedes and cancels any and all
                prior agreements between the parties, whether written or oral,
                relating to the management of the Account.</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.55in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=9>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            NOTICES</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
                Notices served pursuant to any term of this Agreement shall be
                served in writing and shall be served only if it handed from one
                Party to another in person or if delivered to the address for
                service of the Party in question.</P>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL START=10>
    <LI><P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
            GOVERNING LAW AND JURISDICTION</P>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<OL>
    <OL>
        <OL>
            <LI><P CLASS="western" STYLE="margin-bottom: 0in; line-height: 150%">
                    This Agreement shall be governed by and construed in all respects
                    in accordance with the laws of Malaysia in respect of any dispute,
                    suit, action, arbitration or proceedings which may arise out of or
                    in connection with this Agreement.</P>
        </OL>
    </OL>
</OL>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.07in; margin-bottom: 0.07in; line-height: 150%">
    <BR><BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-top: 0.07in; margin-bottom: 0.07in; line-height: 150%">
    <BR><BR>
</P>
<P CLASS="western" ALIGN=CENTER STYLE="margin-top: 0.07in; margin-bottom: 0.07in; line-height: 150%">
    <FONT FACE="Times New Roman, serif"><FONT SIZE=3>IN WITNESS WHEREOF,
            each of the Parties has executed this Agreement:</FONT></FONT></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-left: 0.25in; margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Signed on behalf of the Company, )</P>

<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    In the presence of:</P>
<img  width="30%" src="{{ asset('/assets/img/sigexe.png') }}" alt="siggy">
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    IFMAL TRADE SDN BHD )
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    (1209398-K) )</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Date : {{ $dateCreate->toFormattedDateString() }}</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Signed by the Agent, )</P>
<img width="40%"  src="{{ \App\User::find($agentList["user_id"])->signature }}" alt="agent sig">
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    In the presence of:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Name: <span style="border-bottom: 1px dashed #cfcfcf ; ">{{ \App\User::find($agentList["user_id"])->name }} )</span></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    NRIC / SSM No. : <span style="border-bottom: 1px dashed #cfcfcf ; ">{{ \App\User::find($agentList["user_id"])->agent->ssm_no }} )</span></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Date: {{ $dateCreate->toFormattedDateString() }}</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Signed by the Investor, )</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    </P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    </P>
<img src="{{ Auth::user()->signature }}" width="40%" alt="">
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    In the presence of:</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Name: <span style="border-bottom: 1px dashed #cfcfcf ; ">{{ Auth::user()->name }} )</span></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    NRIC: <span style="border-bottom: 1px dashed #cfcfcf ;">{{ Auth::user()->profile->ic_number }} )</span></P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    <BR>
</P>
<P CLASS="western" ALIGN=JUSTIFY STYLE="margin-bottom: 0in; line-height: 150%">
    Date: {{ $dateCreate->toFormattedDateString() }}</P>
</BODY>
</HTML>
