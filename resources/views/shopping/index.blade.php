@extends('layouts.index')

@section('content')
<header id="tt-header" class="headertype5">
<div class="tt-desktop-header">
	<div class="container">
		<div class="tt-header-holder">
			<div class="tt-obj-menu obj-aligment-center">
				<!-- tt-menu -->
				<div class="tt-parent-box" id="tt-desctop-parent-menu__icon">
					<div class="tt-desctop-menu" id="tt-desctop-menu__icon">
						<nav>
							<ul>
							
							@foreach($complete_data as $key => $d)
								<li class="dropdown">
									<a href="listing-left-column.html">
										<span class="tt-icon">
											<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
												@if($key == 0)
												<path d="M14.625 19.6875C14.625 20.1562 14.4609 20.5547 14.1328 20.8828C13.8047 21.2109 13.4062 21.375 12.9375 21.375C12.4688 21.375 12.0703 21.2109 11.7422 20.8828C11.4141 20.5547 11.25 20.1562 11.25 19.6875C11.25 19.2188 11.4141 18.8203 11.7422 18.4922C12.0703 18.1641 12.4688 18 12.9375 18C13.4062 18 13.8047 18.1641 14.1328 18.4922C14.4609 18.8203 14.625 19.2188 14.625 19.6875ZM24.75 19.6875C24.75 20.1562 24.5859 20.5547 24.2578 20.8828C23.9297 21.2109 23.5312 21.375 23.0625 21.375C22.5938 21.375 22.1953 21.2109 21.8672 20.8828C21.5391 20.5547 21.375 20.1562 21.375 19.6875C21.375 19.2188 21.5391 18.8203 21.8672 18.4922C22.1953 18.1641 22.5938 18 23.0625 18C23.5312 18 23.9297 18.1641 24.2578 18.4922C24.5859 18.8203 24.75 19.2188 24.75 19.6875ZM18 0C15.5156 0 13.1836 0.480469 11.0039 1.44141C8.82422 2.37891 6.91406 3.66797 5.27344 5.30859C3.65625 6.92578 2.36719 8.82422 1.40625 11.0039C0.46875 13.1836 0 15.5156 0 18V30.832L0.316406 31.1836C0.363281 31.2305 0.714844 31.5117 1.37109 32.0273C2.05078 32.5195 3.08203 33.0703 4.46484 33.6797C5.87109 34.2656 7.6875 34.793 9.91406 35.2617C12.1406 35.7539 14.8359 36 18 36C21.1641 36 23.8594 35.7539 26.0859 35.2617C28.3125 34.793 30.1172 34.2656 31.5 33.6797C32.9062 33.0703 33.9375 32.5195 34.5938 32.0273C35.2734 31.5117 35.6367 31.2305 35.6836 31.1836L36 30.832V18C36 15.5156 35.5195 13.1836 34.5586 11.0039C33.6211 8.82422 32.332 6.92578 30.6914 5.30859C29.0742 3.66797 27.1758 2.37891 24.9961 1.44141C22.8164 0.480469 20.4844 0 18 0ZM33.75 29.8477C33.4453 30.082 32.918 30.4219 32.168 30.8672C31.4414 31.2891 30.4336 31.7227 29.1445 32.168C27.8789 32.5898 26.3203 32.9648 24.4688 33.293C22.6406 33.5977 20.4844 33.75 18 33.75C15.5391 33.75 13.3828 33.5977 11.5312 33.293C9.70312 32.9648 8.14453 32.5898 6.85547 32.168C5.58984 31.7227 4.58203 31.2891 3.83203 30.8672C3.08203 30.4219 2.55469 30.082 2.25 29.8477V18C2.25 15.8203 2.66016 13.7812 3.48047 11.8828C4.32422 9.96094 5.44922 8.29688 6.85547 6.89062C8.28516 5.46094 9.94922 4.33594 11.8477 3.51562C13.7695 2.67188 15.8203 2.25 18 2.25C20.1797 2.25 22.2188 2.67188 24.1172 3.51562C26.0391 4.33594 27.7031 5.46094 29.1094 6.89062C30.5391 8.29688 31.6641 9.96094 32.4844 11.8828C33.3281 13.7812 33.75 15.8203 33.75 18V29.8477ZM23.9766 5.90625L23.168 5.48438L22.5703 6.22266C21.8203 7.20703 20.9766 8.08594 20.0391 8.85938C19.125 9.60938 18.1289 10.2539 17.0508 10.793C15.9961 11.3086 14.8828 11.707 13.7109 11.9883C12.5391 12.2461 11.3438 12.375 10.125 12.375C9.58594 12.375 9.03516 12.3516 8.47266 12.3047C7.93359 12.2344 7.39453 12.1406 6.85547 12.0234L5.94141 11.8477L5.58984 12.6914C5.23828 13.5352 4.96875 14.4023 4.78125 15.293C4.59375 16.1836 4.5 17.0859 4.5 18C4.5 19.8516 4.85156 21.5977 5.55469 23.2383C6.25781 24.8789 7.21875 26.3203 8.4375 27.5625C9.67969 28.7812 11.1211 29.7422 12.7617 30.4453C14.4023 31.1484 16.1484 31.5 18 31.5C19.8516 31.5 21.5977 31.1484 23.2383 30.4453C24.8789 29.7422 26.3086 28.7812 27.5273 27.5625C28.7695 26.3203 29.7422 24.8789 30.4453 23.2383C31.1484 21.5977 31.5 19.8516 31.5 18C31.5 16.7109 31.3242 15.4688 30.9727 14.2734C30.6211 13.0547 30.1172 11.9297 29.4609 10.8984C28.8281 9.84375 28.043 8.89453 27.1055 8.05078C26.1914 7.20703 25.1484 6.49219 23.9766 5.90625ZM18 29.25C16.4531 29.25 14.9883 28.957 13.6055 28.3711C12.2461 27.7852 11.0508 26.9883 10.0195 25.9805C9.01172 24.9492 8.21484 23.7539 7.62891 22.3945C7.04297 21.0117 6.75 19.5469 6.75 18C6.75 17.3906 6.79688 16.7812 6.89062 16.1719C6.98438 15.5625 7.13672 14.9766 7.34766 14.4141C7.79297 14.4844 8.25 14.543 8.71875 14.5898C9.1875 14.6133 9.65625 14.625 10.125 14.625C11.4375 14.625 12.7266 14.4844 13.9922 14.2031C15.2578 13.9219 16.4648 13.5234 17.6133 13.0078C18.7852 12.4688 19.8867 11.8125 20.918 11.0391C21.9492 10.2422 22.8984 9.35156 23.7656 8.36719C24.6094 8.85938 25.3711 9.45703 26.0508 10.1602C26.7305 10.8398 27.3047 11.6016 27.7734 12.4453C28.2422 13.2656 28.6055 14.1445 28.8633 15.082C29.1211 16.0195 29.25 16.9922 29.25 18C29.25 19.5469 28.957 21.0117 28.3711 22.3945C27.7852 23.7539 26.9766 24.9492 25.9453 25.9805C24.9375 26.9883 23.7422 27.7852 22.3594 28.3711C21 28.957 19.5469 29.25 18 29.25Z" fill="currentColor"/>
												@elseif($key == 1) 
												<path d="M18 0C15.5156 0 13.1836 0.480469 11.0039 1.44141C8.82422 2.37891 6.91406 3.66797 5.27344 5.30859C3.65625 6.92578 2.36719 8.82422 1.40625 11.0039C0.46875 13.1836 0 15.5156 0 18C0 20.4844 0.46875 22.8164 1.40625 24.9961C2.36719 27.1758 3.65625 29.0859 5.27344 30.7266C6.91406 32.3438 8.82422 33.6211 11.0039 34.5586C13.1836 35.5195 15.5156 36 18 36C20.4844 36 22.8164 35.5195 24.9961 34.5586C27.1758 33.6211 29.0742 32.3438 30.6914 30.7266C32.332 29.0859 33.6211 27.1758 34.5586 24.9961C35.5195 22.8164 36 20.4844 36 18C36 15.5156 35.5195 13.1836 34.5586 11.0039C33.6211 8.82422 32.332 6.92578 30.6914 5.30859C29.0742 3.66797 27.1758 2.37891 24.9961 1.44141C22.8164 0.480469 20.4844 0 18 0ZM18 2.25C19.9219 2.25 21.7383 2.57812 23.4492 3.23438C25.1836 3.89062 26.7305 4.79297 28.0898 5.94141C29.4492 7.06641 30.5977 8.41406 31.5352 9.98438C32.4727 11.5312 33.1172 13.2188 33.4688 15.0469C32.5078 14.7656 31.2422 14.1445 29.6719 13.1836C28.1016 12.1992 26.5781 10.5352 25.1016 8.19141L24.3633 7.06641L23.3789 7.94531C22.207 9.02344 21.0469 9.85547 19.8984 10.4414C18.75 11.0039 17.625 11.4141 16.5234 11.6719C15.4219 11.9297 14.332 12.082 13.2539 12.1289C12.1992 12.1758 11.1797 12.1992 10.1953 12.1992C8.90625 12.1992 7.64062 12.2461 6.39844 12.3398C5.17969 12.4336 4.03125 12.7734 2.95312 13.3594C3.44531 11.7656 4.17188 10.2891 5.13281 8.92969C6.11719 7.57031 7.26562 6.39844 8.57812 5.41406C9.89062 4.40625 11.3438 3.63281 12.9375 3.09375C14.5547 2.53125 16.2422 2.25 18 2.25ZM18 33.75C15.8203 33.75 13.7695 33.3398 11.8477 32.5195C9.94922 31.6758 8.28516 30.5508 6.85547 29.1445C5.44922 27.7148 4.32422 26.0508 3.48047 24.1523C2.66016 22.2305 2.25 20.1797 2.25 18C2.25 17.7891 2.25 17.5898 2.25 17.4023C2.27344 17.1914 2.29688 16.9922 2.32031 16.8047C3.28125 15.6328 4.39453 14.9531 5.66016 14.7656C6.94922 14.5547 8.46094 14.4492 10.1953 14.4492C11.1797 14.4492 12.2109 14.4258 13.2891 14.3789C14.3672 14.332 15.4805 14.1914 16.6289 13.957C17.8008 13.6992 18.9961 13.3008 20.2148 12.7617C21.4336 12.2227 22.6641 11.4609 23.9062 10.4766C24.8203 11.7422 25.7461 12.7969 26.6836 13.6406C27.6445 14.4844 28.5703 15.1758 29.4609 15.7148C30.3516 16.2305 31.1602 16.6172 31.8867 16.875C32.6367 17.1328 33.2461 17.3203 33.7148 17.4375C33.7148 17.5312 33.7148 17.625 33.7148 17.7188C33.7383 17.8125 33.75 17.9062 33.75 18C33.75 20.1797 33.3281 22.2305 32.4844 24.1523C31.6641 26.0508 30.5391 27.7148 29.1094 29.1445C27.7031 30.5508 26.0391 31.6758 24.1172 32.5195C22.2188 33.3398 20.1797 33.75 18 33.75ZM12.375 21.375C12.375 22.0078 12.1523 22.5469 11.707 22.9922C11.2852 23.4141 10.7578 23.625 10.125 23.625C9.49219 23.625 8.95312 23.4141 8.50781 22.9922C8.08594 22.5469 7.875 22.0078 7.875 21.375C7.875 20.7422 8.08594 20.2148 8.50781 19.793C8.95312 19.3477 9.49219 19.125 10.125 19.125C10.7578 19.125 11.2852 19.3477 11.707 19.793C12.1523 20.2148 12.375 20.7422 12.375 21.375ZM28.125 21.375C28.125 22.0078 27.9023 22.5469 27.457 22.9922C27.0352 23.4141 26.5078 23.625 25.875 23.625C25.2422 23.625 24.7031 23.4141 24.2578 22.9922C23.8359 22.5469 23.625 22.0078 23.625 21.375C23.625 20.7422 23.8359 20.2148 24.2578 19.793C24.7031 19.3477 25.2422 19.125 25.875 19.125C26.5078 19.125 27.0352 19.3477 27.457 19.793C27.9023 20.2148 28.125 20.7422 28.125 21.375Z" fill="currentColor"/>												
												@elseif($key == 2)
												<path d="M5.66333 36H26.2297C27.0735 36 27.8704 35.8125 28.6204 35.4375C29.3938 35.0859 30.0618 34.5938 30.6243 33.9609C31.1868 33.3047 31.5618 32.5781 31.7493 31.7812C31.9368 30.9609 31.9719 30.1523 31.8547 29.3555L28.3743 11.0391C28.3274 10.7578 28.1985 10.5352 27.9875 10.3711C27.7766 10.207 27.5305 10.125 27.2493 10.125H22.7493V6.75C22.7493 4.89844 22.0813 3.31641 20.7454 2.00391C19.4329 0.667969 17.8508 0 15.9993 0C14.1477 0 12.554 0.667969 11.218 2.00391C9.90552 3.31641 9.24927 4.89844 9.24927 6.75V10.125H4.74927C4.46802 10.125 4.22192 10.207 4.01099 10.3711C3.80005 10.5352 3.67114 10.7578 3.62427 11.0391L0.143799 29.3555C-0.0202637 30.1523 0.00317383 30.9609 0.214111 31.7812C0.425049 32.5781 0.811768 33.3047 1.37427 33.9609C1.88989 34.5938 2.52271 35.0859 3.27271 35.4375C4.02271 35.8125 4.81958 36 5.66333 36ZM11.4993 6.75C11.4993 5.50781 11.9329 4.45312 12.8 3.58594C13.6907 2.69531 14.7571 2.25 15.9993 2.25C17.2415 2.25 18.2961 2.69531 19.1633 3.58594C20.054 4.45312 20.4993 5.50781 20.4993 6.75V10.125H11.4993V6.75ZM2.3938 29.707L5.66333 12.375H26.2297L29.4993 29.707C29.6165 30.1992 29.6047 30.6914 29.4641 31.1836C29.3235 31.6758 29.1125 32.1211 28.8313 32.5195C28.4797 32.918 28.0813 33.2227 27.636 33.4336C27.2141 33.6445 26.7454 33.75 26.2297 33.75H5.66333C5.14771 33.75 4.66724 33.6445 4.22192 33.4336C3.77661 33.2227 3.38989 32.918 3.06177 32.5195C2.78052 32.1211 2.56958 31.6758 2.42896 31.1836C2.28833 30.6914 2.27661 30.1992 2.3938 29.707Z" fill="currentColor"/>
											
												@elseif($key == 3)
												<path d="M31.5 8.5H27.3516L17.543 0.835938C17.4258 0.789062 17.3086 0.742188 17.1914 0.695312C17.0977 0.648438 16.9922 0.625 16.875 0.625H14.625C14.3906 0.625 14.1914 0.683594 14.0273 0.800781C13.8633 0.917969 13.7227 1.08203 13.6055 1.29297C13.6055 1.29297 13.2539 1.75 12.5508 2.66406C11.8711 3.55469 10.6875 4 9 4C7.35938 4 6.1875 3.56641 5.48438 2.69922C4.80469 1.83203 4.44141 1.36328 4.39453 1.29297C4.27734 1.08203 4.13672 0.917969 3.97266 0.800781C3.80859 0.683594 3.60938 0.625 3.375 0.625H1.125C0.796875 0.625 0.527344 0.730469 0.316406 0.941406C0.105469 1.15234 0 1.42188 0 1.75V17.5C0 18.4609 0.316406 19.2695 0.949219 19.9258C1.60547 20.5586 2.41406 20.875 3.375 20.875H32.625C33.5859 20.875 34.3828 20.5586 35.0156 19.9258C35.6719 19.2695 36 18.4609 36 17.5V13C36 11.7578 35.5547 10.7031 34.6641 9.83594C33.7969 8.94531 32.7422 8.5 31.5 8.5ZM2.70703 2.875C3.10547 3.4375 3.79688 4.14062 4.78125 4.98438C5.78906 5.82812 7.19531 6.25 9 6.25C10.8047 6.25 12.1992 5.82812 13.1836 4.98438C14.1914 4.14062 14.8945 3.4375 15.293 2.875H16.5234L26.332 10.5391C26.4492 10.5859 26.5547 10.6328 26.6484 10.6797C26.7656 10.7266 26.8828 10.75 27 10.75H31.5C32.1094 10.75 32.6367 10.9727 33.082 11.418C33.5273 11.8633 33.75 12.3906 33.75 13V14.125H2.25V2.875H2.70703ZM32.625 18.625H3.375C3.04688 18.625 2.77734 18.5195 2.56641 18.3086C2.35547 18.0977 2.25 17.8281 2.25 17.5V16.375H33.75V17.5C33.75 17.8281 33.6445 18.0977 33.4336 18.3086C33.2227 18.5195 32.9531 18.625 32.625 18.625Z" fill="currentColor"/>
											
												@elseif($key == 4)
												<path d="M18 0C15.5 0 13.15 0.475 10.95 1.425C8.775 2.35 6.875 3.625 5.25 5.25C3.625 6.875 2.3375 8.7875 1.3875 10.9875C0.4625 13.1625 0 15.5 0 18C0 20.5 0.4625 22.8375 1.3875 25.0125C2.3375 27.1875 3.625 29.1 5.25 30.75C6.875 32.375 8.775 33.6625 10.95 34.6125C13.15 35.5375 15.5 36 18 36C20.5 36 22.8375 35.5375 25.0125 34.6125C27.1875 33.6625 29.0875 32.375 30.7125 30.75C32.3625 29.125 33.65 27.225 34.575 25.05C35.525 22.85 36 20.5 36 18C36 15.5 35.525 13.1625 34.575 10.9875C33.65 8.8125 32.375 6.9125 30.75 5.2875C29.125 3.6375 27.2125 2.35 25.0125 1.425C22.8375 0.475 20.5 0 18 0ZM18 33.6C15.85 33.6 13.825 33.2 11.925 32.4C10.025 31.575 8.3625 30.4625 6.9375 29.0625C5.5375 27.6375 4.425 25.975 3.6 24.075C2.8 22.175 2.4 20.15 2.4 18C2.4 15.85 2.8 13.825 3.6 11.925C4.425 10.025 5.5375 8.375 6.9375 6.975C8.3625 5.55 10.025 4.4375 11.925 3.6375C13.825 2.8125 15.85 2.4 18 2.4C20.15 2.4 22.175 2.8125 24.075 3.6375C25.975 4.4375 27.625 5.55 29.025 6.975C30.45 8.375 31.5625 10.025 32.3625 11.925C33.1875 13.825 33.6 15.85 33.6 18C33.6 20.15 33.1875 22.175 32.3625 24.075C31.5625 25.975 30.45 27.6375 29.025 29.0625C27.625 30.4625 25.975 31.575 24.075 32.4C22.175 33.2 20.15 33.6 18 33.6ZM16.8 12.6C16.8 11.45 16.3875 10.4625 15.5625 9.6375C14.7375 8.8125 13.75 8.4 12.6 8.4C11.45 8.4 10.4625 8.8125 9.6375 9.6375C8.8125 10.4625 8.4 11.45 8.4 12.6C8.4 13.75 8.8125 14.7375 9.6375 15.5625C10.4625 16.3875 11.45 16.8 12.6 16.8C13.75 16.8 14.7375 16.3875 15.5625 15.5625C16.3875 14.7375 16.8 13.75 16.8 12.6ZM10.8 12.6C10.8 12.125 10.975 11.7125 11.325 11.3625C11.7 10.9875 12.125 10.8 12.6 10.8C13.075 10.8 13.4875 10.9875 13.8375 11.3625C14.2125 11.7125 14.4 12.125 14.4 12.6C14.4 13.075 14.2125 13.5 13.8375 13.875C13.4875 14.225 13.075 14.4 12.6 14.4C12.125 14.4 11.7 14.225 11.325 13.875C10.975 13.5 10.8 13.075 10.8 12.6ZM23.4 19.2C22.25 19.2 21.2625 19.6125 20.4375 20.4375C19.6125 21.2625 19.2 22.25 19.2 23.4C19.2 24.55 19.6125 25.5375 20.4375 26.3625C21.2625 27.1875 22.25 27.6 23.4 27.6C24.55 27.6 25.5375 27.1875 26.3625 26.3625C27.1875 25.5375 27.6 24.55 27.6 23.4C27.6 22.25 27.1875 21.2625 26.3625 20.4375C25.5375 19.6125 24.55 19.2 23.4 19.2ZM23.4 25.2C22.925 25.2 22.5 25.025 22.125 24.675C21.775 24.3 21.6 23.875 21.6 23.4C21.6 22.925 21.775 22.5125 22.125 22.1625C22.5 21.7875 22.925 21.6 23.4 21.6C23.875 21.6 24.2875 21.7875 24.6375 22.1625C25.0125 22.5125 25.2 22.925 25.2 23.4C25.2 23.875 25.0125 24.3 24.6375 24.675C24.2875 25.025 23.875 25.2 23.4 25.2ZM24.825 11.175C24.6 10.925 24.325 10.8 24 10.8C23.675 10.8 23.4 10.925 23.175 11.175L11.175 23.175C10.925 23.4 10.8 23.675 10.8 24C10.8 24.325 10.925 24.6 11.175 24.825C11.275 24.95 11.4 25.05 11.55 25.125C11.725 25.175 11.875 25.2 12 25.2C12.125 25.2 12.2625 25.175 12.4125 25.125C12.5875 25.05 12.725 24.95 12.825 24.825L24.825 12.825C25.075 12.6 25.2 12.325 25.2 12C25.2 11.675 25.075 11.4 24.825 11.175Z" fill="currentColor"/>
											
												@elseif($key == 5)
												<path d="M21.1197 0.665033C20.8745 0.533007 20.617 0.480196 20.3473 0.506601C20.1021 0.506601 19.8936 0.59902 19.722 0.783857L0.888854 19.7957C0.692675 20.0597 0.570064 20.3238 0.521019 20.5878C0.471975 20.8255 0.508758 21.0763 0.631369 21.3404C0.704936 21.5252 0.839809 21.6968 1.03599 21.8553C1.23217 22.0137 1.45287 22.0929 1.69809 22.0929H14.4252L12.2917 31.9949C12.2427 32.2325 12.2672 32.4966 12.3653 32.7871C12.4634 33.0511 12.635 33.2491 12.8803 33.3812C13.0029 33.434 13.101 33.4736 13.1745 33.5C13.2481 33.5 13.3462 33.5 13.4688 33.5C13.5914 33.5 13.7263 33.4736 13.8734 33.4208C14.0451 33.3416 14.1799 33.2359 14.278 33.1039L33.1111 14.0921C33.3073 13.9073 33.4299 13.696 33.479 13.4584C33.528 13.2207 33.4912 12.9699 33.3686 12.7058C33.2951 12.521 33.1602 12.3494 32.964 12.1909C32.7678 12.0325 32.5471 11.9533 32.3019 11.9533H19.5748L21.7083 2.05131C21.7573 1.81366 21.7328 1.56281 21.6347 1.29876C21.5366 1.0083 21.365 0.797059 21.1197 0.665033ZM29.3592 14.4882L15.4551 28.549L17 21.2215C17.049 21.0103 17.049 20.8255 17 20.667C16.951 20.4822 16.8774 20.3238 16.7793 20.1917C16.6567 19.9277 16.5096 19.7561 16.3379 19.6768C16.1662 19.5976 15.9946 19.558 15.8229 19.558H4.64076L18.5449 5.4972L17 12.9831C16.951 13.1679 16.951 13.3528 17 13.5376C17.049 13.696 17.1226 13.8413 17.2207 13.9733C17.3433 14.1053 17.4904 14.2241 17.6621 14.3298C17.8338 14.4354 18.0054 14.4882 18.1771 14.4882H29.3592Z" fill="currentColor"/>
											
												@else
												<path d="M34.875 6.75H28.6172C28.8047 6.42188 28.957 6.07031 29.0742 5.69531C29.1914 5.32031 29.25 4.92188 29.25 4.5C29.25 3.25781 28.8047 2.20312 27.9141 1.33594C27.0469 0.445312 25.9922 0 24.75 0C22.9922 0 21.5625 0.539062 20.4609 1.61719C19.3828 2.69531 18.5625 3.77344 18 4.85156C17.4375 3.77344 16.6055 2.69531 15.5039 1.61719C14.4258 0.539062 13.0078 0 11.25 0C10.0078 0 8.94141 0.445312 8.05078 1.33594C7.18359 2.20312 6.75 3.25781 6.75 4.5C6.75 4.92188 6.80859 5.32031 6.92578 5.69531C7.04297 6.07031 7.19531 6.42188 7.38281 6.75H1.125C0.820312 6.75 0.550781 6.86719 0.316406 7.10156C0.105469 7.3125 0 7.57031 0 7.875V13.5C0 13.8047 0.105469 14.0742 0.316406 14.3086C0.550781 14.5195 0.820312 14.625 1.125 14.625H3.375V34.875C3.375 35.1797 3.48047 35.4375 3.69141 35.6484C3.92578 35.8828 4.19531 36 4.5 36H31.5C31.8047 36 32.0625 35.8828 32.2734 35.6484C32.5078 35.4375 32.625 35.1797 32.625 34.875V14.625H34.875C35.1797 14.625 35.4375 14.5195 35.6484 14.3086C35.8828 14.0742 36 13.8047 36 13.5V7.875C36 7.57031 35.8828 7.3125 35.6484 7.10156C35.4375 6.86719 35.1797 6.75 34.875 6.75ZM24.75 2.25C25.3594 2.25 25.8867 2.47266 26.332 2.91797C26.7773 3.36328 27 3.89062 27 4.5C27 5.10938 26.7773 5.63672 26.332 6.08203C25.8867 6.52734 25.3594 6.75 24.75 6.75H19.582C19.957 5.88281 20.5547 4.92188 21.375 3.86719C22.2188 2.78906 23.3438 2.25 24.75 2.25ZM20.25 9V12.375H15.75V9H20.25ZM9 4.5C9 3.89062 9.22266 3.36328 9.66797 2.91797C10.1133 2.47266 10.6406 2.25 11.25 2.25C12.6328 2.25 13.7461 2.78906 14.5898 3.86719C15.4336 4.92188 16.043 5.88281 16.418 6.75H11.25C10.6406 6.75 10.1133 6.52734 9.66797 6.08203C9.22266 5.63672 9 5.10938 9 4.5ZM2.25 9H13.5V12.375H2.25V9ZM5.625 14.625H13.5V33.75H5.625V14.625ZM15.75 33.75V14.625H20.25V33.75H15.75ZM30.375 33.75H22.5V14.625H30.375V33.75ZM33.75 12.375H22.5V9H33.75V12.375Z" fill="currentColor"/>
											
												@endif
											</svg>

										</span>
										<span class="tt-text">{{$d->name}}</span>
									</a>
									<div class="dropdown-menu">
										<div class="row">
											<div class="col-sm-8">
												<div class="row tt-col-list">

													@foreach($d->subcategories as $key => $c)
														@if($key > 2)
															@break
														@endif
														<div class="col-sm-3">
															<a class="tt-title-submenu" href="{{url('/sub-category/'.$c->slug)}}">
																{{$c->name}}
															</a>
															<ul class="tt-megamenu-submenu">
															@foreach($c->product as $key => $p)
																@if($key > 4)
																	@break
																@endif
																<li><a href="{{url('/product/'.$p->slug)}}">{{$p->name}}</a></li>
															@endforeach
															</ul>
														</div>
													@endforeach	

														<div class="col-sm-3">
															<a class="tt-title-submenu" href="{{url('/brands')}}">
																TOP BRANDS
															</a>
															<ul class="tt-listing-01">
															@foreach($popular_brands as $key => $b)
																@if($key > 5)
																	@break
																@endif
																<li><a href="{{url('/shop?brand='.$b->id)}}"><img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/brands/'.$b->image)}}" alt=""></a></li>
															@endforeach
															</ul>
														</div>
													
												</div>
											</div>
											<div class="col-sm-4">
												<a href="listing-left-column.html" class="tt-title-submenu">SPECIALS</a>
				
												<div class="tt-menu-slider header-menu-product arrow-location-03 row">
													@foreach($d->subcategories as $key => $c)
				
														@foreach($c->product as $key => $p)
															@if($key > 1)
																@break
															@endif
															<div class="col-2">
																<div class="tt-product thumbprod-center">
																	<a href="{{url('/product/'.$p->slug)}}">
																		<div class="tt-image-box">
																		@foreach(explode(',',$p->images) as $image)
																			@if ($loop->first)
																			<span class="tt-img"><img src="#" data-lazy="{{asset('uploads/products/'.$image)}}" alt=""></span>
																			@endif
																		@endforeach
																		</div>
																		<div class="tt-description">
																			<h2 class="tt-title">{{$p->name}}</h2>
																			<div class="tt-price">
																				<span class="new-price">
																					{{$p->variants->min('selling_price')}}
																				</span>
																				
																			</div>
																			<div class="tt-product-inside-hover">
																				<div class="tt-btn-addtocart  add_to_cart"
																					data-slug_name='{{$p->slug}}'
																					data-has_variant_id="yes"
																				 >ADD TO CART</div>
																				
																				 <a href="javascript:void(0)" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}"></a>
									
																			</div>
																		</div>
																	</a>
																</div>
															</div>
														@endforeach
													@endforeach
												</div>
													

											</div>
										</div>
										<div class="row">
											<div class="col-sm-6">
												<a href="listing-left-column.html" class="tt-promo-02">
													<img src="{{asset('images/custom/header-promo-01.jpg')}}" alt="">
													<div class="tt-description tt-point-h-l">
														<div class="tt-description-wrapper">
															<div class="tt-title-small">SUMMER <span class="tt-base-color">2018</span></div>
															<div class="tt-title-large">NEW ARRIVALS</div>
														</div>
													</div>
												</a>
											</div>
											<div class="col-sm-6">
												<a href="listing-left-column.html" class="tt-promo-02">
													<img src="{{asset('images/custom/header-promo-02.jpg')}}" alt=""">
													<div class="tt-description tt-point-h-l">
														<div class="tt-description-wrapper">
															<div class="tt-title-small"><span class="tt-white-color">CLEARANCE SALES</span></div>
															<div class="tt-title-large"><span class="tt-white-color">GET UP TO 20% OFF</span></div>
														</div>
													</div>
												</a>
											</div>
										</div>
									</div>
								</li>
								
							@endforeach
							</ul>
							
						</nav>
					</div>
				</div>
				<!-- /tt-menu -->
			</div>
		</div>
	</div>
</div>
</div>


<div id="tt-pageContent">
	<div class="container-indent nomargin">
		<div class="container container-fluid-lg">
			<div class="slider-revolution slider-revolution__radius slider-revolution__dots-b-r slider-revolution__dots-color02 revolution-default slider-revolution__arrows-none" data-speed="5000" data-fullscreen="false" data-width="1181" data-height="630">
				<div class="tp-banner-container">
					<div class="tp-banner revolution">
						<ul>
						@foreach($banners as $b)
							<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-saveperformance="off" data-title="Slide">
								<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAB4AAAAMgAQMAAAD4P+14AAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAPdJREFUeNrswYEAAAAAgKD9qRepAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABg9uBAAAAAAADI/7URVFVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVWFPTgQAAAAAADyf20EVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVpDw4JAAAAAAT9f+0JIwAAAAAAAAAAALAJ8T4AAZAZiOkAAAAASUVORK5CYII=" data-lazyload="{{asset('uploads/banners/'.$b->image)}}"  alt="slide1"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" >
								<div class="tp-caption  tp-caption1 lft stb text-left"
									data-x="133"
									data-y="center"
									data-hoffset="0"
									data-voffset="-20"
									data-speed="600"
									data-start="900"
									data-easing="Power4.easeOut"
									data-endeasing="Power4.easeIn">
									<div class="tp-caption5-wd-1 tt-base-color">{{$b->description}}</div>
									<div class="tp-caption5-btn"><a href="{{$b->link_url}}" target="_blank" class="btn btn-xl">{{$b->title}}</a></div>
								</div>
							</li>
						@endforeach	
						
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-indent nomargin">
		<div class="container container-fluid-lg">
			<div class="row">
			@foreach($top_categories as $key => $c)
				@if($key > 3)
				   	@break
				@endif
				<div class="col-sm-6">
					<a href="{{url('/shop?category='.$c->id)}}" class="tt-promo-box tt-one-child">
						<img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/categories/'.$c->image)}}" alt="">
						<div class="tt-description">
							<div class="tt-description-wrapper">
								<div class="tt-background"></div>
								<div class="tt-title-small">{{$c['name']}}</div>
							</div>
						</div>
					</a>
				</div>
			@endforeach	
			</div>
		</div>
	</div>

	@foreach($complete_data as $d)
	
		<div class="container-indent">
			<div class="tt-block-title">
				<h1 class="tt-title">{{$d->name}}</h1>
				<div class="tt-description-border-btm"></div>
			</div>
			<div class="container container-fluid-lg">
				<ul class="nav nav-tabs tt-tabs-default" role="tablist">
				@foreach($d->subcategories as $key => $c)
					<li class="nav-item">
						<a class="nav-link {{$loop->first?'active':''}}" data-toggle="tab" href="#tt-tab{{$d->id}}-{{$c->id}}">{{$c->name}}</a>
					</li>
				@endforeach
				</ul>
				@foreach($d->subcategories as $key => $c)
					<div class="tab-content">
					@if ($loop->first)
						<div class="tab-pane active" id="tt-tab{{$d->id}}-{{$c->id}}">
					@else
						<div class="tab-pane" id="tt-tab{{$d->id}}-{{$c->id}}">	
					@endif
							<div class="row tt-layout-product-item">
							@foreach($c->product as $key => $p)
								@if ($key == 4)
									@break
								@endif
								<div class="col-6 col-md-4 col-lg-3">
									<div class="tt-product thumbprod-center">
										<div class="tt-image-box">
											<a href="javascript:void(0)" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}" data-tooltip="Quick View" data-tposition="left"></a>
											<a href="javascript:void(0)" class="tt-btn-wishlist add_product_to_wishlist" data-product_id="{{$p->id}}" data-token={{csrf_token()}} data-tooltip="Add to Wishlist" data-tposition="left"></a>
											<a href="{{url('/product/'.$p->slug)}}">
												@foreach(explode(',',$p->images) as $image)
													<span class="{{$loop->first?'tt-img':'tt-img-roll-over'}}"><img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/products/'.$image)}}" alt=""></span>													
												@endforeach
											</a>
										</div>
										<div class="tt-description">
											<div class="tt-row">
												<ul class="tt-add-info">
													<li><a href="#">{{$c->name}}</a></li>
												</ul>
												<div class="tt-rating">
													@if($p->reviews->count()>0)
														@for ($i = 0; $i < 5; $i++)
															@if (floor($p->reviews->avg('ratings')) - $i >= 1)
																<i class="icon-star"></i>
															@elseif ($p->reviews->avg('ratings') - $i > 0)
																<i class="icon-star-half"></i>
															@else
																<i class="icon-star-empty"></i>
															@endif
														@endfor
													@endif
												</div>
											</div>
											<h2 class="tt-title"><a href="{{url('/product/'.$p->slug)}}">{{$p->name}}</a></h2>
											<div class="tt-price">
											
												{{$p->variants->min('selling_price')}}

											</div>
											<div class="tt-product-inside-hover">
												<div class="tt-row-btn">
													<a href="#" id="{{$p->id}}"
													class="tt-btn-addtocart thumbprod-button-bg add_to_cart" 
													data-slug_name='{{$p->slug}}'
													data-has_variant_id="yes">ADD TO CART</a>
												</div>
												<div class="tt-row-btn">
													<a href="javascript:void(0)" class="tt-btn-quickview quick_view_product" data-product_id="{{$p->id}}"></a>
													<a href="javascript:void(0)" class="tt-btn-wishlist add_product_to_wishlist" data-token={{csrf_token()}} data-product_id="{{$p->id}}"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div>
				@endforeach	
			</div>
			
		</div>
	@endforeach

	<div class="container-indent">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<h6 class="tt-title-sub">NEW PRODUCTS</h6>
					<div class="tt-layout-vertical-listing">
						@foreach($new_products as $new)
							<div class="tt-item">
								<div class="tt-layout-vertical">
									<div class="tt-img">
										<a href="{{url('/product/'.$new->slug)}}">
											@foreach(explode(',',$new->images) as $image)
												<span class="{{$loop->first?'tt-img-default':'tt-img-roll-over'}}"><img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/products/'.$image)}}" alt=""></span>
											@endforeach
										</a>
									</div>
									<div class="tt-description">
										<div class="tt-rating">
											@if($new->reviews->count()>0)
												@for ($i = 0; $i < 5; $i++)
													@if (floor($new->reviews->avg('ratings')) - $i >= 1)
														<i class="icon-star"></i>
													@elseif ($new->reviews->avg('ratings') - $i > 0)
														<i class="icon-star-half"></i>
													@else
														<i class="icon-star-empty"></i>
													@endif
												@endfor
											@endif
										</div>
										<ul class="tt-add-info">
											<li><a href="#">{{$new->subcategory->name}}</a></li>
										</ul>
										<h6 class="tt-title"><a href="#">{{$new->name}}</a></h6>
										<div class="tt-price">
											{{$new->variants->min('selling_price')}}
										</div>
									</div>
								</div>
							</div>
						@endforeach

					</div>
				</div>
				<div class="divider visible-xs"></div>
				<div class="col-sm-6 col-md-4">
					<h6 class="tt-title-sub">TOP RATED</h6>
					<div class="tt-layout-vertical-listing">
						@foreach($top_products as $new)
							<div class="tt-item">
								<div class="tt-layout-vertical">
									<div class="tt-img">
										<a href="{{url('/product/'.$new->slug)}}">
											@foreach(explode(',',$new->images) as $image)
												<span class="{{$loop->first?'tt-img-default':'tt-img-roll-over'}}"><img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/products/'.$image)}}" alt=""></span>									
											@endforeach
										</a>
									</div>
									<div class="tt-description">
										<div class="tt-rating">
											@if($new->reviews->count()>0)
												@for ($i = 0; $i < 5; $i++)
													@if (floor($new->reviews->avg('ratings')) - $i >= 1)
														<i class="icon-star"></i>
													@elseif ($new->reviews->avg('ratings') - $i > 0)
														<i class="icon-star-half"></i>
													@else
														<i class="icon-star-empty"></i>
													@endif
												@endfor
											@endif
										</div>
										<ul class="tt-add-info">
											<li><a href="#">{{$new->subcategory->name}}</a></li>
										</ul>
										<h6 class="tt-title"><a href="#">{{$new->name}}</a></h6>
										<div class="tt-price">
											{{$new->variants->min('selling_price')}}
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="divider visible-sm visible-xs"></div>
				<div class="col-sm-6 col-md-4">
					<h6 class="tt-title-sub">TRENDING IN HEALTH SUPPLEMENTS</h6>
					<div class="tt-layout-vertical-listing">
						@foreach($trend_products as $new)
							<div class="tt-item">
								<div class="tt-layout-vertical">
									<div class="tt-img">
										<a href="{{url('/product/'.$new->slug)}}">
											@foreach(explode(',',$new->images) as $image)
												<span class="{{$loop->first?'tt-img-default':'tt-img-roll-over'}}"><img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/products/'.$image)}}" alt=""></span>
											@endforeach
										</a>
									</div>
									<div class="tt-description">
										<div class="tt-rating">
											@if($new->reviews->count()>0)
												@for ($i = 0; $i < 5; $i++)
													@if (floor($new->reviews->avg('ratings')) - $i >= 1)
														<i class="icon-star"></i>
													@elseif ($new->reviews->avg('ratings') - $i > 0)
														<i class="icon-star-half"></i>
													@else
														<i class="icon-star-empty"></i>
													@endif
												@endfor
											@endif
										</div>
										<ul class="tt-add-info">
											<li><a href="#">{{$new->subcategory->name}}</a></li>
										</ul>
										<h6 class="tt-title"><a href="#">{{$new->name}}</a></h6>
										<div class="tt-price">
											{{$new->variants->min('selling_price')}}
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-indent">
		<div class="container">
			<div class="tt-block-title">
				<h1 class="tt-title">POPULAR</h1>
				<div class="tt-description">CLOTHING BRANDS</div>
			</div>
			<div class="row tt-layout-promo-box">
				@foreach($popular_brands as $b)
					<div class="col-6 col-md-3 col-12-575width">
						<a href="{{url('/shop?brand='.$b->id)}}" class="tt-promo-box tt-one-child">
							<img src="{{asset('images/loader.svg')}}" data-src="{{asset('uploads/brands/'.$b->image)}}" alt="">
							<div class="tt-description">
								<div class="tt-description-wrapper">
									<div class="tt-background"></div>
									<div class="tt-title-small">{{$b->title}}</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach

			</div>
		</div>
	</div>

	<div class="container-indent">
		<div class="container">
			<div class="row tt-services-listing">
				<div class="col-xs-12 col-md-6 col-lg-4">
					<a href="faq.html" class="tt-services-block">
						<div class="tt-col-icon">
							<i class="icon-f-48"></i>
						</div>
						<div class="tt-col-description">
							<h4 class="tt-title">FREE SHIPPING</h4>
							<p>Free shipping on all US order or order above $99</p>
						</div>
					</a>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<a href="faq.html" class="tt-services-block">
						<div class="tt-col-icon">
							<i class="icon-f-35"></i>
						</div>
						<div class="tt-col-description">
							<h4 class="tt-title">SUPPORT 24/7</h4>
							<p>Contact us 24 hours a day, 7 days a week</p>
						</div>
					</a>
				</div>
				<div class="col-xs-12 col-md-6 col-lg-4">
					<a href="faq.html" class="tt-services-block">
						<div class="tt-col-icon">
							<i class="icon-e-09"></i>
						</div>
						<div class="tt-col-description">
							<h4 class="tt-title">30 DAYS RETURN</h4>
							<p>Simply return it within 24 days for an exchange.</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>


@stop
