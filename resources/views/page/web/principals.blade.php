<?php
  $title = "Past Principals";
?>
@extends('layouts.web.app')

@section('content')

<style>
  .table th
  {
    text-align: center;
  }

  td:first-child 
  {
      text-align: right;
  }
  
  td:nth-child(3)
  {
      text-align: center;
  }
 
  
  @media screen and (max-width:1024px) 
  {
    .innerContent-wrap
    {
      margin-top: 90px !important;
    }
  }
</style>

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container"> 
    <div class="blog_inner bloggridWrp">
      <div class="row">
          <div class="col-lg-12 ">
            <br/>
            <h3>Past Principals of our school</h3>
            <div>
              <table class="table table-bordered table-condensed table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Tenure</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mr J.N Saravanamuththu</td>
                    <td>1927 - 1933</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Mr V. Velupillai</td>
                    <td>1933 - 1939</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Mr V. Moorthy</td>
                    <td>1939 - 1939</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Mr S. Kulasingam</td>
                    <td>1939 - 1941</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Mr S. Kanagasingam</td>
                    <td>1941 - 1943</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Mr S.K Arasarathinam</td>
                    <td>1943 - 1947</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Mr M. Ponnampalam</td>
                    <td>1947 - 1958</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Mr K. Murugesapillai</td>
                    <td>1958 - 1961</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Mr K. Thamotharampillai</td>
                    <td>1962 - 1963</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Mr A.J. Rajakularatnam</td>
                    <td>1963 - 1964</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Mr S. Sivakurunathan</td>
                    <td>1964 - 1965</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Mr N. Gnanasampanthan</td>
                    <td>1965 - 1966</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>Mr K. Vaiththiyanathan</td>
                    <td>1966 - 1970</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Mr P. Kansan</td>
                    <td>1970 - 1971</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Mr S. Arumugam</td>
                    <td>1971 - 1971</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Mr M. Shanmuganathan</td>
                    <td>1972 - 1972</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>Mrs P. Separatnam</td>
                    <td>1972 - 1973</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Mr S. Kanthasamy</td>
                    <td>1973 - 1973</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>Mr M. Shanmuganathan</td>
                    <td>1973 - 1978</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>Mr A.K. Rajediram</td>
                    <td>1979 - 1986</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>Mr J.M.P. Jeyarajah</td>
                    <td>1987 - 1994</td>
                </tr>
                <tr>
                    <td>22</td>
                    <td>Mr V. Sittampalam</td>
                    <td>1995 - 1997</td>
                </tr>
                <tr>
                    <td>23</td>
                    <td>Mr N. Nadarajah</td>
                    <td>1997 - 2001</td>
                </tr>
                <tr>
                    <td>24</td>
                    <td>Mr V. Yoganathan</td>
                    <td>2001 - 2007</td>
                </tr>
                <tr>
                    <td>25</td>
                    <td>Mr S. Shritharan</td>
                    <td>2007 - 2010</td>
                </tr>
                <tr>
                    <td>26</td>
                    <td>Mr A. Pangayatselvan</td>
                    <td>2010 - 2015</td>
                </tr>
                <tr>
                    <td>27</td>
                    <td>Mrs. J. Thanapalasingam</td>
                    <td>2015 - 2023</td>
                </tr>
                <tr>
                    <td>28</td>
                    <td>Mrs. I. Nirmalaraj</td>
                    <td>2023 - Till Now</td>
                </tr>
              </table>
    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Inner Content Start --> 

@endsection