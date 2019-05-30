SELECT
	count(*) nb_susc,
	floor(avg(price)) av_susc,
	mod(sum(duration_sub), 42) ft
FROM subscription

