# Imports
import pandas  as pd
import q1_sol

# -----------------------------------------------------------------------------
# Test: test_fix_broken_tycho()
# -----------------------------------------------------------------------------

# -----------------------------------------------------------------------------
def test_fix_broken_tycho():

    # Read input and correct result
    broken_entries: pd.DataFrame = pd.read_csv("data/tycho-broken.csv", sep=",")
    fixed_entries:  pd.DataFrame = pd.read_csv("data/tycho-fixed.csv",  sep=",")

    # Get result
    result: pd.DataFrame = q1_sol.fix_broken_tycho(broken_entries)

    # Test
    pd.testing.assert_frame_equal(result, fixed_entries, check_dtype=False)


# -----------------------------------------------------------------------------
